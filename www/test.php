<?php #test a sandbox

	define('DBNAME','online_store');
	define('DBUSER', 'root');
	define('DBPASS', 'native');


try{
	#prepare a pdo instance
	$con=new PDO('mysql:host=localhost;online_store=test'.DBNAME, DBUSER, DBPASS);

	#set a verbose error mode
	$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT);
}catch(PDOException $e) {
	echo $e->getMessage();
}

?>