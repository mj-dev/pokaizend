<?php

return [
'db' => [
	'driver' => 'Pdo',
	'dsn' => 'mysql:dbname=pokezend;host=localhost',
	'username' => 'root',
	'password' => 'root',
	'driver_options' => [
		PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''
		]
	]
];