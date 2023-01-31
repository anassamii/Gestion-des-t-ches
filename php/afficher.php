<?php

include("database.php");

if(isset($_POST["id"])){
	
	$id = $_POST["id"];

	$query1 = "SELECT * FROM tache WHERE id = '".$id."'";

	$result1 = mysqli_query($conn, $query1);
	 
	while($row1 = mysqli_fetch_array($result1)){		
		$data["id"] = $row1["id"];
		$data["titre"] = $row1["titre"];
		$data["description"] = $row1["description"];
	}

	echo json_encode($data);
	
}else{
	
	echo "isn't set";
	
}

?>