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
				<?php
				include_once('config_status.php');
				?>
			</div>
			<div class="humidityStatus">
				<?php
				include_once('config_status.php');
				?>
			</div>
        </div>
        </body>
</html>