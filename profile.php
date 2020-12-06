<?php
session_start();
// Hier wird nachgeschaut ob der User angemeldet ist... 
if (!isset($_SESSION['loggedin'])) {
	header('Location: index.html');
	exit;
}
include_once('config_users.php');
// Die E-Mails und die Passwörter werden nicht in einer Session gespeichert deshalb holen wir diese aus der Datenbank.
$stmt = $con->prepare('SELECT password, email, username FROM accounts WHERE id = ?');
// Wir nutzen einfach die Session ID um die Informationen zu bekommen.
$stmt->bind_param('i', $_SESSION['id']);
$stmt->execute();
$stmt->bind_result($password, $email, $name);
$stmt->fetch();
$stmt->close();
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Profil von <?=$name?></title>
<link rel="shortcut icon" type="image/png" href="../images/logo_normal.png">
		<link href="navbarStyles.css" rel="stylesheet" type="text/css">
		<link href="mainStyles.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
		<script src="https://kit.fontawesome.com/f119331aa3.js" crossorigin="anonymous"></script>
	</head>
	<body class="loggedin">
	<!-- Unsere Navigationbar ist in einer externen File gespeichert somit müssen wir nicht jedes mal die Navigationbar eintippen -->
	<nav class="navtop">
			<div>
				<h1>Yokai Serverüberwachung</h1>
				<a href="home.php"><i class="fas fa-home fa-lg" aria-hidden="true"></i></a>
				<a href="cctv.php"><i class="fa fa-eye fa-lg" aria-hidden="true"></i></a>
                <a href="status.php"><i class="fa fa-server fa-lg" aria-hidden="true"></i></a>
				<a href="profile.php"><i class="fas fa-user-circle fa-lg" aria-hidden="true"></i></a>
				<a href="logout.php"><i class="fas fa-sign-out-alt fa-lg" aria-hidden="true"></i></a>
			</div>
        </nav>
	</body>
</html>