<?php

$prod = 'localhost';
$host = $_SERVER['SERVER_NAME'];
if($prod != $host) {
	define('_BASE_URL_','https://media.megasportsworld.com/msw-dev-leave-sites');
	define('_DB_USERNAME_','jenner_leave');
	define('_DB_PASSWORD_','O*{8LzPv_R5k');
	define('_DB_HOST_','localhost');
	define('_DB_DATABASE_','jenner_leavedb');
	
} else {
	define('_BASE_URL_','http://localhost:8080/dev-leave-form/');
	define('_DB_USERNAME_','root');
	define('_DB_PASSWORD_','');
	define('_DB_HOST_','localhost');
	define('_DB_DATABASE_','leaveform');
}

?>