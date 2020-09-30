<?php
session_start();

if (!isset($_SESSION['loggedin'])) {
	header('Location: index.html');
	exit;
}

include_once('config_status.php');
$result = $con->prepare('SELECT id, temperatur, luftfeuchtigkeit, last_ssh_login, current_ssh_login, current_xrdp_connections FROM status');
$result->bind_result($id, $temperatur, $luftfeuchtigkeit, $last_ssh_login, $current_ssh_login, $current_xrdp_connections);
$result->fetch();
$result->close();
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Profil</title>
		<link href="style.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
	</head>
	<body class="loggedin">
			<nav class="navtop">
			<div>
                <h1>Yokai Serverüberwachung</h1>
				<a href="cctv.html"><i class="fa fa-video-camera" aria-hidden="true"></i>CCTV</a>
                <a href="status.php"><i class="fa fa-server" aria-hidden="true"></i>Status</a>
				<a href="profile.php"><i class="fas fa-user-circle" aria-hidden="true"></i>Profile</a>
				<a href="logout.php"><i class="fas fa-sign-out-alt" aria-hidden="true"></i>Logout</a>
			</div>
		</nav>
        <div class="content">
            <h2>Server Status <i class="fa fa-server" aria-hidden="true"></i></h2>
			<div class="tempStatus">
				<h2>Temperatur</h2>
				<p>> <?= $temperatur?>C &deg;</p>
			</div>
			<div class="humidityStatus">
				<h2>Luftfeuchtigkeit</h2>
				<p>> <?= $luftfeuchtigkeit?></p>
			</div>
		</div>
        </body>
</html>