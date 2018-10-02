<?php
require_once('../require/header.php');
//ポストバック
//if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //データベースに接続

    $KlastName  = $_POST['KlastName'];
    $Kname      = $_POST['Kname'];
    $lastName   = $_POST['lastName'];
    $name       =  $_POST['name'];
    //$password =  $_POST['password'];
    $sex        = (int) $_POST['sex'];
    $bday       =  $_POST['bday'];

    try {
        $id = (int) $_POST['id'];
        //データベース接続
        $db = new PDO(DB_SERVER, DB_USERNAME, DB_PASSWORD);
        $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        $sql  = 'UPDATE task SET KlastName = :KlastName, Kname = :Kname,lastName = :lastName, name = :name, sex = :sex, bday = :bday WHERE id = :id';
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':KlastName', $KlastName, PDO::PARAM_STR);
        $stmt->bindParam(':Kname',     $Kname,     PDO::PARAM_STR);
        $stmt->bindParam(':lastName',  $lastName,  PDO::PARAM_STR);
        $stmt->bindParam(':name',      $name,      PDO::PARAM_STR);
        //$stmt->bindParam(':password', $password, PDO::PARAM_STR);
        $stmt->bindParam(':sex',       $sex,       PDO::PARAM_INT);
        $stmt->bindParam(':bday',      $bday,      PDO::PARAM_STR);
        $stmt->bindParam(':id',        $id,        PDO::PARAM_INT);
        $stmt->execute();
        setcookie('user','edit',time()+60);
        header('Location: ../index2.php');

    } catch (PDOException $e) {
        die('エラー:'.$e->getMessage());
    }
//}
?>
