<?php
// 1. DB接続します
try {
    $pdo = new PDO('mysql:dbname=kadai_PHP;charset=utf8;host=localhost', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  } catch (PDOException $e) {
    exit('DBConnectError'.$e->getMessage());
  }

  // ２．データ取得SQL作成
$stmt = $pdo->prepare("SELECT * FROM gs_bm_table");
$status = $stmt->execute();

if ($status == false) {
  // execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("ErrorQuery:".$error[2]);
}
?>