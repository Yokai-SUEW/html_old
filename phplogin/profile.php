<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('Location: index.html');
	exit;
}
include_once('config_users.php');
// We don't have the password or email info stored in sessions so instead we can get the results from the database.
$stmt = $con->prepare('SELECT password, email FROM accounts WHERE id = ?');
// In this case we can use the account ID to get the account info.
$stmt->bind_param('i', $_SESSION['id']);
$stmt->execute();
$stmt->bind_result($password, $email);
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
                        <td>IP-Adresse</td>
                        <td><?php echo $_SERVER["REMOTE_ADDR"];?></td>
                    </tr>
                    <tr>
                        <td>Gerät::</td>
                        <td><?php $host = gethostbyaddr($_SERVER["REMOTE_ADDR"]);
                            echo $host;?></td>
                    </tr>
				</table>
			</div>
		</div>
	</body>
</html>