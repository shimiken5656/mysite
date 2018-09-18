<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>ログイン前</title>
  </head>
  <body>
    <h1>自己紹介</h1>
    <h2>ユーザ新規登録</h2>
    <form action="confirm.php" method="post">
      <p>ログインユーザ名<input type="text" name="name" >
      <br>
      <p>パスワード<input type="text" name="password">
      <br>
      <input type="radio" name="sex" value="1">男
      <input type="radio" name="sex" value="2">女
      <br>

      <select name="year">
        <?php
          $now = date('Y');
          for ($i = 1950; $i <= $now; ++$i):?>
          <option value="<?php echo $i;?>"> <?php echo $i;?></option>
        <?php endfor;?>
      </select>年

      <select name="month">
        <?php
          for ($i = 1; $i <= 12; ++$i):?>
        <option value="<?php echo $i;?>"> <?php echo $i;?></option>
        <?php endfor;?>
      </select>月

      <select name="day">
        <?php
          for ($i = 1; $i <= 31; ++$i):?>
        <option value="<?php echo $i;?>"> <?php echo $i;?></option>
        <?php endfor;?>
      </select>日
      <br>

      <input type="submit" value="送信">
    </form>
  </body>
</html>
