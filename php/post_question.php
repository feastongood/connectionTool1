<?php

  //config
  include_once("config.php");

date_default_timezone_set('America/Los_Angeles');

//include the swift class
    include_once 'swift/swift_required.php';
                    
    //$transport = Swift_MailTransport::newInstance();
     $transport = Swift_SmtpTransport::newInstance('smtp.gmail.com', 587, 'tls')
       ->setUsername('hq@coastermatic.com')
       ->setPassword('3astcoast')
       ;
//--- end swift

/**********************************************************************
*  ezSQL initialisation for mySQL
*/

// Include ezSQL core
include_once "libs/shared/ez_sql_core.php";

// Include ezSQL database specific component
include_once "libs/ez_sql_mysql.php";

// Initialise database object and establish a connection
// at the same time - db_user / db_password / db_name / db_host
$db = new ezSQL_mysql($DB_USERNAME,$DB_PASSWORD,$DB_DATABASE,$DB_HOST);

/**********************************************************************/

$question = addslashes($_POST["question"]);
$name = addslashes($_POST["name"]);
$email = $_POST["email"];
$subject = "Connection Tool Question";

$question = wordwrap($question, 70);
$question .= "\nFrom: $name, <a href='mailto:$email'>$email</a>";


//set up the email
    function send_email($question){
        
        //setup the mailer
        $transport = Swift_MailTransport::newInstance();
        $mailer = Swift_Mailer::newInstance($transport);
        $message = Swift_Message::newInstance();
        
        $message ->setSubject("Connection Tool Question");
        $message ->setFrom(array('karen@feastongood.com' => 'Connection Tool'));
        $message ->setTo(array('meilun@gmail.com' => 'Tash Wong'));
        
        $message ->setBody($question, 'text/html');
                
        $result = $mailer->send($message);
        
        return $result; 
    
        }

if (send_email($question)){
            $question = addslashes($question);
            $db->query("INSERT INTO connect_questions (id, question, name, email) VALUES (NULL, '".$question."','".$name."','".$email."')");
            echo "Thanks so much for your feedback!";
        }else {
            echo "Sorry, there was problem. Please email connect@feastongood.com to let us know. ";
}




?>

