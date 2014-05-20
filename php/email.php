<?php

date_default_timezone_set('America/Los_Angeles');

//include the swift class
	include_once 'swift/swift_required.php';
					
	//$transport = Swift_MailTransport::newInstance();
	 $transport = Swift_SmtpTransport::newInstance('smtp.gmail.com', 587, 'tls')
	   ->setUsername('tash@coastermatic.com')
	   ->setPassword('vegas1982')
	   ;
//--- end swift


//set up the email
	function send_email($email_info){
		
		//format each email
		$body = format_email($email_info,'html');
		
		//setup the mailer
		$transport = Swift_MailTransport::newInstance();
		$mailer = Swift_Mailer::newInstance($transport);
		$message = Swift_Message::newInstance();
		
		$message ->setSubject($email_info['subject']);
		$message ->setFrom(array('hello@feastongood.com' => 'The Feast'));
		$message ->setTo(array($email_info['email']));
		
		$message ->setBody($body, 'text/html');
				
		$result = $mailer->send($message);
		
		return $result;	
	
		}

// get email template, add in customer info from db
	function format_email($email_info){

		//grab the template content
		$template = file_get_contents('shortlist_template.html');
				
		//replace all the tags
		$template = preg_replace('/{GUEST_HTML}/', $email_info['shortlist'], $template);
		$template = preg_replace('/{EVENT_INFO}/', $email_info['event_info'], $template);
			
		//return the html of the template
		return $template;

	}


if( $_REQUEST["email"] )

	{
	   $email = $_REQUEST['email'];
	   $shortlist = stripslashes($_REQUEST['shortlist']);
	   $event_info = $_REQUEST['event_info'];

		$email_info = array(
		'email' => $email,
		'shortlist' => $shortlist,
		'event_info' => $event_info,
		'subject' => "Your shortlist for The Feast NYC!"
		);

		if (send_email($email_info)){
			echo("sent");
		}else {
			echo("nope");
		}

	}

?>