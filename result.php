<?php
//1.  DB接続します
require_once('db_connect.php');

// 昇順か降順かのフラグと検索文字列
$order = isset($_GET['order']) ? $_GET['order'] : 'asc';
$search = isset($_GET['search']) ? $_GET['search'] : '';

if (!empty($search)) {
  //2. データ取得SQL作成（検索文字列がある場合）
  $sql = "SELECT * FROM gs_bm_table WHERE bookTitle LIKE ?";
  //3. SQL実行
  $stmt = $pdo->prepare($sql);
  $stmt->execute(["%$search%"]);
} else {
  //2. データ取得SQL作成（検索文字列がない場合）
  $sql = "SELECT * FROM gs_bm_table ORDER BY date $order";
  //3. SQL実行
  $stmt = $pdo->prepare($sql);
  $stmt->execute();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>LIST</title>
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
<h2>オススメ一覧</h2>
<!-- 昇順、降順ボタンの作成 -->
<div style="display: flex;">
  <form action="" method="get" style="margin-right: 20px;">
    <input type="hidden" name="order" value="desc">
    <input type="submit" value="新しく投稿された順">
  </form>
  <form action="" method="get">
    <input type="hidden" name="order" value="asc">
    <input type="submit" value="古い順">
  </form>
</div>
<!-- 検索フォームの作成 -->
<div style="margin-top: 20px;">
  <form action="" method="get">
    <input type="text" name="search" placeholder="本のタイトルで検索" value="<?php echo $search; ?>">
    <input type="submit" value="検索">
  </form>
</div>
<!-- 検索結果クリアボタン -->
<div style="margin-top: 20px;">
  <form action="" method="get">
    <input type="submit" value="検索結果をクリア">
  </form>
</div>
<?php
if ($stmt->rowCount() > 0) {
  // 表の開始を表示
  echo '<table border="1" class="center-table">';
  echo '<tr><th>名前</th><th>本のタイトル</th><th>著者</th><th>評価</th><th>コメント</th><th>編集</th><th>削除</th></tr>';

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
  echo 'まだ登録がありません。';
}
?>


<a href="index.php" class="back-button">戻る</a>
<a href="totalling.php" class="back-button">集計結果を表示する</a>
</body>
</html>



