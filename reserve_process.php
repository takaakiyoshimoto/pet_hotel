<?php
    //フォームの値を取得
    $pet = $_POST["pet"];
    $comment = $_POST["comment"];
    $shop = $_POST["shop"]; 
    $start_day = $_POST["start_day"];
    $end_day = $_POST["end_day"];
    
    //クッキーからユーザー名を取得
    $user_name=$_COOKIE["user_name"];

    //文字列の分解
    $arr=explode("@",$pet);

    //DBに接続
    require "funcs.php";
    $pdo = db_con();
    

    $com = test($pet);
    $com = test($comment);
    $com = test($shop);
    $com = test($start_day);
    $com = test($end_day);
    $com = test($user_name);
    $com = test($arr[0]);
    $com = test($arr[1]);
    $cost = (int)$arr[1];
    $com = test($cost);
    $pets = $arr[0];
    $com = test($pets);
   

    
    $stmt = $pdo->prepare("INSERT INTO reserve_db(id,user,pet,cost,comment,shop,start_day,end_day,stat)VALUES(NULL,:a1,:a2,:a3,:a4,:a5,:a6,:a7,:a8)");#VALUES($user_name,$pets,$cost,$comment,$shop,$start_day,$end_day,"reserve")")
    // //bind変数に入れることで無効かしている(script等を埋め込まれないため):a1,:a2,:a3)");
    // //↓文字列型としてエスケープするという意味
    $stmt->bindValue(':a1',$user_name, PDO::PARAM_STR);
    $stmt->bindValue(':a2',$pets, PDO::PARAM_STR);
    $stmt->bindValue(':a3',$cost, PDO::PARAM_INT);
    $stmt->bindValue(':a4',$comment, PDO::PARAM_STR);
    $stmt->bindValue(':a5',$shop, PDO::PARAM_STR);
    $stmt->bindValue(':a6',$start_day, PDO::PARAM_STR);
    $stmt->bindValue(':a7',$end_day, PDO::PARAM_STR);
    $stmt->bindValue(':a8',"reserve", PDO::PARAM_STR);

    $status = $stmt->execute();

    redirect("index.php");



?>