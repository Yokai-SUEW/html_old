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
<link rel="shortcut icon" type="image/png" href="../images/logo_normal.png">
		<link href="navbarStyles.css" rel="stylesheet" type="text/css">
		<link href="mainStyles.css" rel="stylesheet" type="text/css">
		<link href="statusStyles.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
		<script src="https://kit.fontawesome.com/f119331aa3.js" crossorigin="anonymous"></script>
	</head>
	<body class="loggedin">
			<nav class="navtop">
			<div>
				<h1>Yokai Serverüberwachung</h1>
				<a href="home.php"><abbr title="Home"><i class="fas fa-home fa-lg" aria-hidden="true"></i></abbr></a>
				<a href="cctv.php"><abbr title="CCTV"><i class="fa fa-eye fa-lg" aria-hidden="true"></i></a>
                <a href="status.php"><abbr title="Server Status"><i class="fa fa-server fa-lg" aria-hidden="true"></i></a>
				<a href="profile.php"><abbr title="My Profile"><i class="fas fa-user-circle fa-lg" aria-hidden="true"></i></a>
				<a href="logout.php"><abbr title="Logout"><i class="fas fa-sign-out-alt fa-lg" aria-hidden="true"></i></a>
			</div>
        </nav>
        <div class="content">
		<h2>Server Status</h2>
		<div class="tempStatus">
		<h2>Temperatur</h2>
		<p>
<?php

require_once('config_status.php');

$sql = "SELECT id, Temperatur, Luftfeuchtigkeit, Datum FROM sensor_status";
$result = mysqli_query($conn, $sql);
echo "<h1>Temperatur</h1>";
echo "<table>";
		echo "<tbody>";
		echo "<tr>";
			echo "<th>Temperatur</th>";
			echo "<th>Datum</th>";
		echo "</tr>";

if (mysqli_num_rows($result) > 0) {
	while($row = mysqli_fetch_assoc($result)) {
		echo "<tr>";
			echo "<td>" . $row["Temperatur"] . " C&deg;" . "</td>";
			echo "<td>" . $row["Datum"] . "</td>";
		echo "</tr>";
	}
}
echo "</tbody>";
echo "</table>";
		?>
		</p>
			</div>
			<div class="humidityStatus">
				<h2>Luftfeuchtigkeit</h2>
				<p>
				<?php

require_once('config_status.php');

$sql = "SELECT id, Temperatur, Luftfeuchtigkeit, Datum FROM sensor_status";
$result = mysqli_query($conn, $sql);

echo "<h1>Luftfeuchtigkeit</h1>";
echo "<table>";
		echo "<tbody>";
		echo "<tr>";
			echo "<th>Luftfeuchtigkeit</th>";
			echo "<th>Datum</th>";
		echo "</tr>";

if (mysqli_num_rows($result) > 0) {
	while($row = mysqli_fetch_assoc($result)) {
		
		echo "<tr>";
			echo "<td>" . $row["Luftfeuchtigkeit"] . " %" . "</td>";
			echo "<td>" . $row["Datum"] . "</td>";
		echo "</tr>";
	}
}
echo "</tbody>";
echo "</table>";
?>
			</p>
			</div>
		</div>
		<div>

		</div>
        </body>
</html>