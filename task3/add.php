<?php

$user     = 'root';
$pass     = 'root';

$name     =     $_POST['name'];
$password = $_POST['password'];
$sex      =(int) $_POST['sex'];//URLで数字はPOSTすると文字列と扱われるため、intを使い数字に直して代入
$year     =     $_POST['year'];
$month    =    $_POST['month'];
$day      =      $_POST['day'];
try {
    $db = new PDO('mysql:host=localhost;dbname=task;charset=utf8', $user, $pass);
    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $sql = 'INSERT INTO task (name, password, sex, year, month, day) VALUES (?, ?, ?, ?, ?, ?)';
    //カラム名を順番に指定していく。VALUES以下で?にブレースホルダを指定して行く
    $stmt = $db->prepare($sql);
    $stmt->bindValue(1, $name,     PDO::PARAM_STR);
    $stmt->bindValue(2, $password, PDO::PARAM_STR);
    $stmt->bindValue(3, $sex,      PDO::PARAM_INT);
    $stmt->bindValue(4, $year,     PDO::PARAM_STR);
    $stmt->bindValue(5, $month,    PDO::PARAM_STR);
    $stmt->bindValue(6, $day,      PDO::PARAM_STR);
    $stmt->execute();
    header('Location: login.php');
} catch (PDOException $e) {
    die('エラー:'.$e->getMessage());
}
