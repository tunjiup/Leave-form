<?php

$prod = 'localhost';
$host = $_SERVER['SERVER_NAME'];
if($prod != $host) {
	define('_BASE_URL_','https://www.anthonybetatest.com/');
	define('_DB_USERNAME_','djrg_inventory');
	define('_DB_PASSWORD_',',RQuNNnG3l}+');
	define('_DB_HOST_','localhost');
	define('_DB_DATABASE_','leaveform');
	
} else {
	define('_BASE_URL_','http://localhost:8080/dev-leave-form/');
	define('_DB_USERNAME_','root');
	define('_DB_PASSWORD_','');
	define('_DB_HOST_','localhost');
	define('_DB_DATABASE_','leaveform');
}

?>