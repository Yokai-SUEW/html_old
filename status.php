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
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
		<script src="https://kit.fontawesome.com/f119331aa3.js" crossorigin="anonymous"></script>
	</head>
	<body class="loggedin">



			<nav class="navbar bg-dark navbar-dark">
				<a class="navbar-brand" href="http://yokai.ddns.net/">Yokai Serverüberwachung</a>

				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        	    <span class="navbar-toggler-icon"></span>
        		</button>

		<div class="collapse navbar-collapse" id="collapsibleNavbar">
           	<ul class="navbar-nav ml-auto">
               	<li class="nav-item">
					<a href="home.php"><abbr title="Home"><i class="fas fa-home fa-lg" aria-hidden="true"></i></abbr> Home</a>
				</li>
				<li class="nav-item">
					<a href="cctv.php"><abbr title="CCTV"><i class="fa fa-eye fa-lg" aria-hidden="true"></i></abbr> CCTV</a>
				</li>
				<li class="nav-item">
					<a href="status.php"><abbr title="Server Status"><i class="fa fa-server fa-lg" aria-hidden="true"></i></abbr> Server Status</a>
				</li>
				<li class="nav-item">
					<a href="profile.php"><abbr title="My Profile"><i class="fas fa-user-circle fa-lg" aria-hidden="true"></i></abbr> My Profile</a>
				</li>
				<li class="nav-item">
					<a href="logout.php"><abbr title="Logout"><i class="fas fa-sign-out-alt fa-lg" aria-hidden="true"></i></abbr> Logout</a> 
				</li>
			</ul>
		</div>
			</nav>


		<div class="col-md-8 offset-md-2 statusTable">

		</div>


		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
     	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
      	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
        </body>
</html>