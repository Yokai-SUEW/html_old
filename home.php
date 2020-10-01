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
		<link href="navbarStyles.css" rel="stylesheet" type="text/css">
		<link href="mainStyles.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
		<script src="https://kit.fontawesome.com/f119331aa3.js" crossorigin="anonymous"></script>
	</head>
	<body class="loggedin">
				<nav class="navtop">
			<div>
				<h1>Yokai Serverüberwachung</h1>
				<a href="home.php"><i class="fas fa-home fa-lg" aria-hidden="true"></i></a>
				<a href="cctv.html"><i class="fa fa-video-camera fa-lg" aria-hidden="true"></i></a>
                <a href="status.php"><i class="fa fa-server fa-lg" aria-hidden="true"></i></a>
				<a href="profile.php"><i class="fas fa-user-circle fa-lg" aria-hidden="true"></i></a>
				<a href="logout.php"><i class="fas fa-sign-out-alt fa-lg" aria-hidden="true"></i></a>
			</div>
        </nav>
		<div class="content">
			<h2>Home Page</h2>
			<p>Herzlich Willkommen, <?=$_SESSION['name']?>!</p>
		<div>
			<h3>Wozu dient Yokai?</h3>
			<p>
			Mit Yokai könnt ihr euren Serverschrank über einer Kamera und einem Magnet Sensor überwachen.

			Wenn du weitere Fragen hast kannst du uns <a href="mailto:yokai.noreply@gmail.com" id="mail">hier</a> kontaktieren!
			</p>
		</div>
		</div>
	</body>
</html>