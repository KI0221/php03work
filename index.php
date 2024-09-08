<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>ブックマーク登録</title>
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <!-- Head[Start] -->
    <header>
        <nav>
            <a href="select.php">ブックマーク一覧</a>
        </nav>
    </header>
    <!-- Head[End] -->

    <!-- Main[Start] -->
    <main>
        <form method="POST" action="insert.php">
            <fieldset>
                <legend>ブックマーク</legend>
                <label for="book_name">書籍名</label>
                <input type="text" id="book_name" name="book_name" required placeholder="書籍名を入力ください">

                <label for="book_url">書籍URL</label>
                <input type="text" id="book_url" name="book_url" required placeholder="書籍のURLを入力ください">

                <label for="book_comment">書籍コメント</label>
                <textarea id="book_comment" name="book_comment" rows="4" required placeholder="書籍を読んだ感想をご記入ください"></textarea>

                <input type="submit" value="登録する">
            </fieldset>
        </form>
    </main>
    <!-- Main[End] -->

</body>

</html>