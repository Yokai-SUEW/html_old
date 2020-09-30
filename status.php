<?php
session_start();

if (!isset($_SESSION['loggedin'])) {
	header('Location: index.html');
	exit;
}

include_once('config_status.php');
$result = $con->prepare('SELECT id, temperatur, luftfeuchtigkeit, zeitpunkt FROM dht11');
$result->execute();
$result->bind_result($id, $temperatur, $luftfeuchtigkeit, $zeitpunkt);
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
		<script src="https://kit.fontawesome.com/f119331aa3.js" crossorigin="anonymous"></script>
	</head>
	<body class="loggedin">
			<nav class="navtop">
			<div>
                <h1>Yokai Serverüberwachung</h1>
				<a href="cctv.html"><i class="fa fa-video-camera fa-lg" aria-hidden="true"></i></a>
                <a href="status.php"><i class="fa fa-server fa-lg" aria-hidden="true"></i></a>
				<a href="profile.php"><i class="fas fa-user-circle fa-lg" aria-hidden="true"></i></a>
				<a href="logout.php"><i class="fas fa-sign-out-alt fa-lg" aria-hidden="true"></i></a>
			</div>
		</nav>
        <div class="content">
            <h2>Server Status</h2>
			<div class="tempStatus">
				<h2>Temperatur</h2>
				<?php foreach ($result->query($con) as $row) : ?>
				<table>
					<thead>
					<tr>
						<th>Temperatur</th>
						<th>Zeitpunkt</th>
					</tr>
					</thead>
					<tbody>
					<tr>
						<td><?=$row['temperatur']?></td>
						<td><?=$row['zeitpunkt']?></td>
					</tr>	
					</tbody>
				</table>
			</div>
			<div class="humidityStatus">
			<table>
					<thead>
					<tr>
						<th>Luftfeuchtigkeit</th>
						<th>Zeitpunkt</th>
					</tr>
					</thead>
					<tbody>
					<tr>
						<td><?=$row['luftfeuchtigkeit']?></td>
						<td><?=$row['zeitpunkt']?></td>
					</tr>	
					</tbody>
				</table>
				<?php endforeach; ?>
			</div>
		</div>
        </body>
</html>