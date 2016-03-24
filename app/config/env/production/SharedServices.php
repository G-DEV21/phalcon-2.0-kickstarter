<?php 

use 
	Phalcon\Config
	;

return new Config([
// Section for Database registration.
	DB_MYSQL_READ => function() {
		return new MysqlDB([
			'host' => 'localhost',
			'username' => 'dbuser',
			'password' => 'dbpassword',
			'dbname' => 'dbname'
		]);
	},
	DB_MYSQL_WRITE => function() {
		return new MysqlDB([
			'host' => 'localhost',
			'username' => 'dbuser',
			'password' => 'dbpassword',
			'dbname' => 'dbname'
		]);
	}
]);

 ?>