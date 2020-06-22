<?php
	// the following code needs to change to include validation 
	// and security checks
	// https://www.w3schools.com/php/php_forms.asp
	// https://www.w3schools.com/php/php_form_validation.asp
	// https://www.youtube.com/watch?v=1CkBsGhux9U

	$first_name = $_POST['first-name'];
	$last_name = $_POST['last-name'];
	$client_email = $_POST['email'];
	$client_phone = $_POST['phone'];
	$message = $_POST['message'];
	
	$email_from = "z95463chry@chryssa-shirts.gr";
	$email_subject = "Ήρθε Ένα Νέο Μήνυμα Από Σαρδέλλα";
	$email_body = "Όνομα Σαρδέλλας: $first_name.\n".
				  "Επώνυμο Σαρδέλλας: $last_name.\n".	
     			  "Email Σαρδέλλας: $client_email.\n".
				  "Τηλέφωνο Σαρδέλλας: $client_phone.\n".
				  "Το μήνυμα της Σαρδέλλας: $message.\n";
	$to = "contact@chryssa-shirts.gr";
	$headers = "Αποστολέας: $email_from\r\n";
	$headers = "Απάντηση στο: $client_email\r\n";
	
	mail($to,$email_subject,$email_body,$headers);
	header("Location: index.html");
?>
