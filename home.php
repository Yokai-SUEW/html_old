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
		<link rel="shortcut icon" type="image/png" href="../images/logo_normal.png">
		<link href="navbarStyles.css" rel="stylesheet" type="text/css">
		<link href="mainStyles.css" rel="stylesheet" type="text/css">
		<link href="homeStyles.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
		<script src="https://kit.fontawesome.com/f119331aa3.js" crossorigin="anonymous"></script>
	</head>
	<body class="loggedin">
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
		<div class="content">
			<h2>Home Page</h2>
		<div class="redbox">
		<i class="fas fa-info"></i>
			<h3>Was kann Yokai?</h3>
			<p class="aboutYokai">
			Yokai dient zur analogen- und digitalen Überwachung eines
Serverschrankes. Dabei kann man sehen wer wann den Serverschrank geöffnet hat. Aber auch digitale Fingerabdrücke können gespeichert und angezeigt werden. Ebenso werden Temperatur und Luftfeuchtigkeit im Serverschrank selbst gemessen.
Je nachdem wie die Temperatur im Serverschrank ist werden die Lüftergeschwindigkeiten verändert.
			 </p>
			 <h3>Ist das Rechtlich möglich?</h3>
			 <p class="aboutYokai">
			 Ja, der Serverschrank ist Eigentum der Schule.
Solange keine Straftat begangen wird werden weder Bild
noch andere Informationen benutzt. Ebenso werden
außerhalb des Serverschrankes Warnschilder zusehen sein
welche eindeutig darauf hinweisen das der Serverschrank
überwacht wird.
			 </p>
			 <h3>Welche Funktionen bietet Yokai?</h3>
			 <p>
			Yokai bietet einige sehr gute Funktionen an:
			<ul>
				<li><a href="cctv.php">Live Überwachung des Serverschrankes</a></li>
				<li><a href="status.php">Status Anzeige von Temperatur und Luftfeuchtigkeit</a></li>
				<li><a href="status.php">Steuerung der Lüfter die sich im Serverschrank befinden</a></li>
				<li>Warnung bei Hohen Temperaturen</li>
			</ul>	
			 </P>
			 <h3>Welche Funktionen sind noch nicht eingerichtet?</h3>
			 <p>
				<ul>
				<li><a href="status.php">Steuerung der Lüfter die sich im Serverschrank befinden</a></li>
				<li>Warnung bei Hohen Temperaturen</li>
				</ul>
			 </p>
		</div>
		</div>
		<div class="visitorMessage">
			Falls du uns ein Feedback über unsere Arbeit da lassen möchtest, eine weitere Idee oder eine Sicherheitslücke gefunden hast, würden wir uns auf deine E-Mail freuen!
			<br><br>
			<button class="contactButton"><a href="mailto:yokai.suew@gmail.com">E-Mail an das Yokai Entwicklerteam senden</a></button>
		</div>
	</body>
</html>