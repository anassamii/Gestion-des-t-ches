<?php

	include("database.php");

	// database connection code
	if(isset($_POST['email'])&&isset($_POST['nom'])&&isset($_POST['password'])){

		// get the post records

		$email = $_POST['email'];
		$nom = $_POST['nom'];
		$password = $_POST['password'];

		// database insert SQL code
		$sql = "INSERT INTO `utilisateur` (`email`, `nom`, `password`) VALUES ('$email', '$nom', '$password')";

		// insert in database 
		$rs = mysqli_query($conn, $sql);
		if($rs){
				mysqli_close($conn);
			header("Location: ../index.html"); 
		}else{
				mysqli_close($conn);	
			echo "Email already exists";
		}
	}else{
			mysqli_close($conn);
		echo "isn't set";
	}
		
?>

