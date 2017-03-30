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

		$stmt = $dbcon->preapare("SELECT email FROM admin WHERE email+e");
		#bind params
		$stmt->bindParam(":e", $email);
		$stmt->execute();

		#get number of rows returned
		$count = $stmt->rowCount();


	}
?>