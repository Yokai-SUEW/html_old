<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
	header('Location: index.html');
	exit;
}
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Home Page</title>
		<link href="style.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
	</head>
	<body class="loggedin">
		<? include_once('header.php'); ?>
		<div class="content">
			<h2>Home Page</h2>
			<p>Herzlich Willkommen, <?=$_SESSION['name']?>!</p>
		</div>
	</body>
</html>