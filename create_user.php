<html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>新規ユーザー作成</title>
</head>
    <body>
        <form action="create_user_process.php" method="post">
        <fieldset>
            <legend>登録</legend>
            <label>お名前: <input type="text" name="name" id="user_name"></label><br>
            <label>メールアドレス: <input type="text" name="email" id="email"></label><br>
            <label>パスワード: <input type="text" name="pass" id="pass"></label><br>
            <input type="submit" value="送信" id="send">
        </fieldset>
        </form>
    </body>
</html>