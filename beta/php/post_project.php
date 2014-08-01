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



$email = $_POST["email"];
$first_name = addslashes($_POST["first_name"]);
$last_name = addslashes($_POST["last_name"]);

$city = $_POST["city"];

$website = $_POST["website"];
$twitter_id = $_POST["twitter_id"];
$linkedin_id = $_POST["linkedin_id"];
$facebook_id = $_POST["facebook_id"];
$instagram_id = $_POST["instagram_id"];
$vimeo_id = $_POST["vimeo_id"];
$youtube_id = $_POST["youtube_id"];

$title = addslashes($_POST["title"]);
$employer = addslashes($_POST["employer"]);

$passion_1 = $_POST["passion_1"];
$passion_2 = $_POST["passion_2"];
$skill_1 = $_POST["skill_1"];
$skill_2 = $_POST["skill_2"];

$notes = addslashes($_POST["notes"]);

$avatar = $_POST["avatar"];
$avatarURL = str_replace("_normal", "_bigger", $avatar);



if ($db->query("INSERT INTO beta_contributors (id, first_name, last_name, email, city, website, twitter_id, linkedin_id, facebook_id, instagram_id, vimeo_id, youtube_id, title, employer, passion_1, passion_2, skill_1, skill_2, notes, avatar) VALUES (NULL, '".$first_name."','".$last_name."','".$email."', '".$city."','".$website."','".$twitter_id."', '".$linkedin_id."', '".$facebook_id."','".$instagram_id."','".$vimeo_id."','".$youtube_id."','".$title."','".$employer."', '".$passion_1."','".$passion_2."','".$skill_1."','".$skill_2."','".$notes."','".$avatarURL."')")){

    //header( $thanks ) ;

    echo "post went through";
}




?>

