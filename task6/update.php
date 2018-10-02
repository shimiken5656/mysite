<?php
//データベースに接続
$dsn = 'mysql:host=localhost;dbname=task;charset=utf8';
$user= 'root';
$pass = 'root';


$name	  = $_POST['name'];
$password = $_POST['password'];
$sex	  = (int) $_POST['sex'];//URLで数字はPOSTすると文字列と扱われるため、intを使い数字に直して代入
$year     = $_POST['year'];
$month    = $_POST['month'];
$day      = $_POST['day'];

//POST変数からidをうけとる
//URLからidを受け取る処理を行う
try{

	$id = (int) $_POST['id'];
	//データベース接続
	$db = new PDO($dsn,$user,$pass);
	$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
	$sql = "UPDATE task SET name = ?, password = ?, sex = ?, year = ?, month = ?, day = ? WHERE id = ?";
	$stmt = $db->prepare($sql);
	$stmt->bindValue(1, $name,     PDO::PARAM_STR);
	$stmt->bindValue(2, $password, PDO::PARAM_STR);
	$stmt->bindValue(3, $sex, 	   PDO::PARAM_INT);
	$stmt->bindValue(4, $year,	   PDO::PARAM_STR);
	$stmt->bindValue(5, $month,    PDO::PARAM_STR);
	$stmt->bindValue(6, $day,	   PDO::PARAM_STR);
	$stmt->bindValue(7, $id,       PDO::PARAM_INT);
	$stmt->execute();
	//index.phpに戻る
	header('Location: index2.php');
}catch(PDOException $e) {
    die ('エラー:' . $e->getMessage());
}
?>

