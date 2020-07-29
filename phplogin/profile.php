<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('Location: index.html');
	exit;
}
$DATABASE_HOST = 'sql101.epizy.com';
$DATABASE_USER = 'epiz_26371947';
$DATABASE_PASS = 'TGTmRdu3SjSgFf';
$DATABASE_NAME = 'epiz_26371947_phplogin';
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if (mysqli_connect_errno()) {
	exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}
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
		<nav class="navtop">
			<div>
                <h1>Yokai Serverüberwachung</h1>
                <a href="status.php"><i class="fa fa-server" aria-hidden="true"></i>Status</a>
				<a href="profile.php"><i class="fas fa-user-circle"></i>Mein Profil</a>
                <a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
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