<?php
//1.  DB接続します
require_once('db_connect.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>List for Administrator</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
  <link rel="stylesheet" href="./css/result.css">
  <style>
    .center-table {
        width: 100%;
        margin-top: 50px;
    }
    .name{
    width: 120px;
}
  </style>
</head>
<body>
<?php
if ($stmt->rowCount() > 0) {
  // 表の開始を表示
  echo '<table border="1" class="center-table">';
  echo '<tr><th>id</th><th>名前</th><th>email</th><th>本のタイトル</th><th>著者</th><th>評価</th><th>コメント</th><th>編集</th><th>削除</th></tr>';

  while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $id = $row['id'];
    $email = $row['email'];
    $name = $row['name'];
    $bookTitle = $row['bookTitle'];
    $author = $row['author'];
    $rating = $row['rating'];
    $comment = $row['comment'];
    $id = $row['id'];


    // データの表示
    echo '<tr>';
    echo '<td>' . $id . '</td>';
    echo '<td class="name">' . $name . '</td>';
    echo '<td>' . $email . '</td>';
    echo '<td>' . $bookTitle . '</td>';
    echo '<td>' . $author . '</td>';
    echo '<td>' . $rating . '</td>';
    echo '<td>' . $comment . '</td>';
    echo '<td><a href="edit.php?id=' . $id . '"><span class="material-symbols-outlined">
    edit
    </span></a></td>';
    echo '<td><a href="delete.php?id=' . $id . '"><span class="material-symbols-outlined">
    delete
    </span></a></td>';
    echo '</tr>';
  }
  // 表の終了を表示
  echo '</table>';
} else {
  echo 'まだアンケートがありません。';
}
?>


<a href="index.php" class="back-button">戻る</a>
<a href="totalling.php" class="back-button">集計結果を表示する</a>
</body>
</html>



