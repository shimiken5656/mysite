<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>確認フォーム</title>
  </head>
  <body>
    <h2>確認ページ</h2>
    <form method="post" action="add.php">
      <p> <?php echo "ログイン名:". $_POST['name'];?>
      <br>
      <p> <?php echo "パスワード:". $_POST['password'];?>
      <br>
      <p> <?php echo "性別:". $_POST['sex'];?>
      <br>
      <p> <?php echo "西暦:". $_POST['year'];?>
      <br>
      <p> <?php echo $_POST['month'] . "月";?>
      <br>
      <p> <?php echo $_POST['day'] . "日";?>
      <input type="submit" name="送信">
      <input type="hidden" name="name"     value="<?php echo $_POST['name'];?>">
      <input type="hidden" name="password" value="<?php echo $_POST['password'];?>">
      <input type="hidden" name="sex"      value="<?php echo $_POST['sex'];?>">
      <input type="hidden" name="year"     value="<?php echo $_POST['year'];?>">
      <input type="hidden" name="month"    value="<?php echo $_POST['month'];?>">
      <input type="hidden" name="day"      value="<?php echo $_POST['day'];?>">
    </form>
  </body>
</html>
