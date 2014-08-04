<?php

  //config
  include_once("../../php/config.php");

    /**********************************************************************
    *  ezSQL initialisation for mySQL
    */

    // Include ezSQL core
    include_once "../../php/libs/shared/ez_sql_core.php";

    // Include ezSQL database specific component
    include_once "../../php/libs/ez_sql_mysql.php";

    // Initialise database object and establish a connection
    // at the same time - db_user / db_password / db_name / db_host
    $db = new ezSQL_mysql($DB_USERNAME,$DB_PASSWORD,$DB_DATABASE,$DB_HOST);

    /**********************************************************************/

ini_set('display_errors', 1);
	

	//include the swift class
		include_once 'php/swift/swift_required.php';
						
		//$transport = Swift_MailTransport::newInstance();
		$transport = Swift_SmtpTransport::newInstance('smtp.gmail.com', 587, 'tls')
		  ->setUsername('tash@feastongood.com')
		  ->setPassword('alldaylong')
		  ;
	//--- end swift
	
	
	//--- get parameters from URL
	$id = $_GET['id'];
	$type = $_GET['type'];
	
	//--- get email from db, using user_id
	$user = $db->get_row("SELECT first_name, email FROM beta_contributors WHERE id = $id");



/******** Send confirmation email *****************	*/
		

	//email info array to send to the function
		$email_info = array(
			'fname' => $user->first_name,
			'email' => $user->email,
			'type'  => $type
			);


	// email functions
	
			// get email template, add in customer info from db
			function format_email($email_info){
			
				//grab the template content
				if ($email_info['type'] == "project"){
					$template = file_get_contents('../php/emails/confirmation_template.html');
				} else {
					$template = file_get_contents('../php/emails/confirmation_template.html');
				}
				
				
						
				//replace all the tags
				$template = preg_replace('/{FNAME}/', $email_info['fname'], $template);
				$template = preg_replace('/{PREVIEW_URL}/', $email_info['preview_url'], $template);
				$template = preg_replace('/{CHARGE}/', $email_info['charge'], $template);
				$template = preg_replace('/{SHIP_DAYS}/', $email_info['shipping'], $template);
					
				//return the html of the template
				return $template;
		
			}
		
			//set up the email
			function send_email($email_info){
				global $EMAIL_SUBJECT_ORDERCONF, $EMAIL_FROM, $EMAIL_FROM_NAME, $EMAIL_BCC, $COASTERMATIC_SERVER;
				
				
				
				//format each email
				$body = format_email($email_info,'html');
				
				//setup the mailer
				$transport = Swift_MailTransport::newInstance();
				$mailer = Swift_Mailer::newInstance($transport);
				$message = Swift_Message::newInstance();
				
				// if dev, don't bcc and prefix subject
				if ($COASTERMATIC_SERVER != 'LIVE'){
					$emailsubject = "$COASTERMATIC_SERVER $EMAIL_SUBJECT_ORDERCONF";
				} else {
					$emailsubject = $EMAIL_SUBJECT_ORDERCONF;
					$message ->setBcc(array($EMAIL_BCC));
				}
				
				$message ->setSubject($emailsubject);
				$message ->setFrom(array($EMAIL_FROM => 'Coastermatic'));
				$message ->setTo(array($email_info['email'] => $email_info['fname']));
				$message ->setReplyTo(array( 'support@coastermatic.com' => 'Coastermatic Support'));
				
				$message ->setBody($body, 'text/html');
						
				$result = $mailer->send($message);
				
				return $result;	
			
				}

	

			
 
?>


<?php 
include_once('../php/config.php'); 
$title = 'Thanks - The Feast Connects Preview';
include_once('includes/header.php'); ?>

 <!-- Main Content -->
      <!-- Main jumbotron for a primary marketing message or call to action -->
      <div class="jumbotron" style="height:500px; background: #E4E4E4;">
        <div class="container">

          <div class="heroContent col-md-8 col-md-offset-2">
            <h1 style="font-size: 120px; color:#00debc;">Thanks!</h1>
            
            <p>Now you're ready to take part in The Feast Connects!<br/>
           Launch of the preview will be around August 18th. Until then, check your inbox for more information.</p>
          </div>

        </div>
      </div>


      <div class="container" style="display:none;">
  
     </div> <!-- /container -->
  <!-- /Main Content -->

<?php include_once('includes/footer.php'); ?>
<script>//mixpanel.track("Thanks page");</script>

  </body>
  </html>