<!doctype html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>List Page</title>
</head>
<body>
<?php
require_once('db_connect.php');
db_connect();
$dbh = db_connect();
try {
    $countsSql = 'SELECT count(*)  AS cnt FROM posts';
    $counts = $dbh->prepare($countsSql);
    $counts->execute();
    $count = $counts->fetch(PDO::FETCH_ASSOC);
    $maxPage = ceil($count['cnt']/5);

    $sql = 'SELECT * FROM posts ORDER BY ID DESC LIMIT :page, 5';
    $stmt = $dbh->prepare($sql);
    $page = filter_input(INPUT_GET, 'page');
    $page= htmlspecialchars($page, ENT_QUOTES, 'UTF-8');

    if (!$page) {
        $page = 1;
    }
    $start = ($page - 1) * 5;
    $stmt->bindParam(":page", $start, PDO::PARAM_INT);
    $stmt->execute();
} catch(Exception $e) {
    $e->getMessage();
    //exit();
}

try {
    $searchWord = filter_input(INPUT_POST, 'search_word');
    $search = filter_input(INPUT_POST, 'search');

    $searchWord = htmlspecialchars($searchWord, ENT_QUOTES, 'UTF-8');
    $search = htmlspecialchars($searchWord, ENT_QUOTES, 'UTF-8');

    if (!empty($search) && !empty($searchWord)) {
        $dbh = db_connect();
        $searchSql = "SELECT * FROM posts WHERE content LIKE '%$searchWord%' ORDER BY ID DESC";
        $stmt = $dbh->prepare($searchSql);
        $stmt->execute();
    }
} catch(Exception $e) {
    exit($e->getMessage());
}
?>

<h1>
    ToDo List Page
</h1>

<form action="" method="post">
<input type="text" name="search_word">
<input type="submit" name="search" value="検索">
</form>
<br>
<br>
<form action="newtask.php">
    <button type="submit" style="padding: 10px;font-size: 16px;margin-bottom: 10px">New Todo</button>
</form>
<table border="1">
    <colgroup span="4"></colgroup>
    <tr>
        <th>ID</th>
        <th>タイトル</th>
        <th>内容</th>
        <th>作成日時</th>
        <th>編集</th>
        <th>削除</th>
    </tr>


    <?php while ($rec = $stmt->fetch(PDO::FETCH_ASSOC)) : ?>
        <tr>
          <td><?php echo $rec['ID']; ?></td>
          <td><?php echo $rec['title']; ?></td>
          <td><?php echo $rec['content']; ?></td>
          <td><?php echo $rec['created_at']; ?></td>
          <td><a href="newtask_edit.php?ID=<?php echo $rec['ID'];?>">編集する</a></td>
          <td><a href="newtask_delete.php?ID=<?php echo $rec['ID'];?>">削除する</a></td>
        </tr>
    <?php endwhile; ?>
</table>
<p>
    <?php if ($page == 1): ?>
        <a href="?page=<?php echo $page; ?>"><?php echo $page;?></a>
        <a href="?page=<?php echo $page + 1; ?>"><?php echo $page + 1;?></a>
        <a href="?page=<?php echo $page +2; ?>"><?php echo $page +2;?></a>
        <a href="?page=<?php echo $page + 1; ?>">次へ</a>
    <?php endif; ?>

    <?php if ($page > 1 && $page != $maxPage): ?>
        <a href="?page=<?php echo $page - 1; ?>">前へ</a>
        <a href="?page=<?php echo $page - 1; ?>"><?php echo $page - 1;?></a>
        <a href="?page=<?php echo $page; ?>"><?php echo $page; ?></a>
    <?php endif; ?>

    <?php if ($page<$maxPage && $page != 1): ?>
        <a href="?page=<?php echo $page + 1; ?>"><?php echo $page + 1; ?></a>
        <a href="?page=<?php echo $page + 1; ?>">次へ</a>
    <?php endif; ?>

    <?php if ($page == $maxPage): ?>
        <a href="?page=<?php echo $page - 1; ?>">前へ</a>
        <a href="?page=<?php echo $page - 2; ?>"><?php echo $page -2; ?></a>
        <a href="?page=<?php echo $page -1; ?>"><?php echo $page -1; ?></a>
        <a href="?page=<?php echo $page; ?>"><?php echo $page;?></a>
    <?php endif; ?>
</p>


</body>
</html>