<?php
if(isset($_POST['email_client'])&&isset($_POST['objet_client'])&&isset($_POST['message_client'])){
$to_email = "gestionadmission@gmail.com";
$objet = $_POST['objet_client'];
$message = "From: ".$_POST['email_client']."<br>"."Nom: ".$_POST['nom_client']."<br>"."Message:<br><br> ".$_POST['message_client'];
$from  = 'MIME-Version: 1.0' . "\r\n";
$from .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$from .= 'From: gestionadmission@gmail.com';
 
if (mail($to_email, $objet, $message, $from)) {
    echo "Email successfully sent to $to_email";
} else {
    echo "Email sending failed...";
}
}else{
	echo "isn't set";
}