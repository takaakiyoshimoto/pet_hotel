<?php

    //cookie
    $user_name=$_COOKIE["user_name"];

    //DBに接続
    require "funcs.php";
    $pdo = db_con();
    
    
    //既存のnameかぶっていないかを確認========================================================
    //データ取得
    $stmt = $pdo->prepare("select * From reserve_db");
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
            if($result['user']==$user_name){
            //一致した場合flagをtrueに変更
                $flag="True";
                $view .= "<p>";
                $view .= "店名:".$result['shop']." ステータス:".$result['stat'];
                $view .= "</p>";
            }
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
    <?=$view?>
</body>
</html>