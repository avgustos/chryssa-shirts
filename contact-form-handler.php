<?php
	
	// https://www.w3schools.com/php/php_forms.asp
	// https://www.w3schools.com/php/php_form_validation.asp
	// https://www.youtube.com/watch?v=1CkBsGhux9U

	// define variables and set to empty values
	$first_name = $last_name = $email = $phone = $message = $success = "";

	// define variables for the error messages of the *required* fields
	$first_name_error = $last_name_error = $email_error = $message_error = "";

	if 	($_SERVER["REQUEST_METHOD"] == "POST")
	{
  		if 	(empty($_POST["first-name"]))
    		{$first_name_error = "Πρέπει να συμπληρώσετε το όνομά σας!";}
  		else
			{$first_name = test_input($_POST["first-name"]);

			//check if the first name contains only letters and white space
			if (!preg_match("/^[a-zA-Z ]*$/", $first_name))
				{$first_name_error = "Επιτρέπονται μόνο γράμματα και κενό διάστημα";}
			}
			
  		if 	(empty($_POST["last-name"]))
    		{$last_name_error = "Πρέπει να συμπληρώσετε το επίθετό σας!";}
  		else
			{$last_name = test_input($_POST["last-name"]);

			//check if the last name contains only letters and white space
			if (!preg_match("/^[a-zA-Z ]*$/", $last_name))
				{$last_name_error = "Επιτρέπονται μόνο γράμματα και κενό διάστημα";}
			}

  		if 	(empty($_POST["email"]))
    		{$email_error = "Πρέπει να συμπληρώσετε το email σας!";}
  		else
			{$email = test_input($_POST["email"]);

				//check if the email address is well formed
				if 	(!filter_var($email, FILTER_VALIDATE_EMAIL))
					{$email_error = "Μη αποδεκτό email";}
  			}

  		if 	(empty($_POST["phone"]))
    		{$phone = "";}
  		else
    		{$phone = test_input($_POST["phone"]);}

  		if 	(empty($_POST["message"]))
    		{$message_error = "Καλό θα ήταν να μας γράψετε κάτι!";}
  		else
    		{$message = test_input($_POST["message"]);}
	
		if 	($first_name_error == ''
			and $last_name_error == ''
			and $email_error == ''
			and $message_error == '')
			{$message_body = '';
			unset($_POST['submit']);
			foreach ($_POST as $key => $value){$message_body .= "$key: $value\n";}

			$email_from = "z95463chry@chryssa-shirts.gr";
			$email_subject = "Ήρθε Ένα Νέο Μήνυμα Από Σαρδέλλα";
			$email_body = 	"Όνομα Σαρδέλλας: $first_name.\n".
		      			"Επώνυμο Σαρδέλλας: $last_name.\n".	
     		      		"Email Σαρδέλλας: $email.\n".
		      			"Τηλέφωνο Σαρδέλλας: $phone.\n".
		      			"Τι έχει να πει η Σαρδέλλα: $message.\n";
			$to = "contact@chryssa-shirts.gr";
			$headers = "Αποστολέας: $email_from\r\n";
			$headers = "Απάντηση στο: $email\r\n";
	
			if 	(mail($to,$email_subject,$email_body,$headers))
				{$success = "Το μήνυμά σας εστάλει, ευχαριστούμε που επικοινωνήσατε μαζί μας";
				$first_name = $last_name = $email = $phone = $message = '';}

			header("Location: index.html");
			}
	}

	function test_input($data)
 		{$data = trim($data);
  		$data = stripslashes($data);
  		$data = htmlspecialchars($data);
		  return $data;}
		  
	?>
