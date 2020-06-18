<?php
//フォームからデータを受け取る
$name = $_POST["name"];
$email = $_POST["email"];
$pass = $_POST["pass"];

//DB接続します
require "funcs.php";
$pdo = db_con();


//既存のnameかぶっていないかを確認========================================================
//データ取得

$stmt = $pdo->prepare("select * From login_table");
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
        if($result['name']==$name)
        //一致した場合flagをtrueに変更
            $flag="True";
        }
}
//========================================================================================

//新規のnameならDBに値を登録
if($flag==="False"){
    //prepareで文字列として準備
    $stmt = $pdo->prepare("INSERT INTO login_table(id,name,email,password)VALUES(NULL,:a1,:a2,:a3)");
    //bind変数に入れることで無効かしている(script等を埋め込まれないため):a1,:a2,:a3)");
    //↓文字列型としてエスケープするという意味
    $stmt->bindValue(':a1',$name, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
    $stmt->bindValue(':a2',$email, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
    $stmt->bindValue(':a3', $pass, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
    $status = $stmt->execute();
}

//データ登録処理後
if($status==false) {
    //execute（SQL実行時にエラーがある場合）
    sql_error($stmt);
}

?>

<!--htmlデータ書き込み -->
<html>
    <head>
        <meta charset="utf-8">
        <title>File書き込み</title>
    </head>
    <body>
        <?php
            //flagがTrueなら
            if($flag==="True"){
                echo "<h1>すでに登録済みのユーザー名です。</h1>";
            }else{
                echo "<h1>登録しました。</h1>";
            }
        ?>
        
        <ul>
            <li><a href="index.php">戻る</a></li>
        </ul>
    </body>
</html>