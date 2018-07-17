<?php

$prod = 'localhost';
$host = $_SERVER['SERVER_NAME'];
if($prod != $host) {
	define('_BASE_URL_','http://172.104.162.155/');
	define('_DB_USERNAME_','jenner_leave');
	define('_DB_PASSWORD_','O*{8LzPv_R5k');
	define('_DB_HOST_','localhost');
	define('_DB_DATABASE_','jenner_leavedb');
	
} else {
	define('_BASE_URL_','http://localhost:8080/leaveform/');
	define('_DB_USERNAME_','root');
	define('_DB_PASSWORD_','');
	define('_DB_HOST_','localhost');
	define('_DB_DATABASE_','leaveform');
}

?>