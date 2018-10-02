<?php
session_start();
require_once('require/header.php');
if (isset($_COOKIE["user"])) {
  echo "ログインが完了しました";
}
?>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <title>トップページ</title>
</head>
<body>
  <div id="practice">トップページ</div>
  <script src="app.js"></script>
  <a href="register.php">新規登録</a>
  <a href="logout.php">ログアウト</a>
  <p>ログイン中 <?php echo $_SESSION['name'];?>さん</p>
<?php


try {
    $db = new PDO(DB_SERVER, DB_USERNAME, DB_PASSWORD);
    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $sql = 'SELECT * FROM task WHERE id = ?';
    $stmt = $db->prepare($sql);
    $stmt->execute([$_SESSION['id']]);
    $result = $stmt->fetchALL(PDO::FETCH_ASSOC);//列名を記述し配列で取り出す設定をしている。配列の最後まで下記を実行し続ける

    echo "<table >\n";//表を作成するための<table>を指定する
    echo "<tr>\n";
    echo "<th>名前</th>
          <th>パスワード</th>
          <th>性別</th>
          <th>日付</th>\n";
    echo "</tr>\n";
foreach ($result as $row) {
        echo "<tr>\n";
        echo '<td>'.$row['name']."</td>\n";
        echo '<td>'.$row['password']."</td>\n";
        if ($row['sex'] === 1) {
            echo '<td>'.'男'."</td>\n";
        } else {
            echo '<td>'.'女'."</td>\n";
        }
        echo '<td>'.$row['bday']."</td>\n";
        echo "<td>\n";
        echo '<a href =correction/edite.php?id='.$row['id'].">変更</a>\n";
        echo '</td>';
        echo "</tr>\n";
    }
    echo "</table>\n";
} catch (PDOException $e) {
    die('エラー:'.$e->getMessage());
}
?>
</body>
</html>
