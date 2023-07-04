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

   // POST処理の最後にリダイレクト処理
  header('Location: thankyou.php');
exit();

?>


