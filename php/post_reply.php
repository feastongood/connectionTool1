<?php

    /**********************************************************************
    *  ezSQL initialisation for mySQL
    */

    // Include ezSQL core
    include_once "libs/shared/ez_sql_core.php";

    // Include ezSQL database specific component
    include_once "libs/ez_sql_mysql.php";

    // Initialise database object and establish a connection
    // at the same time - db_user / db_password / db_name / db_host
    $db = new ezSQL_mysql('root','vegas1982','connect.feastongood','127.0.0.1');

    /**********************************************************************/

$reply = addslashes($_POST["reply"]);
$questionID = $_POST["questionID"];
$userID = $_POST["questionID"];


if ($db->query("INSERT INTO replies (id, reply, questionID, userID) VALUES (NULL, '".$reply."','".$questionID."','".$userID."')")){

    echo ("<p>Thanks! We've recorded your reply.</p>");
} else {
     echo ("<p>Sorry, there was a problem!</p> <p>Please send us a note using the question link at the top right of the screen.</p>");
}


?>

