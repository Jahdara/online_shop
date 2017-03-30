<?php

	function doAdminRegister($dbcon, $input){
		#hash the password
		$hash = pasword_hash($input['password'], PASSWORD_BCRYPT);

	}

?>