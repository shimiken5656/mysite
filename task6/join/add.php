<?php
require_once('../require/header.php');
$KlastName = $_POST['KlastName'];
$Kname =     $_POST['Kname'];
$lastName =  $_POST['lastName'];
$name     =  $_POST['name'];
$password =  $_POST['password'];
$sex      =(int) $_POST['sex'];//URLで数字はPOSTすると文字列と扱われるため、intを使い数字に直して代入
$bday     =  $_POST['bday'];

try {
    $db = new PDO(DB_SERVER, DB_USERNAME, DB_PASSWORD);
    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $sql = 'INSERT INTO task (KlastName,Kname,lastName,name, password, sex, bday) VALUES (:KlastName,:Kname,:lastName,:name, :password, :sex, :bday)';
    //カラム名を順番に指定していく。VALUES以下で?にブレースホルダを指定して行く
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':KlastName', $KlastName, PDO::PARAM_STR);
    $stmt->bindParam(':Kname',     $Kname,     PDO::PARAM_STR);
    $stmt->bindParam(':lastName',  $lastName,  PDO::PARAM_STR);
    $stmt->bindParam(':name',      $name,      PDO::PARAM_STR);
    $stmt->bindParam(':password',  $password,  PDO::PARAM_STR);
    $stmt->bindParam(':sex',       $sex,       PDO::PARAM_INT);
    $stmt->bindParam(':bday',      $bday,      PDO::PARAM_STR);

    $stmt->execute();
    echo "登録が完了しました";;
} catch (PDOException $e) {
    die('エラー:'.$e->getMessage());
}
?>

<!DOCTYPE html>
<html>
  <meta http-equiv="refresh"content="2; url=http://localhost/task6/login.php">
  <head>
    <title>完了ページ</title>
  </head>
  <body>
  </body>
</html>
