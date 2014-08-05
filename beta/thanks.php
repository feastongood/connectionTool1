<?php

  //config
  include_once("../php/config.php");

  date_default_timezone_set('America/Los_Angeles');

    /**********************************************************************
    *  ezSQL initialisation for mySQL
    */

    // Include ezSQL core
    include_once "../php/libs/shared/ez_sql_core.php";

    // Include ezSQL database specific component
    include_once "../php/libs/ez_sql_mysql.php";

    // Initialise database object and establish a connection
    // at the same time - db_user / db_password / db_name / db_host
    $db = new ezSQL_mysql($DB_USERNAME,$DB_PASSWORD,$DB_DATABASE,$DB_HOST);

    /**********************************************************************/

ini_set('display_errors', 1);
	

	//include the swift class
		include_once 'php/swift/swift_required.php';
						
		//$transport = Swift_MailTransport::newInstance();
		$transport = Swift_SmtpTransport::newInstance('smtp.gmail.com', 587, 'tls')
       ->setUsername('hq@coastermatic.com')
       ->setPassword('3astcoast')
       ;
	//--- end swift
	
	
	//--- get parameters from URL
	$id = $_GET['id'];
	$type = $_GET['type'];
	
	//--- get email from db, using user_id
	$user = $db->get_row("SELECT first_name, email FROM beta_contributors WHERE id = $id");

	$email_result = "";

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
			
				//grab correct template content
				if ($email_info['type'] == "project"){
					$template = file_get_contents('php/emails/project_template.html');
				} else {
					$template = file_get_contents('php/emails/contributor_template.html');
				}
						
				//replace all the tags
				$template = preg_replace('/{FNAME}/', $email_info['fname'], $template);

				//return the html of the template
				return $template;
		
			}
		
			
			//set up the email
			function send_email($email_info){
				
				//format each email
				$body = format_email($email_info,'html');
				
				//setup the mailer
				$transport = Swift_MailTransport::newInstance();
				$mailer = Swift_Mailer::newInstance($transport);
				$message = Swift_Message::newInstance();
				$message ->setSubject('Welcome to The Feast Connects!');
				$message ->setFrom(array('hello@feastongood.com' => 'The Feast Connects'));
				$message ->setTo(array($email_info['email'] => $email_info['fname']));
				$message ->setReplyTo(array( 'tash@feastongood.com' => 'Tash Wong'));
				
				$message ->setBody($body, 'text/html');
						
				$result = $mailer->send($message);

				return $result;	

				}

				if (send_email($email_info)){ 
		            $email_result = "sent";
		        }else {
		            $email_result = "no sent";
		        }

	

$title = 'Thanks - The Feast Connects Preview';
include_once('includes/header.php'); 
print_r($email_info);
print_r('email result =' . $email_result);

?>



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