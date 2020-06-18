<?php
    print "<p>";
    print "ログインユーザー：".$_COOKIE["user_name"];
    print "</p>";
    $user_name=$_COOKIE["user_name"];
    
    //DBに接続
    require "funcs.php";
    $pdo = db_con();

    $stmt = $pdo->prepare("select * From login_shop_table");
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
            $view .= "<p>";
            $view .= "<a href="."view_list.php?shop=".$result['name'].">".$result['name']."</a>".':'.$result['address'];
            $view .= "</p>";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href=""></a>
    <?=$view?>
</body>
</html>