<?php

	function doAdminRegister($dbcon, $input){
		#hash the password
		$hash = pasword_hash($input['password'], PASSWORD_BCRYPT);

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

?>