<?php
include_once('config_users.php');

if (!isset($_POST['username'], $_POST['password'], $_POST['email'])) {
	exit('Please complete the registration form!');
}
// Hier wird geschaut ob alle Felder richtig befüllt sind. 
if (empty($_POST['username']) || empty($_POST['password']) || empty($_POST['email'])) {
	// Falls man nicht alles einträgt erscheint diese Nachricht.
	exit('Please complete the registration form');
}

if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
	exit('Email is not valid!');
}

if (strlen($_POST['password']) > 20 || strlen($_POST['password']) < 5) {
	exit('Passwort muss zwischen 5 und 20 Zeichen lang sein!');
}

if ($stmt = $con->prepare('SELECT id, password FROM accounts WHERE username = ?')) {
	$stmt->bind_param('s', $_POST['username']);
	$stmt->execute();
	$stmt->store_result();
    /* Hier werden die daten zwischengespeichert damit wir nachsehen können ob der 
    User bereits existiert!*/
	if ($stmt->num_rows > 0) {
		// Falls der User schon existiert wird das Angezeigt!
		echo 'Username exists, please choose another!';
	} else {
		// User existiert nicht deshalb wird ein neuer User erstellt
        if ($stmt = $con->prepare('INSERT INTO accounts (username, password, email, activation_code) VALUES (?, ?, ?, ?)')) {
	// Passwörter werden in der Datenbank nicht als Clear Text gespeichert. Sie werden mit BCrypt gehasht.
	$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
	$uniqid = uniqid();
    $stmt->bind_param('ssss', $_POST['username'], $password, $_POST['email'], $uniqid);
	$stmt->execute();
	    $from    = 'noreply@yokai.at';
        $subject = 'Account Activation Required';
        $headers = 'From: ' . $from . "\r\n" . 'Reply-To: ' . $from . "\r\n" . 'X-Mailer: PHP/' . phpversion() . "\r\n" . 'MIME-Version: 1.0' . "\r\n" . 'Content-Type: text/html; charset=UTF-8' . "\r\n";
        $activate_link = 'http://yokai.com/phplogin/activate.php?email=' . $_POST['email'] . '&code=' . $uniqid;
        $message = '<p>Bitte klicken Sie auf diesen Link um ihr Account zu aktivieren: <a href="' . $activate_link . '">' . $activate_link . '</a></p>';
        mail($_POST['email'], $subject, $message, $headers);
        echo 'Bitte schauen Sie in ihrem Postfach nach!';
} else {
	// Falls etwas mit der Verbindung zur Datenbank schief läuft wird das angezeigt. 
	echo 'Could not prepare statement!';
}
	}
	$stmt->close();
} else {
	echo 'Could not prepare statement!';
}
$con->close();
?>