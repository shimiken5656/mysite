<?php

$user     = 'root';
$password = 'root';

//ユーザ名とパスワードが送信された時
if (isset($_POST['name']) && isset($_POST['password'])) {//論理積
    try {
         /*
          *プリペアドステートメントを作成
          *プリペアドステートメントは名前が:nameかつパスワード:passであるユーザを検索している
          */
        $dbh  = new PDO('mysql:host=localhost;dbname=task;charset=utf8', $user, $password);
        $dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        $stmt = $dbh->prepare('SELECT * FROM task WHERE name= :name AND password= :pass');

        $stmt->bindParam(':name', $_POST['name'],     PDO::PARAM_STR);
        $stmt->bindParam(':pass', $_POST['password'], PDO::PARAM_STR);
        $stmt->execute();

        if ($stmt->fetch()) {//値の取得を行います
           header('Location: index2.php');
           exit();
        } else {
           header('Location: login.php');
           exit();
        }
    } catch (PDOException $e) {
        die ('エラー:'.$e->getMessage());
    }
} else {//パスワード、名前を送っていない場合は、html表示
?>

<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>ログイン画面</title>
  </head>
  <body>
    <h1>ログインサイト</h1>
    <h2>ログイン</h2>
    <form action="login.php" method="post">
      <p>ユーザ名:   <input type="text" name="name">
      <p>パスワード: <input type="text" name="password">
      <p><input type="submit" value="ログイン">
    </form>
    <a href="register.php">新規登録</a>
  </body>
</html>
<?php } ?>
