<?php
//print_r($_POST); exit();
if(isset($_POST))
{
   
	
	$subject = 'Coral Spring Smiles - Dental Implant Lead Form';
	$message = 'Hello <br /><br />
	<table width="280" border="0" cellspacing="0" cellpadding="3">
	  <tr>
		<td><strong>First Name</strong></td>
		<td> : '.$_POST['first_name'].'</td>
	  </tr>
	  <tr>
		<td><strong>Last Name</strong></td>
		<td> : '.$_POST['last_name'].'</td>
	  </tr>
	  <tr>
		<td><strong>Email Address</strong></td>
		<td> : '.$_POST['email'].'</td>
	  </tr>
	  <tr>
		<td><strong>Phone Number</strong></td>
		<td> : '.$_POST['phone'].'</td>
	  </tr>
	  <tr>
		<td><strong>Date</strong></td>
		<td> : '.$_POST['date'].'</td>
	  </tr>
	  <tr>
		<td><strong>Time</strong></td>
		<td> : '.$_POST['time'].'</td>
	  </tr>
	   <tr>
		<td><strong>Message</strong></td>
		<td> : '.$_POST['message'].'</td>
	  </tr> </table>';
	
	require_once './sendgrid-php/sendgrid-php.php';
	$email = new \SendGrid\Mail\Mail();
	$email->setFrom($_POST['email'], $_POST['name']);
	$email->setSubject($subject);
	
		
	//$email->addTo("ragunath@adshi5.com", "Coral Spring Smiles");
	$email->addTo("frontdeskcssmiles@gmail.com", "Coral Spring Smiles");
	$email->addTo("cssmiles.pa@gmail.com", "Coral Spring Smiles");
	$email->addCc("info@socialhi5.com", "SocialHi5");
	//$to = 'shankar.socialhi5@gmail.com';
	
	$email->addContent("text/html", $message);
	$sendgrid = new \SendGrid('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');
	try {
		$response = $sendgrid->send($email);
		//print $response->statusCode() . "\n";
		//print_r($response->headers());
		//print $response->body() . "\n";
		if($response->statusCode()=='202')
		{
			header("Location:  thankyou.html");
		}
		else{
		    header("Location: index");
		
		}
	}
	 catch (Exception $e) {
		//echo 'Caught exception: '. $e->getMessage() ."\n";
		header("Location: index");
	}
}   
else
{
	header("Location: index");
}


?>