<?php

	function doAdminRegister($dbcon, $input){
		#hash the password
		$hash = password_hash($input['password'], PASSWORD_BCRYPT);

		#insert data
		$stmt = $dbcon->prepare("INSERT INTO admin (firstname, lastname, email, hash) VALUES(:fn, :ln, :e, :h)");

		#bind params...
		$data = [
			':fn' => $input['fname'],
			':ln' => $input['lname'],
			':e' => $input['email'],
			':h' => $hash
		];

		$stmt -> execute($data);

	}


	function doesEmailExist($dbcon, $email){
		$result = false;

		$stmt = $dbcon->prepare("SELECT email FROM admin WHERE email=:e");
		#bind params
		$stmt->bindParam(":e", $email);
		$stmt->execute();

		#get number of rows returned
		$count = $stmt->rowCount();

		if($count > 0){
			$result = true;
		}

		return $result;
	}

	function displayErrors($devo, $mad){
		$result = "";
		if(isset($devo['mad'])){
			$result = '<span class = "err">'.$devo['mad']. '</span>';
		}
			return $result;
	}

	function doAdminLogin($dbcon, $input){
		print_r(); exit();

		//INSERT DATA INTO TABLE
		$stmt = $dbcon->prepare("SELECT * FROM admin WHERE email=:e");

		#bind params

		$stmt->bindParam(":e", $input['email']);
		$stmt->execute();
		$count = $stmt->rowCount();

		if($count == 1){
			
			
			$result = $stmt->fetch(PDO::FETCH_ASSOC);
			
			if(password_verify($input['password'], $result['hash'])){
				$_SESSION['id'] = $result['admin_id'];
				$_SESSION['admin_name']= $result['email'];
				
				
				header("Location:home.php");
			}else{
				
				$login_error = "Invalid Username and/or Passowrd";
				header("Location:login.php?login_error=$login_error");
			}
		}
	}

		function fileupload($hmm, $apple, $figo){

		define("MAX_FILE_SIZE", 2097152);
		
		#$ext = ["img/jpg", "image/jpeg", "image/png"];

		if (empty ($hmm[$figo]['name'])){
	 	$apple[$figo] = "Please choose a file";
	  }


		if($hmm[$figo]['size'] > MAX_FILE_SIZE) {
	   	$errors[$figo]= "file size exceeds maximum. maximum: ". MAX_FILE_SIZE; 
}
		
		#check extension
	/*if(!in_array($_hmm['figo']['type'], $ext)){
		$apple[$figo] ="invalid file type";

	}*/

	#generate random number to append
	$rnd = rand(0000000000, 9999999999);
		
		#strip filename spaces
		$strip_name = str_replace("", "_", $hmm[$figo]['name']);
		
		$filename =$rnd.$strip_name;
		$destination = 'uploads/' .$filename;

		if(!move_uploaded_file($hmm[$figo]['tmp_name'], $destination)){
			$apple[$figo] = "file upload failed";
		}

	
	}
?>