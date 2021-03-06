<html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ログイン</title>
</head>
    <body>
        <form action="login_shop_process.php" method="post">
        <fieldset>
            <legend>ログイン</legend>
            <label>店名 : <input type="text" name="name" id="name"></label><br>
            <label>パスワード: <input type="text" name="pass" id="pass"></label><br>
            <input type="submit" value="送信" id="send">
        </fieldset>
        </form>
    </body>
</html>

<!-- 初期値の保存のためにローカルストレージを使用 -->
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
<script>

//ローカルストレージの値を取得
for (let i = 0; i < localStorage.length; i++) {
    // 保存されたデータのkeyを取得
    const key = localStorage.key(i);

    // getItemのKeyを使って保存されたデータを全部取得
    const value = localStorage.getItem(key);

    if (key=="questionnaire"){
        // valueを,区切りで配列にする
        var val = value.split(",");
        document.getElementById("name").value=val[0];
        document.getElementById("pass").value=val[1];
    }
    break;
}

//ローカルストレージ内に値がある場合初期値を入力
document.getElementById("name").value

$("#send").on("click", function () {
    //ローカルストレージへの保存
    var key = "questionnaire";
    var in_name = document.getElementById("name").value;
    var in_pass = document.getElementById("pass").value;
    const value = new Array(in_name,in_pass);
    
    // データを保存する
    localStorage.setItem(key, value); //一覧表示に追加
})
</script>