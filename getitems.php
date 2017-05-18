<?php
	include "init.php";
    
	$sql = "SELECT * FROM items ORDER BY status;";
	
	$result = mysqli_query($con,$sql);
	$num_of_rows = mysqli_num_rows($result);
	
	if (mysqli_num_rows($result) > 0) {
		$response = array();
		while($row = mysqli_fetch_assoc($result)) {
			$arr = array("itemid" => $row["itemid"],
						"itemname" => $row["itemname"],
						"itemdescription" => $row["itemdescription"],
						"itemtype" => $row["itemtype"],
						"itemprice" => $row["itemprice"],
						"status" => $row["status"]
						);
			array_push($response,$arr);
		}
		$response = array(
							"status" => "success",
							"items" => $response
						);
		echo json_encode($response);
		
	} else {
		$fail = array("status" => "failed");
		echo json_encode($fail);
	}
	mysqli_close($con);
?>