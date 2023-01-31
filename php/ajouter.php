<?php
		
	include("database.php");

	// database connection code
	if(isset($_POST['titre'])&&isset($_POST['description'])){
		
		// get the post records
		$titre = $_POST['titre'];
		$description = $_POST['description'];
		
		// database insert SQL code Etu Ent B Eva
		$sql1 = "INSERT INTO tache (`titre`, `description`) VALUES ('$titre', '$description')";
		
		// insert in database 
		if(mysqli_query($conn, $sql1)){
			mysqli_close($conn);
			header("Location: ../site.php#featured"); 
		}else{
			echo mysqli_error($conn);
			echo "erreur !";
			mysqli_close($conn);
		}		
	}else{
		mysqli_close($conn);
		echo "isn't set";
	}
	
?>

