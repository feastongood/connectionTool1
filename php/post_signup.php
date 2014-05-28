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

ini_set('display_errors', 1);

$fname = addslashes($_POST["fname"]);
$lname = addslashes($_POST["lname"]);
$email = $_POST["email"];
$city = $_POST["city"];
$twitter = $_POST["twitter"];
$bio = addslashes($_POST["bio"]);
$linkedin = $_POST["linkedin"];
$facebook = $_POST["facebook"];
$instagram = $_POST["instagram"];
$what = addslashes($_POST["what"]);
$why = addslashes($_POST["why"]);
$avatar = $_POST["avatar"];
$url = $_POST["url"];

$avatarURL = str_replace("_normal", "_bigger", $avatar);



if ($db->query("INSERT INTO users (id, fname, lname, email, city, twitter, bio, url, linkedin, facebook, instagram, what, why, avatar) VALUES (NULL, '".$fname."','".$lname."','".$email."', '".$city."','".$twitter."','".$bio."', '".$url."', '".$linkedin."','".$facebook."','".$instagram."','".$what."','".$why."','".$avatarURL."')")){

    header( $thanks ) ;
}




?>

