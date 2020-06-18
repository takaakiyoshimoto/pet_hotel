<?php
    if (isset($_COOKIE["user_name"])) {
        print "<p>";
        print "ログインユーザー：".$_COOKIE["user_name"];
        print "</p>";
        $user_name=$_COOKIE["user_name"];
        
    }
    if (isset($_COOKIE["shop_name"])) {
        print "<p>";
        print "ショップ名：".$_COOKIE["shop_name"];
        print "</p>";
        $shop_name=$_COOKIE["shop_name"];
        
    }
?>
<html>
<head>
<meta charset="utf-8">
<title></title>
</head>
<body>
    <ul>
        <?php
            if (isset($_COOKIE["user_name"])){
                //ログイン済みの場合ログアウトのリンクを貼る
                echo "<li><a href=logout.php>ログアウト</a></li>";

                //ログイン済みの場合ショッピングのリンクを張る
                echo "<li><a href=entrust.php>ペットを預ける</a></li>";

                
                //予約状況の確認を行う
                echo "<li><a href=reserve_list_user.php>予約状況の確認</a></li>";

            }elseif(isset($_COOKIE["shop_name"])){
                //ショップログイン済み

                //ログイン済みの場合購入履歴を読み込むリンクを貼る
                echo "<li><a href=list_regist.php>リスト確認</a></li>";

                //ログイン済みの場合ログアウトのリンクを貼る
                echo "<li><a href=logout.php>ログアウト</a></li>";
                
                //予約状況の確認を行う
                echo "<li><a href=reserve_list_shop.php>予約状況の確認</a></li>";

            }else{

                //ログイン前なら新規ユーザ登録のリンクを貼る
                echo "<li><a href=create_user.php>新規ユーザー登録</a></li>";

                //ログイン前ならログインのリンクを貼る
                echo "<li><a href=login.php>ログイン</a></li>";

                echo "<li><a href=login_shop.php>ショップログイン</a>";

                echo "<li><a href=regist.php>ショップ登録</a>";

            }
        ?>
    </ul>
</body>
</html>