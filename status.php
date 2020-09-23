<?php
session_start();

if (!isset($_SESSION['loggedin'])) {
	header('Location: index.html');
	exit;
}

include_once('config_status.php');

$stmt = $con->prepare('SELECT id, temperatur, luftfeuchtigkeit, last_ssh_login, current_ssh_login, current_xrdp_connections FROM status');
$stmt->execute();
$stmt->bind_result($id, $temperatur, $luftfeuchtigkeit, $last_ssh_login, $current_ssh_login, $current_xrdp_connections);
$stmt->fetch();
$stmt->close();
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Profil von <?=$_SESSION['name']?></title>
		<link href="style.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
	</head>
	<body class="loggedin">
	<? include_once('header.php'); ?>
        <div class="content">
            <h2>Server Status <i class="fa fa-server" aria-hidden="true"></i></h2>
			<div class="tempStatus">
				<p>> <?= $temperatur?></p>		
			</div>
			<div class="humidityStatus">
			<p>> <?= $luftfeuchtigkeit?></p>
			</div>
        </div>
        </body>
</html>