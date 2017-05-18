<?php
	include "init.php";

    $inputJSON = file_get_contents('php://input');
    $input= json_decode( $inputJSON, TRUE );
    $useremail = $input['useremail'];
    $itemid = $input['itemid'];
    $price = $input['price'];
    //$status = $input["status"];  //set this default to 0

    $status = 0;

	$sql = "INSERT INTO orders values ('$useremail', '$itemid','$price', '0');";

	$result = mysqli_query($con,$sql);

	
	$fail = array("status" => "failed");
	$success = array("status" => "success");
	
	if($result){
		echo json_encode($success);
	}
	else{
		echo json_encode($fail);
	}
	
	mysqli_close($con);
?>