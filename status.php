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
		<title>Profil von <?=$_SESSION['name']?></title>
		<link href="style.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
	</head>
	<body class="loggedin">
			<nav class="navtop">
			<div>
                <h1>Yokai Serverüberwachung</h1>
                <a href="status.php"><i class="fa fa-server" aria-hidden="true"></i>Status</a>
				<a href="profile.php"><i class="fas fa-user-circle"></i>Profile</a>
				<a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
			</div>
		</nav>
        <div class="content">
            <h2>Server Status <i class="fa fa-server" aria-hidden="true"></i></h2>
			<div class="tempStatus">
				<h2>Temperatur</h2>
				<?php
				include_once('config_status.php');
				$result = mysqli_query($con, "SELECT temperatur FROM status");
				
				echo "<table border='1'>";

				while($row = mysqli_fetch_array($result))
				{
					echo "<tr>";
					echo "<td>" .$row['temperatur'] . "</td>";
					echo "</tr>";
				}
				echo "</table>";

				mysqli_close($con);
				?>
			</div>
			<div class="humidityStatus">
			<h2>Luftfeuchtigkeit</h2>
			<p>> <?= $luftfeuchtigkeit?></p>
			</div>
		</div>
        </body>
</html>