<?php

    //cookie
    $shop_name=$_COOKIE["shop_name"];

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
            if($result['shop']==$shop_name){
            //一致した場合flagをtrueに変更
                $flag="True";
                if($result['stat']=="reserve"){
                    //$view .= "<p>";
                    $view .= "<form action='reserve_list_shop_process.php"."' method='get'>";
                    $view .= "<fieldset>";
                    $view .= "ユーザ:".$result['user']." 予約期間:".$result['start_day']."-".$result['end_day']." ";   
                    $view .="<select name=action".">"."<option value=approve>"."承認"."</option>"."<option value=reject>"."拒否"."</option>"."</select>";
                    $view .=" "."<input type='submit' value='送信' id='send'>";
                    $view .= "<input type='hidden' name='id' value=".$result['id'].">";
                    $view .= "</fieldset>";
                    $view .= "</form>";
                   // $view .= "</p>";

                }else{
                    $view .= "<p>";
                    $view .= "ユーザ:".$result['user']." 予約期間:".$result['start_day']."-".$result['end_day']." ".$result['stat'];
                    $view .= "</p>";
                }
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