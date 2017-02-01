<?php
//ini_set('mail.log', '/home/bitcoinsummit/mail.log');
require_once 'swiftmailer/lib/swift_required.php';


// Check for empty fields
if(empty($_POST['name'])  		||
   empty($_POST['email']) 		||
   empty($_POST['phone']) 		||
   empty($_POST['message'])	||
   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
   {
	echo "No arguments Provided!";
	return false;
   }
	
$name = $_POST['name'];
$email_address = $_POST['email'];
#$phone = $_POST['phone'];
#$message = $_POST['message'];
	
// Create the email and send the message
$to = 'jza@gultab.org'; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
$email_subject = "Website Contact Form:  $name";
$email_body = "You have received a new message from your website contact form.\n\n"."Here are the details:\n\nName: $name\n\nEmail: $email_address\n\nPhone: $phone\n\nMessage:\n$message";
$headers = "From: noreply@bitcoinsummit.net\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
$headers .= "Reply-To: $email_address";	
#mail($to,$email_subject,$email_body,$headers);
#return true;			

#$file = fopen('mail.log',"a");

// Append new content to file with $current .= $string and \n to jump line
#fwrite($file, $mail.", ".$email"\n";);
#fclose($file);


// SwiftMailer object
// Create the Transport
$transport = Swift_SmtpTransport::newInstance('mail.alexandro.biz', 25)
  ->setUsername('jza@alexandro.biz')
  ->setPassword('wumeth#23')
  ;

$mailer = Swift_Mailer::newInstance($transport);
$envelope = Swift_Message::newInstnace($email_subject)
     ->setFrom(array('noreply@bitcoinsummit.net' => 'Bitcoin Summit'))
     ->setTo(array($to => 'Alexandro Colorado'))
     ->setBody($email_body);

$result = $mailer->send($envelope);


?>
