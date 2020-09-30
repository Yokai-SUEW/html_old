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
<?php

require_once('config_status.php');

$sql = "SELECT id, temperatur, zeitpunkt FROM dht11";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
	while($row = mysqli_fetch_assoc($result)) {
		echo "<p>";
		echo "<table>";
		echo "<tbody>";
		echo "<tr>";
			echo "<td> > " . $row["temperatur"] . " | " . $row["zeitpunkt"] . "</td>";
		echo "</tr>";
		echo "</tbody>";
		echo "</table>";
		echo "</p>";
	}
}
		?>
			</div>
			<div class="humidityStatus">
				<h2>Luftfeuchtigkeit</h2>
				<?php

require_once('config_status.php');

$sql = "SELECT id, luftfeuchtigkeit, zeitpunkt FROM dht11";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
	while($row = mysqli_fetch_assoc($result)) {
		echo "<p>";
		echo "<table>";
		echo "<tbody>";
		echo "<tr>";
			echo "<td> > " . $row["luftfeuchtigkeit"] . " | " . $row["zeitpunkt"] . "</td>";
		echo "</tr>";
		echo "</tbody>";
		echo "</table>";
		echo "</p>";
	}
}
?>
			</div>
		</div>
        </body>
</html>