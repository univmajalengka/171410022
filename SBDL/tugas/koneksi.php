<?php
function koneksi_db(){ 
		$host = "localhost"; 
		$database = "absensi peg pdam"; 
		$user = "root"; 
		$password = ""; 
		
		$link = mysqli_connect($host,$user,$password);

		mysqli_select_db($link,$database);
		 
		if(!$link) 
			echo "Error:".mysqli_error(); 
		return $link; 
	}
	?> 