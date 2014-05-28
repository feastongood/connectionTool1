<?php

  //config
  include_once("config.php");

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

$reply = addslashes($_POST["reply"]);
//$questionID = $_POST["questionID"];
$questionID = 2;
$twitter = $_POST["twitter"];


if ($db->query("INSERT INTO replies (id, reply, questionID, twitter) VALUES (NULL, '".$reply."','".$questionID."','".$twitter."')")){

    echo ("<p>Thanks! We've recorded your reply.</p>");
} else {
     echo ("<p>Sorry, there was a problem!</p> <p>Please let us know by emailing tash@feastongood.com, or send us a note using the question link at the top right of the screen.</p>");
}


?>

