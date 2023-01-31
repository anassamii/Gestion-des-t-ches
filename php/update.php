<?php  
	include "database.php";  
	
	// insert data student table 
	$id = $_POST['id'];  
	$titre = $_POST['titre'];  
	$description = $_POST['description'];  

	$query1 = "UPDATE tache SET titre='$titre',description='$description' WHERE id= '$id' "; 

	if ($conn->query($query1)) {
		mysqli_close($conn);
	}else{
	   echo "Data not updated";
	}
 ?>  