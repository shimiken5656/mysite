<?php
$referer = $_SERVER['HTTP_REFERER'];
if ($referer == 'http://localhost:8888/task3/login.php') {
    echo 'ログインおめでと';
} else {
    echo '変更が完了しました';
}
?>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <title>トップページ</title>
</head>
<body>
  <h1>トップページ</h1>
  <a href="register.php">新規登録</a>
<?php

  $dsn = 'mysql:host=localhost;dbname=task;charset=utf8';
  $user = 'root';
  $pass = 'root';

try {
    $db = new PDO($dsn, $user, $pass);
    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $sql = 'SELECT * FROM task ';
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchALL(PDO::FETCH_ASSOC);

    echo "<table >\n";//表を作成するための<table>を指定する
    echo "<tr>\n";
    echo "<th>名前</th>
          <th>パスワード</th>
          <th>性別</th>
          <th>年</th>
          <th>月</th>
          <th>日</th>\n";
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
        echo '<td>'.$row['year']. '年'."</td>\n";
        echo '<td>'.$row['month'].'月'."</td>\n";
        echo '<td>'.$row['day'].  '日'."</td>\n";
        echo "<td>\n";
        echo '<a href =edite.php?id='.$row['id'].">変更</a>\n";
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
