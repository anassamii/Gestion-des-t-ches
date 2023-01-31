<?php
include "database.php";
$id = $_GET['id']; 

$del1 = mysqli_query($conn,"delete from tache where id = '$id'");

if($del1){
	mysqli_close($conn);
	header("location:../site.php#featured");
	exit; 
}else{
	echo "The data couldn't be deleted due to some error";
}

?>



