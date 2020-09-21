<?php
$DATABASE_HOST = 'sql101.epizy.com';
$DATABASE_USER = 'epiz_26371947';
$DATABASE_PASS = 'TGTmRdu3SjSgFf';
$DATABASE_NAME = 'epiz_26371947_phplogin';

$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if ( mysqli_connect_errno() ) {
	exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}
?>