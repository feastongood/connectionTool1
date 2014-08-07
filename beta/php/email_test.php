<?php 


date_default_timezone_set('America/Los_Angeles');

require_once 'swift/swift_required.php';
 
// Create the mail transport configuration
//$transport = Swift_MailTransport::newInstance();
     $transport = Swift_SmtpTransport::newInstance('smtp.gmail.com', 587, 'tls')
       ->setUsername('hq@coastermatic.com')
       ->setPassword('3astcoast')
       ;
//--- end swift
 
// Create the message
$message = Swift_Message::newInstance();
$message->setTo(array(
  "tash@feastongood.com" => "Tash Wong"
));
$message->setSubject("This email is sent using Swift Mailer");
$message->setBody("You're our best client ever.");
$message->setFrom("account@bank.com", "Your bank");
 
// Send the email
$mailer = Swift_Mailer::newInstance($transport);
$mailer->send($message);

echo ("ran file");

?>