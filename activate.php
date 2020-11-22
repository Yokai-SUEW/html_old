<?php
include_once('config_users.php');
//Hier wird geschaut ob die eingegebene E-Mail Adresse bereits existiert
if (isset($_GET['email'], $_GET['code'])) {
	if ($stmt = $con->prepare('SELECT * FROM accounts WHERE email = ? AND activation_code = ?')) {
		$stmt->bind_param('ss', $_GET['email'], $_GET['code']);
		$stmt->execute();
		// Daten werden gespeichert um zu sehen ob dieses Account existiert
		$stmt->store_result();
		if ($stmt->num_rows > 0) {
			// Account existiert mit der gleichen E-Mail und dem gleichen Code
			if ($stmt = $con->prepare('UPDATE accounts SET activation_code = ? WHERE email = ? AND activation_code = ?')) {
				// Aktivierungscode wird auf activated gestellt damit wir später wissen ob die Person ihren/seinen Account aktiviert hat
				$newcode = 'activated';
				$stmt->bind_param('sss', $newcode, $_GET['email'], $_GET['code']);
				$stmt->execute();
				echo 'Your account is now activated, you can now login!<br><a href="index.html">Login</a>';
			}
		} else {
			echo 'The account is already activated or doesn\'t exist!';
		}
	}
}
?>