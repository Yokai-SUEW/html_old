<?php
$DATABASE_HOST = 'sql2.freemysqlhosting.net';
$DATABASE_USER = 'sql2367052';
$DATABASE_PASS = 'bF1!kD6!';
$DATABASE_NAME = 'sql2367052';

$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if ( mysqli_connect_errno() ) {
	exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}
?>