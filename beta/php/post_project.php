<?php

// FOR PROJECT ONLY SIGNUP

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

//contributor info
$email = $_POST["email"];

// project info
$name = addslashes($_POST["name"]);
$established = ($_POST["established"]);

$p_city = addslashes($_POST["p_city"]);

$p_website = $_POST["p_website"];
$p_twitter_id = $_POST["p_twitter_id"];
$p_linkedin_id = $_POST["p_linkedin_id"];
$p_facebook_id = $_POST["p_facebook_id"];
$p_instagram_id = $_POST["p_instagram_id"];
$p_vimeo_id = $_POST["p_vimeo_id"];
$p_youtube_id = $_POST["p_youtube_id"];

$p_passion_1 = $_POST["p_passion_1"];
$p_passion_2 = $_POST["p_passion_2"];
$p_skill_1 = $_POST["p_skill_1"];
$p_skill_2 = $_POST["p_skill_2"];

$p_notes = addslashes($_POST["p_notes"]);

$p_avatar = $_POST["p_avatar"];
$p_avatarURL = str_replace("_normal", "_bigger", $p_avatar);

$admin_id = 0; //to be updated with insert id

$return_msg = "";

if($var = $db->get_var("SELECT id FROM beta_contributors WHERE email='$email'")){
    $admin_id = $var;
} else {
    $admin_id = 0;
}

if ($db->query("INSERT INTO beta_projects (id, name, email, city, established, website, twitter_id, linkedin_id, facebook_id, instagram_id, vimeo_id, youtube_id, passion_1, passion_2, skill_1, skill_2, notes, admin_id, avatar) VALUES (NULL, '".$name."','".$email."','".$p_city."', '".$established."','".$p_website."','".$p_twitter_id."', '".$p_linkedin_id."', '".$p_facebook_id."','".$p_instagram_id."','".$p_vimeo_id."','".$p_youtube_id."', '".$p_passion_1."','".$p_passion_2."','".$p_skill_1."','".$p_skill_2."','".$p_notes."','".$admin_id."','".$p_avatarURL."')")){

    $p_id = $db->insert_id;

    $return_msg .= "?id=$p_id&type=org";
}


echo $return_msg;


?>

