<?php
//1.  DB接続します
require_once('db_connect.php');
ini_set('display_errors', 1);

// フォームデータの受け取り
$name = $_POST['name'];
$email = $_POST['email'];
$bookTitle = $_POST['bookTitle'];
$author = $_POST['author'];
$rating = $_POST['rating'];
$comment = $_POST['comment'];

// データの保存
$sql = "INSERT INTO gs_bm_table (name, email, bookTitle, author, rating, comment, date) VALUES (:name, :email, :bookTitle, :author, :rating, :comment, NOW())";
  $stmt = $pdo->prepare($sql);
  $stmt->bindParam(':name', $name, PDO::PARAM_STR);
  $stmt->bindParam(':email', $email, PDO::PARAM_STR);
  $stmt->bindParam(':bookTitle', $bookTitle, PDO::PARAM_STR);
  $stmt->bindParam(':author', $author, PDO::PARAM_STR);
  $stmt->bindParam(':rating', $rating, PDO::PARAM_INT);
  $stmt->bindParam(':comment', $comment, PDO::PARAM_STR);
  $stmt->execute();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/write.css">
</head>
<body>
<div class="message">
    <p class="comment">オススメの本が登録されました。<br> ありがとうございました！<br></p>
    <a href="index.php" class="back-button">戻る<br></a>
    <a href='result.php' class="back-button">オススメ一覧へ</a>

  </div>
</body>
</html>

