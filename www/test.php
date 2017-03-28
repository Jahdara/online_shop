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

 #max file size
define("MAX_FILE_SIZE", 2097152);

#allowed extension
$ext = ["img/jpg", "image/jpeg", "image/png"];

if(array_key_exists('save', $_POST)){
	$errors =[];

#be sure a file is selected...
if (empty ($_FILES['pic']['name'])){
	$errors[] = "Please choose a file";
	}

#check file size
if($_FILES['pic']['size'] > MAX_FILE_SIZE) {
	$errors[]= "file size exceeds maximum. maximum: ". MAX_FILE_SIZE; 
}
	#check extension
	if(!in_array($_FILES['pic']['type'], $ext)){
		$errors[] = "invalid file type";

	}

	#generate random number to append
	$rnd = rand(0000000000, 9999999999);
		
		#strip filename spaces
		$strip_name = str_replace("", "_", $_FILES['pic']['name']);
		
		$filename =$rnd.$strip_name;
		$destination = 'uploads/' .$filename;

		if(!move_uploaded_file($_FILES['pic']['tmp_name'], $destination)){
			$errors[] = "file upload failed";
		}

	if(empty($errors)){
		echo "done";
	}else{
		foreach ($errors as $err){
			echo $err. '</br>';
		}

	}

}

?>
<form id="register" method="POST" enctype="multipart/form-data">

<p>please upload a file</p>
<input type= "file" name="pic">

<input type="submit" name="save">
</form>