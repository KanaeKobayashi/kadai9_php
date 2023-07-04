<!DOCTYPE html>
<html lang="jp">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Search</title>
    <link href="https://unpkg.com/sanitize.css" rel="stylesheet" />
    <link rel="stylesheet" href="./css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <header>
        <h1 class="title">本の検索</h1>
    </header>
    <form class="formWrapper">
        <label for="searchQuery">検索キーワード:</label>
        <input type="text" id="searchQuery" required>
        <button type="button" onclick="searchBooks()">検索</button>
    </form>
    <div id="searchResults"></div>
    <script>
        async function searchBooks() {
            const searchQuery = document.getElementById('searchQuery').value;
            const url = `https://www.googleapis.com/books/v1/volumes?q=${encodeURIComponent(searchQuery)}`;

            try {
                const response = await fetch(url);
                const data = await response.json();

                if (data.totalItems > 0) {
                    const resultsDiv = document.getElementById('searchResults');
                    resultsDiv.innerHTML = ''; // 検索結果をクリア

                    const books = data.items;
                    books.forEach((book) => {
                        const title = book.volumeInfo.title;
                        const authors = book.volumeInfo.authors ? book.volumeInfo.authors.join(', ') : 'Unknown Author';
                        const thumbnail = book.volumeInfo.imageLinks ? book.volumeInfo.imageLinks.thumbnail : '';

                        const bookElement = document.createElement('div');
                        bookElement.innerHTML = `
                            <img src="${thumbnail}" alt="${title}" onclick="selectBook('${title}', '${authors}')">
                            <p><strong>Title:</strong> ${title}</p>
                            <p><strong>Author:</strong> ${authors}</p>
                        `;
                        resultsDiv.appendChild(bookElement);
                    });
                } else {
                    const resultsDiv = document.getElementById('searchResults');
                    resultsDiv.innerHTML = '<p>No results found.</p>';
                }
            } catch (error) {
                console.log(error);
            }
        }

        function selectBook(title, authors) {
            // 選択した本の情報をローカルストレージに保存
            localStorage.setItem('selectedTitle', title);
            localStorage.setItem('selectedAuthor', authors);
            // 元のページに戻る
            window.location.href = 'index.php';
        }
    </script>
</body>
</html>