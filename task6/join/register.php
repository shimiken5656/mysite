<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>ログイン前</title>
    <script src="app.js" type="text/javascript"></script>
  </head>
  <body>
    <h1>自己紹介</h1>
    <h2>ユーザ新規登録</h2>
    <form action="confirm.php" method="post">
      <p>カナ苗字
        <input type="text" name="KlastName" input pattern="^[ァ-ン]+$"
               title="全角カタカナでご入力ください。">
      </p>
      <p>カナ名前
        <input type="text" name="Kname" input pattern="^[ァ-ン]+$"
               title="全角カタカナでご入力ください。">
      </p>
      <p>苗字
        <input type="text" name="lastName">
      </p>
      <p>名前
        <input type="text" name="name" >
      </p>
      <p>パスワード
        <input id="password" type="text" name="password">
      </p>
      <div id="pass_message"></div>
      <p>パスワード確認
        <input type="password" name="confirm_password" id="confirm_password"
        onkeyup="setConfirmMessage(this.value);">
      </p>
      <div id="pass_confirm_message"></div>
      <input type="radio" name="sex" value="1">男
      <input type="radio" name="sex" value="2">女
      <br>
      生年月日<input type="date" name="bday" value="<?php echo date('Y-m-j');?>">
      <br>
      <input type="submit" value="送信">
    </form>
  </body>
</html>
