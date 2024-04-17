<?php
	if (empty($_POST['name']) && strlen($_POST['name']) == 0 || empty($_POST['email']) && strlen($_POST['email']) == 0 || empty($_POST['message']) && strlen($_POST['message']) == 0)
	{
		return false;
	}
	
	$name = $_POST['name'];
	$name = $_POST['name'];
	$email = $_POST['email'];
	$message = $_POST['message'];
	
	// Create Message	
	$to = 'contact@upscale.sh';
	$email_subject = "Nouveau message du formulaire Upscale";
	$email_body = "Vous avez reçu un nouveau message depuis le site Upscale. \n\nName: $name \nName: $name \nEmail: $email \nMessage: $message \n";
	$headers = "MIME-Version: 1.0\r\nContent-type: text/plain; charset=UTF-8\r\n";	
	$headers .= "From: no-reply@upscale.sh\r\n";
	$headers .= "Reply-To: $email";

	// Post Message
	if (function_exists('mail'))
	{
		$result = mail($to,$email_subject,$email_body,$headers);
	}
	else // Mail() Disabled
	{
		$error = array("message" => "The php mail() function is not available on this server.");
	    header('Content-Type: application/json');
	    http_response_code(500);
	    echo json_encode($error);
	}	
?>