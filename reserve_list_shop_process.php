<?php
    $id = $_GET["id"];
    $action = $_GET["action"];

    //DBに接続
    require "funcs.php";
    $pdo = db_con();

    $code = "UPDATE reserve_db SET stat='".$action."' WHERE id=".$id;
    $stmt = $pdo->prepare($code);
    $status = $stmt->execute();

    redirect("index.php");



?>