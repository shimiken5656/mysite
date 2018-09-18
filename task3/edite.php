<?php
//サーバーメソッドを調べ、それがpostで送られてきているかを調べる関数
//ポストバック
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //データベースに接続
    $dsn  = 'mysql:host=localhost;dbname=task;charset=utf8';
    $user = 'root';
    $pass = 'root';

    $name     =  $_POST['name'];
    $password =  $_POST['password'];
    $sex      = (int) $_POST['sex'];//URLで数字はPOSTすると文字列と扱われるため、intを使い数字に直して代入
    $year     =  $_POST['year'];
    $month    =  $_POST['month'];
    $day      =  $_POST['day'];

//POST変数からidをうけとる
//URLからidを受け取る処理を行う
    try {
        $id = (int) $_POST['id'];
        //データベース接続
        $db = new PDO($dsn, $user, $pass);
        $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        $sql  = 'UPDATE task SET name = ?, password = ?, sex = ?, year = ?, month = ?, day = ? WHERE id = ?';
        $stmt = $db->prepare($sql);
        $stmt->bindValue(1, $name,     PDO::PARAM_STR);
        $stmt->bindValue(2, $password, PDO::PARAM_STR);
        $stmt->bindValue(3, $sex,      PDO::PARAM_INT);
        $stmt->bindValue(4, $year,     PDO::PARAM_STR);
        $stmt->bindValue(5, $month,    PDO::PARAM_STR);
        $stmt->bindValue(6, $day,      PDO::PARAM_STR);
        $stmt->bindValue(7, $id,       PDO::PARAM_INT);
        $stmt->execute();
        header('Location: index2.php');
    } catch (PDOException $e) {
        die('エラー:'.$e->getMessage());
    }
}
?>

<?php
    $dsn  = 'mysql:host=localhost;dbname=task;charset=utf8';
    $user = 'root';
    $pass = 'root';

    try {
        $id = (int) $_GET['id'];
        //データベース接続
        $db = new PDO($dsn, $user, $pass);
        $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        $sql = 'SELECT * FROM task WHERE id = ?';
        $stmt = $db->prepare($sql);
        $stmt->bindValue(1, $id, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        die('エラー:'.$e->getMessage());
    }
?>
<html>
  <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
      <title>修正版</title>
  </head>
  <body>
      <h1>修正板</h1>
      <a href="index2.php">トップページに戻る</a>
      <form action="" method="post">
        <p>名前:      <input type="text"  name="name"     value="<?php echo $result['name']; ?>">
        <p>パスワード: <input type="text"  name="password" value="<?php echo $result['password'];?>">
        <p>男         <input type="radio" name="sex"      value="1" <?php if ($result['sex'] === 1) {echo 'checked';} ?>>
        <p>女         <input type="radio" name="sex"      value="2" <?php if ($result['sex'] === 2) {echo 'checked';} ?>>
        <br>
        <select name="year">
<?php

    $now = date('Y');
    for ($i = 1950; $i <= $now; ++$i) {
        if ($i == $result['year']) {
            echo ' <option value="'.$i.'" selected>'.$i."</option>\n";
            //<option value="$i" selected="$i"></option>エスケープシーケンス
        } else {
            echo ' <option value="'.$i.'">'.$i."</option>\n";
        }
    }
?>
        </select>年

        <select name="month">
<?php

    for ($i = 1; $i <= 12; ++$i) {
        if ($i == $result['month']) {
            echo ' <option value="'.$i.'" selected>'.$i."</option>\n";
            //<option value="$i" selected="$i"></option>
        } else {
            echo ' <option value="'.$i.'">'.$i."</option>\n";
        }
    }
?>
        </select>月

        <select name="day">
<?php

    for ($i = 1; $i <= 31; ++$i) {
        if ($i == $result['day']) {
            echo ' <option value="'.$i.'" selected>'.$i."</option>\n";
         //<option value="$i" selected="$i"></option>
        } else {
            echo ' <option value="'.$i.'">'.$i."</option>\n";
        }
    }
?>
        </select>日
        <br>

        <input type="hidden" name="id" value="<?php echo $result['id'];?>">
        <p><input type="submit" value="送信">
      </form>
  </body>
</html>
