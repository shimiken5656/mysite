<?php
session_start();
$user     = 'root';
$password = 'root';

try{
$dbh = new PDO('mysql:host=localhost;dbname=task;charset=utf8',$user,$password);
$dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);

$stmt = $dbh->prepare("SELECT * FROM task WHERE name= :name AND password= :pass");//プリペアドステートメントは名前が:nameかつパスワード:passであるユーザを検索している

$stmt->bindParam(':name', $_POST['name'],     PDO::PARAM_STR);
$stmt->bindParam(':pass', $_POST['password'], PDO::PARAM_STR);

$stmt->execute();

if($row = $stmt->fetch()){
	//ユーザが存在していたので、セッションにユーザIDをセット
	$_SESSION['id'] = $row['id'];
	header('Location: index2.php');
	exit();
}else{
	//1レコードも取得できなかったとき
	//ユーザ名・パスワードが間違っている可能性あり
	//もう一度ログインフォームを表示
	echo "ユーザー名かパスワードが間違っている";
	exit();
}
}catch(PDOException $e){
	die('エラー:' . $e->getMessage());
}


?>
