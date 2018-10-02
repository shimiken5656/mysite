<?php
require_once('../require/header.php');
    try {
        $id = (int) $_GET['id'];
        //データベース接続
        $db = new PDO(DB_SERVER, DB_USERNAME, DB_PASSWORD);
        $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        $sql = 'SELECT * FROM task WHERE id = :id';
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
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
      <a href="../index2.php">トップページに戻る</a>
      <form action="edite-confirm.php" method="post">
        <p>カナ苗字:
            <input type="text" name="KlastName" value="<?php echo $result['KlastName'];?>">
        </p>
        <p>カナ名前:
            <input type="text" name="Kname" value="<?php echo $result['Kname'];?>">
        </p>
        <p>苗字:
            <input type="text" name="lastName" value="<?php echo $result['lastName'];?>">
        </p>
        <p>名前:
            <input type="text"  name="name"     value="<?php echo $result['name']; ?>">
        </p>
        <!--
        <p>パスワード:
            <input type="text"  name="password" value="<//?php echo $result['password'];?>">
        </p>
        -->
        <p>男
            <input type="radio" name="sex"      value="1" <?php if ($result['sex'] === 1) {echo 'checked';} ?>>
        </p>
        <p>女
            <input type="radio" name="sex"      value="2" <?php if ($result['sex'] === 2) {echo 'checked';} ?>>
        </p>
        <br>
        <p>生年月日
            <input type="date" name="bday"      value="<?php echo $result['bday'];?>">
        </p>
        <br>

     <input type="hidden" name="id" value="<?php echo $result['id'];?>">
        <p><input type="submit" value="送信">
      </form>
  </body>
</html>
