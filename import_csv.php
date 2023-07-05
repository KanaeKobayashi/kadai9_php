<!DOCTYPE html>
<html lang="jp">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CSV Import</title>
    <link rel="stylesheet" href="./css/admin.css">
    <style>
        input[type="file"]{
            width: 285px;
            padding: 10px 20px;
            background-color: #0056b3; 
            border: none;
            color: white;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            transition-duration: 0.4s;
            cursor: pointer;
            border-radius: 5px;
        }
        input[type="submit"] {
            width: 320px;
            padding: 10px 20px;
            background-color: #0056b3; 
            border: none;
            color: white;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            transition-duration: 0.4s;
            cursor: pointer;
            border-radius: 5px;
        }
        input[type="file"]:hover,
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        
    </style>
</head>
<body>
<div class="admin-menu">
    <h1>CSV Import</h1>
    <form action="process_import.php" method="post" enctype="multipart/form-data">
        <!-- <label id="custom-file-upload" for="file" class="custom-file-upload">CSVファイルを選択:</label> -->
        <input type="file" id="file" name="file" accept=".csv" ><br><br>
        <input type="submit" value="Upload CSV">
    </form>
    <a href="administrator.php" class="back-button">戻る</a>
</div>
<script>
  
  actualBtn.addEventListener('change', function(){
    fileChosen.textContent = this.files[0].name
  })
</script>
</body>
</html>