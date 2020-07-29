<?php
// Change this to your connection info.
$DATABASE_HOST = 'sql101.epizy.com';
$DATABASE_USER = 'epiz_26371947';
$DATABASE_PASS = 'TGTmRdu3SjSgFf';
$DATABASE_NAME = 'epiz_26371947_phplogin';
// Try and connect using the info above.
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if (mysqli_connect_errno()) {
	// If there is an error with the connection, stop the script and display the error.
	exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}

// Now we check if the data was submitted, isset() function will check if the data exists.
if (!isset($_POST['username'], $_POST['password'], $_POST['email'])) {
	// Could not get the data that should have been sent.
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
		// Username doesnt exists, insert new account
        if ($stmt = $con->prepare('INSERT INTO accounts (username, password, email, activation_code) VALUES (?, ?, ?, ?)')) {
	// We do not want to expose passwords in our database, so hash the password and use password_verify when a user logs in.
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