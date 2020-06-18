<!DOCTYPE html>
<html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>新規ユーザー作成</title>
</head>
    <body>
        <form action="regist_process.php" method="post">
            <fieldset>
            <legend>登録</legend>
            <label>店名: <input type="text" name="name" id="name"></label><br>
            <label>メールアドレス: <input type="text" name="email" id="email"></label><br>
            <label>パスワード: <input type="text" name="pass" id="pass"></label><br>
            <label>住所: <input type="text" name="address" id="address"></label><br>
            <label>コメント:<textArea name="comment" rows="4" cols="40"></textArea></label><br>
            <input type="submit" value="送信">
            </fieldset>
        </form>
    </body>
</html>