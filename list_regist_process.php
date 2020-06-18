<?php
    //cookieからショップ名を取得
    $shop_name=$_COOKIE["shop_name"];

    //フォームからデータを受け取る
    $pet = $_POST["pet"];
    $cost = $_POST["cost"];


    //DB接続
    require "funcs.php";
    $pdo = db_con();

    //prepareで文字列として準備
    $stmt = $pdo->prepare("INSERT INTO cost_table(shop,pet,cost)VALUES(:a1,:a2,:a3)");
    //bind変数に入れることで無効かしている(script等を埋め込まれないため):a1,:a2,:a3)");
    //↓文字列型としてエスケープするという意味
    $stmt->bindValue(':a1',$shop_name, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
    $stmt->bindValue(':a2',$pet, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
    $stmt->bindValue(':a3', $cost, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
    $status = $stmt->execute();
    //$flagにFalseを代入
    $flag="False";
    if($status==false) {
        //execute（SQL実行時にエラーがある場合）
        sql_error($stmt);
    }
    redirect("list_regist.php");
?>