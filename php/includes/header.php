<?php      

    date_default_timezone_set('America/Los_Angeles');
    /**********************************************************************
    *  ezSQL initialisation for mySQL
    */

    // Include ezSQL core
    include_once "php/libs/shared/ez_sql_core.php";

    // Include ezSQL database specific component
    include_once "php/libs/ez_sql_mysql.php";

    // Initialise database object and establish a connection
    // at the same time - db_user / db_password / db_name / db_host
    $db = new ezSQL_mysql('root','vegas1982','connect.feastongood','127.0.0.1');

    /**********************************************************************/

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="shortcut icon" href="assets/ico/favicon.ico">

  <title>//Project Name</title>

  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">

  <link href="css/foundation.css" rel="stylesheet">
  <link href="css/feast.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">

  <!-- Typekit -->
  <script type="text/javascript" src="//use.typekit.net/uam3pbg.js"></script>
  <script type="text/javascript">try{Typekit.load();}catch(e){}</script>

<!-- ================================= -->

  <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
    </head>

    <body>


      <!-- header -->
      <header>
        <div class="container">
          <div class="col-md-9">
            <h1 id="site-title"><a href="http://connection.feastongood.com/" title="The Feast" rel="home"><span class="hide-text">The Feast</span></a></h1>
          </div>
          <div class="col-md-3">
            <ul>
              <li><a href=""><img src="images/icons/inbox.png" alt="Inbox"></a></li>
              <li><a href=""><img src="images/icons/attendees.png" alt="Everyone"></a></li>
              <li><a href=""><img src="images/icons/user.png" alt="Your Profile"></a></li>
            </ul>
            <div id="sub-nav"><a href="pages/about.php">About</a>  |  <a href="pages/questions.php">Questions?</a></div>
          </div>
        </div>

      </header>
 <!-- /header -->