<?php
require_once('db_connect.php');

header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="export.csv"');

//2. データ取得SQL作成
$stmt = $pdo->prepare("SELECT * FROM gs_bm_table");
$status = $stmt->execute();

if ($status == false) {
    $error = $stmt->errorInfo();
    exit("ErrorQuery:".$error[2]);
} else {
    $file = fopen('php://output', 'w');
    // ヘッダー行を追加
    fputcsv($file, array('id','名前', 'Eメール', '本のタイトル', '著者', '評価', 'コメント'));

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        // データをCSVファイルに書き込む
        fputcsv($file, $row);
    }
    fclose($file);
}
?>



