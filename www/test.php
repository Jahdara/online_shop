<?php #test a sandbox

	/*define('DBNAME','online_store');
	define('DBUSER', 'root');
	define('DBPASS', 'native');


try{
	#prepare a pdo instance
	$con=new PDO('mysql:host=localhost;online_store=test'.DBNAME, DBUSER, DBPASS);

	#set a verbose error mode
	$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT);
} catch(PDOException $e) {
	echo $e->getMessage();
}*/


if(array_key_exists('save', $_POST)){
	print_r($_FILES);
}
?>
<form id="register" method="POST" enctype="multipart/form-data">

<p>please upload a file</p>
<input type= "file" name="pic">

<input type="submit" name="save">
</form>