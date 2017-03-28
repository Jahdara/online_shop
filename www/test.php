<?php

	define('DBNAME','online_store');
	define('DBUSER', 'root');
	define('DBPASS', 'native');


	$con=new PDO('mysql:host=localhost;online_store=test'.DBNAME, DBUSER, DBPASS);

?>