<?php
    //cookieからショップ名を取得
    $shop_name=$_GET['shop'];

    //user名
    $user_name=$_COOKIE["user_name"];

    //DB接続
    require "funcs.php";
    $pdo = db_con();

    $stmt = $pdo->prepare("select * From cost_table");
    $status = $stmt->execute();
    //$flagにFalseを代入
    $flag="False";

    //ペットとコストの値を配列に保存
    $pet = array();
    $cost = array();

    //受け付けている種類の数を保存する
    $count=0;

    if($status==false) {
        //execute（SQL実行時にエラーがある場合）
        sql_error($stmt);
    }else{
        //Selectデータの数だけ自動でループしてくれる
        //FETCH_ASSOC=http://php.net/manual/ja/pdostatement.fetch.php
        //PDO::FETCH_ASSOC: は、結果セットに 返された際のカラム名で添字を付けた配列を返します。
        while($result = $stmt->fetch(PDO::FETCH_ASSOC)){
            //データの表示
            if($result['shop']==$shop_name){
                $view .= "<p>";
                $view .= $result['pet'].':'.$result['cost'];
                $view .= "</p>";
                array_push($pet,$result['pet']);
                array_push($cost,$result['cost']);
                $count++;
            }
        }
    }
    $i=0;
    //shop名の一致する選択肢を設定する。valueにペットの種類と値段を入れて送信
    while($i<$count){
        $option .= "<option value=".$pet[$i]."@".$cost[$i];
        $option .= ">".$pet[$i]. "</option>";
        $i++;
    }
?>
<html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>新規ユーザー作成</title>
</head>
    <body>
        <?=$view?>
        <form action="reserve_process.php" method="post">
        <fieldset>
            <legend>予約</legend>
            <label>種類: 
                <select name="pet" size=<?=count?>>
                    <?=$option?>
                </select>
            </label><br>

            <label>コメント: <input type="text" name="comment" id="comment"></label><br>
            <label>開始日: <input type="date" name="start_day" id="start_day"></label><br>
            <label>終了日: <input type="date" name="end_day" id="start_day"></label><br>
            <input type="hidden" name="shop" value="<?=$shop_name?>">
            <input type="hidden" name="user_name" value="<?=$user_name?>">
            <input type="submit" value="予約" id="send">
        </fieldset>
        </form>

    </body>
</html>