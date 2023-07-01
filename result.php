<?php
//1.  DB接続します
require_once('db_connect.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
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
  echo '<tr><th>名前</th><th>本のタイトル</th><th>著者</th><th>評価</th><th>コメント</th></tr>';

  while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $name = $row['name'];
    $bookTitle = $row['bookTitle'];
    $author = $row['author'];
    $rating = $row['rating'];
    $comment = $row['comment'];
    $id = $row['id'];


    // データの表示
    echo '<tr>';
    echo '<td class="name">' . $name . '</td>';
    echo '<td>' . $bookTitle . '</td>';
    echo '<td>' . $author . '</td>';
    echo '<td>' . $rating . '</td>';
    echo '<td>' . $comment . '</td>';
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



