<h2>掲示板タイトル</h2>
<?php
$bb_id = 2;

$table_name ="pf".$bb_id
 ?>

<table border="1">
<tr><th>掲示板ID</th><th>ユーザID</th><th>コメント番号</th><th>投稿内容</th><th>投稿日時</th></tr>
<?php
  $pdo = new PDO("mysql:dbname=bulletin", "root", "kappaebisen");
  $st = $pdo->query("SELECT * FROM $table_name");
  while ($row = $st->fetch()) {
    $bb_id = htmlspecialchars($row['bb_id']);
    $user_id = htmlspecialchars($row['user_id']);
    $comment_num = htmlspecialchars($row['comment_num']);
    $posted_content = htmlspecialchars($row['posted_content']);
    $posted_date = htmlspecialchars($row['posted_date']);
    echo "<tr><td>$bb_id</td><td>$user_id</td><td>$comment_num</td><td>$posted_content</td><td>$posted_date</td></tr>";
  }
?>
</table>

<html>
<head>
<meta charset="utf-8">
</head>
<body>
<form method="post" action="post.php">
  <div class="post">
    <h2>投稿フォーム</h2>
    <p><textarea name="posted_content" rows="8" cols="40"><?php echo $content ?></textarea></p>
    <p><input name="submit" type="submit" value="投稿"></p>
  </div>
</form>


</body>
</html>
