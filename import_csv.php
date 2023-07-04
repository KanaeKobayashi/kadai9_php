<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CSV Import</title>
    <link rel="stylesheet" href="./css/admin.css">
</head>
<body>
<div class="admin-menu">
    <h1>CSV Import</h1>
    <form action="process_import.php" method="post" enctype="multipart/form-data">
        <label for="file">CSVファイルを選択:</label><br>
        <input type="file" id="file" name="file" accept=".csv"><br><br>
        <input type="submit" value="Upload CSV">
    </form>
    <li><a href="administrator.php" class="back-button">戻る</a></li>
</div>
</body>
</html>