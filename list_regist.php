<?php
    //cookieからショップ名を取得
    $shop_name=$_COOKIE["shop_name"];

    //DB接続
    require "funcs.php";
    $pdo = db_con();

    $stmt = $pdo->prepare("select * From cost_table");
    $status = $stmt->execute();
    //$flagにFalseを代入
    $flag="False";
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
            }
        }
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
        <form action="list_regist_process.php" method="post">
        <fieldset>
            <legend>新規追加</legend>
            <label>種類: <input type="text" name="pet" id="pet"></label><br>
            <label>料金: <input type="text" name="cost" id="cost"></label><br>
            <input type="submit" value="送信" id="send">
        </fieldset>
        </form>
    </body>
</html>