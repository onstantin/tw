<?php 	
	error_reporting(E_ALL);
	require_once "config.php";
	require_once "guestbook.php";	
	
	$name = "";
	$message = "";
	$error = "";
	
	if (isset($_POST['name']) && isset($_POST['message'])) {
		if ($_POST['name']=="" || $_POST['message']=="") {
			$name = $_POST['name'];
			$message = $_POST['message'];
			$error = "Заполнены не все поля формы!";
		} else {
			$guestbook = new Guestbook(DB_HOST, DB_NAME, DB_USER_NAME, DB_USER_PASSWORD, "guestbook");
			$guestbook->create($_POST);
			header("Location: index.php");
			die;
		}
	}
	
?>

<!DOCTYPE html>
<html>
<head>
	<title>Добавить новое сообщение в Гостевую книгу</title>
	<meta charset="utf-8">
	<link type="text/css" href="style.css" rel="stylesheet" charset="utf-8"> 
</head>
<body> 
	<h1>Введите имя и сообщение</h1>
	<p><?= $error ?></p>
	<form action="" method="post">
		<input type="text" name="name" placeholder="Введите имя" value="<?= $name ?>"><br/>
		<textarea name="message" placeholder="Введите соообщение"><?= $message ?></textarea><br/>
		<button>Oтправить</button>
	</form>	
</body> 	
</html>
