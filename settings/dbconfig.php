<?php

$prod = 'localhost';
$host = $_SERVER['SERVER_NAME'];
if($prod != $host) {
	define('_BASE_URL_','https://mswlive.com/staging/sites/leave-form/');
	define('_DB_USERNAME_','mswliv5_lvf');
	define('_DB_PASSWORD_','J8-P8!!y(y3i');
	define('_DB_HOST_','localhost');
	define('_DB_DATABASE_','mswliv5_leaveform');
	
} else {
	define('_BASE_URL_','http://localhost:8080/leave-form/');
	define('_DB_USERNAME_','root');
	define('_DB_PASSWORD_','');
	define('_DB_HOST_','localhost');
	define('_DB_DATABASE_','leaveform');
}

?>