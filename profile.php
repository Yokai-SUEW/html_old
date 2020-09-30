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
$stmt->bind_result($password, $email, $_SESSION['name']);
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
		<script src="https://kit.fontawesome.com/f119331aa3.js" crossorigin="anonymous"></script>
	</head>
	<body class="loggedin">
	<!-- Unsere Navigationbar ist in einer externen File gespeichert somit müssen wir nicht jedes mal die Navigationbar eintippen -->
			<nav class="navtop">
			<div>
                <h1>Yokai Serverüberwachung</h1>
				<a href="cctv.html"><i class="fa fa-video-camera fa-fw" aria-hidden="true"></i>CCTV</a>
                <a href="status.php"><i class="fa fa-server fa-fw" aria-hidden="true"></i>Status</a>
				<a href="profile.php"><i class="fas fa-user-circle fa-fw" aria-hidden="true"></i>Profile</a>
				<a href="logout.php"><i class="fas fa-sign-out-alt fa-fw" aria-hidden="true"></i>Logout</a>
			</div>
        </nav>
		<div class="content">
			<h2>Profil von <?=$_SESSION['name']?></h2>
			<div>
				<p>Hier deine Nutzerdaten:</p>
				<table>
					<tr>
						<td>Name:</td>
						<td><?=$_SESSION['name']?></td>
					</tr>
					<tr>
						<td>BCrypt gehashtes Passwort:</td>
						<td><?=$password?></td>
					</tr>
					<tr>
						<td>Email:</td>
						<td><a href="mailto:$email" id="mail"><?=$email?></a></td>
                    </tr>
                    <tr>
                        <td>IP-Adresse:</td>
                        <td><?php echo $_SERVER["REMOTE_ADDR"];?></td>
                    </tr>
                    <tr>
                        <td>Gerät:</td>
                        <td><?php $host = gethostbyaddr($_SERVER["REMOTE_ADDR"]);
                            echo $host;?></td>
                    </tr>
				</table>
			</div>
		</div>
	</body>
</html>