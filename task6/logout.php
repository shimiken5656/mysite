<?php
session_start();
if (isset($_SESSION['id'])) {//ログインしてセッションにユーザーIDがあった場合、
	unset($_SESSION['id']);//unset関数を使ってユーザーIDを削除。unset関数は引数に指定された変数そのものを削除する関数です。変数にnullや０を代入した場合、変数自体を消したわけではないのでisset関数の返り値はtrueになるはずですが、unset関数は変数自体を削除するため、isset関数はfalseを返します。
}
	header('Location: login.php')
?>