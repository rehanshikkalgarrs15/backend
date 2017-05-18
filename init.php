<?php
	$host = "localhost";
	$username = "root";
	$password = "REHAN123@";
	$database = "u665871170_cafe";

	$con = mysqli_connect($host, $username, $password, $database);
	if($con){
		//echo "Successfull Connection";
	}
	else{
		//echo "Failed Connection";
	}

?>