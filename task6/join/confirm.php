<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>確認フォーム</title>
  </head>
  <body>
    <h2>確認ページ</h2>
    <form method="post" action="add.php">
      <p><?php echo "カナ苗字:". $_POST['KlastName'];?></p>
      <p><?php echo "カナ名前:". $_POST['Kname'];?></p>
      <p><?php echo "苗字:". $_POST['lastName'];?>
      <p> <?php echo "名前:". $_POST['name'];?>
      <p> <?php echo "パスワード:". $_POST['password'];?>
      <p> <?php
           $sex = ($_POST['sex'] == 1) ? "男":"女";
             echo "性別:" . $sex;?>
      <p><?php $date = new DateTime($_POST['bday']);
             echo $date->format('Y年n月j日');?>
      <br>
      <input type="submit" name="送信">
      <a href="register.php">戻る</a>
      <input type="hidden" name="KlastName" value="<?php echo $_POST['KlastName'];?>">
      <input type="hidden" name="Kname"     value="<?php echo $_POST['Kname'];?>">
      <input type="hidden" name="lastName"  value="<?php echo $_POST['lastName'];?>">
      <input type="hidden" name="name"      value="<?php echo $_POST['name'];?>">
      <input type="hidden" name="password"  value="<?php echo $_POST['password'];?>">
      <input type="hidden" name="sex"       value="<?php echo $_POST['sex'];?>">
      <input type="hidden" name="bday"      value="<?php echo $_POST['bday'];?>">
    </form>
  </body>
</html>
