<?php
	include "init.php";
    $inputJSON = file_get_contents('php://input');
    $input= json_decode( $inputJSON, TRUE );
    $email = $input['email'];
    $pass = $input['password'];

	$sql = "select username,email,mobile,cube from user where email='$email' and password='$pass';";

	$result = mysqli_query($con,$sql);
	$num_rows = mysqli_num_rows($result);
	
	
	$fail = array("status" => "failed");
	if($num_rows > 0){
		$row = mysqli_fetch_assoc($result);
		$success = array(
						"status" => "success",
						"user" =>
								array(
									"username" => $row["username"],
									"email" => $row["email"],
									"mobile" => $row["mobile"],
									"cube" => $row["cube"]
									)
						);
		echo json_encode($success);
	}
	else{
		echo json_encode($fail);
	}
	
	mysqli_close($con);
?>