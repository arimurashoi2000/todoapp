<!doctype html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Page</title>
</head>
<body>
<h1>
    Post New ToDo Page
</h1>
<form method="post" action="newtask_check.php">
    <div style="margin: 10px">
        <label for="title">タイトル：</label>
        <input id="title" type="text" name="title">
    </div>
    <div style="margin: 10px">
        <label for="content">内容：</label>
        <textarea id="content" name="content" rows="8" cols="40"></textarea>
    </div>
    <input type="submit" name="post" value="投稿する">
</form>
<form action="index.html">
    <button type="button" name="back" onclick="history.back()">戻る</button>
</form>
</body>
</html>