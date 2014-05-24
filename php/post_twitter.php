<?php

/* ---- TWITTER STUFF --*/

require_once('libs/TwitterAPIExchange.php');

/* twitter code from http://stackoverflow.com/questions/14836956/how-to-get-user-image-with-twitter-api-1-1 */

/** Set access tokens here - see: https://dev.twitter.com/apps/ **/
$settings = array(
    'oauth_access_token' => "15568972-vYnuyDZKv8vd5vgZ3JhjUkmRzpOmdrOAaGFS9zmBD",
    'oauth_access_token_secret' => "EGJGT2uhRfQLIMVHO258EQ1jqcGnum0OHhDP1HOQc1X5O",
    'consumer_key' => "YiNMgR5hDDdQzDXqNCC2ig",
    'consumer_secret' => "dtM7GWRkLUF4AK6E3YBH50fWN9bJsXq37Qz90gWi4"
);
// Chooose the url you want from the docs, this is the users/show
$url = 'https://api.twitter.com/1.1/users/show.json';
// The request method, according to the docs, is GET, not POST
$requestMethod = 'GET';

// Set up your get string, we're using my screen name here
$twitter = $_POST["twitter_1"];
$getfield = "?screen_name=$twitter";

// Create the object
$twitter = new TwitterAPIExchange($settings);

// Make the request and get the response into the $json variable
$json =  $twitter->setGetfield($getfield)
                 ->buildOauth($url, $requestMethod)
                 ->performRequest();

echo $json;


// // It's json, so decode it into an array
// $result = json_decode($json);

// $avatarURL = str_replace("_normal", "_bigger", $result->profile_image_url);


?>