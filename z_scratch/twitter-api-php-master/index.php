<?php
ini_set('display_errors', 1);
require_once('TwitterAPIExchange.php');

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
$getfield = '?screen_name=tashwong';

// Create the object
$twitter = new TwitterAPIExchange($settings);

// Make the request and get the response into the $json variable
$json =  $twitter->setGetfield($getfield)
                 ->buildOauth($url, $requestMethod)
                 ->performRequest();

// It's json, so decode it into an array
$result = json_decode($json);

// Access the profile_image_url element in the array
echo $result->profile_image_url;

?>