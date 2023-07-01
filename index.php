<?php
//funcs.phpを読み込む
require_once('funcs.php');

//1.  DB接続します
require_once('db_connect.php');

//２．データ取得SQL作成
$stmt = $pdo->prepare("SELECT * FROM gs_bm_table");
$status = $stmt->execute();

if ($status == false) {
  // execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("ErrorQuery:".$error[2]);
} else {
  // Selectデータの数だけ自動でループしてくれる
  // FETCH_ASSOC=http://php.net/manual/ja/pdostatement.fetch.php
  while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
    // データの処理
    // 例: echo $result['id'], $result['name'], $result['email'], ...
  }
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // フォームデータの受け取り、特殊文字をHTMLエンティティに変換
    $name = isset($_POST['name']) ? h($_POST['name']) : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    if (preg_match('/[^\\x01-\\x7E]/', $email)) {
        echo 'メールアドレスには全角文字を使用できません。';
        exit;
    }
    $bookTitle = isset($_POST['bookTitle'])? h($_POST['bookTitle']) : '';
    $author = isset($_POST['author'])? h($_POST['author']) : '';
    $rating = isset($_POST['rating']) ? h($_POST['rating']) : '';
    $comment = isset($_POST['comment']) ? h($_POST['comment']) : '';

    // 評価を整数に変換
    $rating = intval($rating);

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

    echo 'オススメの本が送信されました。ありがとうございました！';
}
?>

<!DOCTYPE html>
<html lang="jp">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recommended Book</title>
    <link
  href="https://unpkg.com/sanitize.css"
  rel="stylesheet"
/>
    <link rel="stylesheet" href="./css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <header>
    <h1 class="title">あなたのオススメの本を教えてください</h1>
    </header>
    <form class="formWrapper" action="write.php" method="post">
        <label for="name">名前:</label>
            <input type="text" name="name" id="name" required><br>
  
            <label for="email">Eメール:</label>
            <input type="email" name="email" id="email" pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$" required><br>
  
            <label for="bookTitle">おすすめの本のタイトル:</label>
            <input type="text" name="bookTitle" id="bookTitle" required><br>

            <label for="author">本の著者:</label>
            <input type="text" name="author" id="author" required><br>


        <label for="rating">オススメ度:</label>
            <div class="star-rating">
                <input type="radio" name="rating" id="rating5" value="5" required><label for="rating5"></label>
                <input type="radio" name="rating" id="rating4" value="4"><label for="rating4"></label>
                <input type="radio" name="rating" id="rating3" value="3"><label for="rating3"></label>
                <input type="radio" name="rating" id="rating2" value="2"><label for="rating2"></label>
                <input type="radio" name="rating" id="rating1" value="1"><label for="rating1"></label>
            </div>
  
        <label for="comment">オススメコメント:</label>
            <textarea name="comment" id="comment" required></textarea><br>
  
        <input type="submit" value="送信">
        <input type="button" class="transparent-button" value="オススメ一覧を見る" onclick="location.href='result.php'">
    </form>



    <!-- 隠しコマンドによってボタンが出現したらアドミン画面に移動 -->
    <button id="adminButton" style="display: none;">Go to admin page</button>

    <script>
    const starRating = document.querySelector('.star-rating');
    const stars = starRating.querySelectorAll('input');

    stars.forEach((star) => {
        star.addEventListener('click', () => {
            const rating = star.value;
        });
    });

    //adminボタンを出現させる
    let input = '';
        const secretCode = 'admin';

        window.addEventListener('keydown', (e) => {
            input += e.key;
            input = input.substring(input.length - secretCode.length);

            if (input === secretCode) {
                document.getElementById('adminButton').style.display = 'block';
                document.getElementById('adminButton').addEventListener('click', () => {
                    window.location.href = 'administrator.php';
                });
            }
        });
</script>

</body>
</html>
