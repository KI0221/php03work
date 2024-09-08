<?php
//1.  DB接続します
try {
  //ID:'root', Password: xamppは 空白 ''
  $pdo = new PDO('mysql:dbname=gs_db_class;charset=utf8;host=localhost','root','');
} catch (PDOException $e) {
  exit('DBConnectError:'.$e->getMessage());
}

//２．データ取得SQL作成
$stmt = $pdo->prepare("SELECT * FROM gs_bookmark_table");

// 保存ボタンを押すことに相当する
$status = $stmt->execute();

//３．データ表示
$view = '';
if ($status==false) {
    //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("ErrorQuery:".$error[2]);

}
?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>ブックマーク表示</title>
  <link rel="stylesheet" href="css/range.css">
  <link href="css/style.css" rel="stylesheet">
</head>

<body id="main">
  <header>
    <nav>
      <a href="index.php">ブックマーク登録</a>
    </nav>
  </header>

  <main>
    <div class="container">
      <h1>ブックマーク一覧</h1>
      <div class="survey-list">
        <!-- PHP でデータを取得し、以下の形式で表示する -->
         <!-- //while：繰り返し文 -->
        <?php while ($result = $stmt->fetch(PDO::FETCH_ASSOC)): ?> 
          <p> 
          <a href="detail.php?id=<?php echo htmlspecialchars($result['id'], ENT_QUOTES, 'UTF-8')?>">
            <?= htmlspecialchars($result['date'], ENT_QUOTES, 'UTF-8') ?> : 
            <?= htmlspecialchars($result['book_name'], ENT_QUOTES, 'UTF-8') ?> -
            <?= htmlspecialchars($result['book_comment'], ENT_QUOTES, 'UTF-8') ?> 
          </a>
          <form method="POST" action="delete.php">
		        <input type="hidden" name="id" value="<?= htmlspecialchars($result['id'], ENT_QUOTES, 'UTF-8') ?>">
		        <input type="submit" value="削除">
		      </form>
          </p>
        <?php endwhile; ?>

      </div>
    </div>
  </main>

</body>

</html>