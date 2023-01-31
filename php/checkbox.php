<?php  
	include "database.php";  
	
	// insert data student table 
	$id = $_POST['id'];  
	$msg = $_POST['msg'];   

	$query1 = "UPDATE tache SET accomplie='$msg' WHERE id= '$id' "; 

	if ($conn->query($query1)) {
		mysqli_close($conn);
	}else{
	   echo "Data not updated";
	}
 ?>  