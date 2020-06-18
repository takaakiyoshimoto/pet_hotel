<?php
//フォームからデータを受け取る
$user_name = $_POST["user_name"];
$pass = $_POST["pass"];

//DB接続します
require "funcs.php";
$pdo = db_con();

$stmt = $pdo->prepare("select * From login_table");
$status = $stmt->execute();
$flag="False";
if($status==false) {
    //execute（SQL実行時にエラーがある場合）
    sql_error($stmt);
}else{
    //Selectデータの数だけ自動でループしてくれる
    //FETCH_ASSOC=http://php.net/manual/ja/pdostatement.fetch.php
    //PDO::FETCH_ASSOC: は、結果セットに 返された際のカラム名で添字を付けた配列を返します。
    while($result = $stmt->fetch(PDO::FETCH_ASSOC)){
        if($result['name']==$user_name)
        //一致した場合passを確かめる
            if($result['password']==$pass){
                $flag="True";
                //cookieにユーザ名を保存,30日間有効
                setcookie("user_name", $user_name, time() + 60 * 60 * 24 * 30);
                break;
            }else{
                $flag = "Failed";
                break;
            }
        }
}

?>

<html>
    <head>
        <meta charset="utf-8">
        <title>File書き込み</title>
    </head>
    <body>
        <?php
            //flagがTrueなら
            if($flag=="True"){
                echo "<h1>ようこそ";
                echo $user_name;
                echo "さん</h1>";
            }elseif($flag=="Failed"){
                echo "<h1>パスワードが異なります。</h1>";
            }else{
                echo "<h1>ユーザーが存在しません。</h1>";
            }
        ?>
        <ul>
            <li><a href="index.php">戻る</a></li>
        </ul>
    </body>
</html>

