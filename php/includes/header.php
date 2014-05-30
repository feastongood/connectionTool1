<?php      

  //config
  //include_once("php/config.php"); included on page level to deal with Title updates

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
    $db = new ezSQL_mysql($DB_USERNAME,$DB_PASSWORD,$DB_DATABASE,$DB_HOST);

    /**********************************************************************/

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="The Feast Connection Tool">
  <meta name="author" content="The Feast, Tash Wong">
  <link rel="shortcut icon" href="assets/ico/favicon.ico">

  <title><?php echo $title; ?></title>

  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">

  <link href="css/foundation.css" rel="stylesheet">
  <link href="css/feast.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">

  <!-- Typekit -->
  <script type="text/javascript" src="//use.typekit.net/uam3pbg.js"></script>
  <script type="text/javascript">try{Typekit.load();}catch(e){}</script>

<!-- ================================= -->

<!-- start Mixpanel --><script type="text/javascript">(function(f,b){if(!b.__SV){var a,e,i,g;window.mixpanel=b;b._i=[];b.init=function(a,e,d){function f(b,h){var a=h.split(".");2==a.length&&(b=b[a[0]],h=a[1]);b[h]=function(){b.push([h].concat(Array.prototype.slice.call(arguments,0)))}}var c=b;"undefined"!==typeof d?c=b[d]=[]:d="mixpanel";c.people=c.people||[];c.toString=function(b){var a="mixpanel";"mixpanel"!==d&&(a+="."+d);b||(a+=" (stub)");return a};c.people.toString=function(){return c.toString(1)+".people (stub)"};i="disable track track_pageview track_links track_forms register register_once alias unregister identify name_tag set_config people.set people.set_once people.increment people.append people.track_charge people.clear_charges people.delete_user".split(" ");
for(g=0;g<i.length;g++)f(c,i[g]);b._i.push([a,e,d])};b.__SV=1.2;a=f.createElement("script");a.type="text/javascript";a.async=!0;a.src="//cdn.mxpnl.com/libs/mixpanel-2.2.min.js";e=f.getElementsByTagName("script")[0];e.parentNode.insertBefore(a,e)}})(document,window.mixpanel||[]);
mixpanel.init("6acbd1ffcd22d6cb19ded5a105b02ba9");</script><!-- end Mixpanel -->

<!-- google -->
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-28425601-1']);
  _gaq.push(['_setDomainName', 'feastongood.com']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>


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
          <div class="col-md-8">
            <h1 id="site-title"><a href="http://connection.feastongood.com/" title="The Feast" rel="home"><span class="hide-text">The Feast</span></a></h1>
          </div>
          <div class="col-md-4"> <!-- is 3 with icons -->
            <!--<ul>
              <li><a href=""><img src="images/icons/inbox.png" alt="Inbox"></a></li>
              <li><a href=""><img src="images/icons/attendees.png" alt="Everyone"></a></li>
              <li><a href=""><img src="images/icons/user.png" alt="Your Profile"></a></li>
            </ul>-->

              <ul class="nav-bar">
                <li><a onClick="mixpanel.track("Nav: Project Page");" href="index.php">New York Rising</a></li>
                <li><a onClick="mixpanel.track("Nav: Followers Page");" href="followers.php">Followers</a></li>
                <li><a href="about.php" onClick="mixpanel.track("Nav: About Page");">About</a> </li>
                <li><a href="#" id="nav_question" onClick="mixpanel.track("Nav: Question Modal");" data-toggle="modal" data-target="#questionModal">Questions?</a></li>
              </ul>

           
          </div>
        </div>

      </header>
 <!-- /header -->

 <!-- Question Modal -->
<div class="modal fade" id="questionModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="questionModalLabel">Questions?</h4>
      </div>
      <div class="modal-body">
      <div id="feedback"></div>
      <form class="form-inline" id="question_form" role="form">
      <p>Have a question about what's going on here? <br/>
      Found a bug?<br/>
      Have an amazing idea you think we should add in?</p>
        
        <label for="question">Let us know!</label>
          <textarea id="question"></textarea>
           <div class="form-group" stye="float:left;">
           <label for="name">Name</label>
            <div class="input-group">
              <input type="text" class="form-control" id="name" name="name" placeholder="">
            </div>
            </div>
          
          <div class="form-group" stye="float:left;">
           <label for="name">Email</label>
            <div class="input-group">
              <input type="text" class="form-control" id="email" name="email" placeholder="">
            </div>
          </div>
        </form>
      </div>
      
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" id="post_question" class="btn btn-primary">Save</button>
      </div>
    </div>
  </div>
</div>