
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="shortcut icon" href="assets/ico/favicon.ico">

  <title><?php echo $event->name; ?></title>

  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">

  <link href="css/foundation.css" rel="stylesheet">
  <link href="css/feast.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">

  <!-- Typekit -->
  <script type="text/javascript" src="//use.typekit.net/uam3pbg.js"></script>
  <script type="text/javascript">try{Typekit.load();}catch(e){}</script>

<!-- ============== UPDATE =================== -->
<!-- start Mixpanel -->
<script type="text/javascript">(function(e,b){if(!b.__SV){var a,f,i,g;window.mixpanel=b;b._i=[];b.init=function(a,e,d){function f(b,h){var a=h.split(".");2==a.length&&(b=b[a[0]],h=a[1]);b[h]=function(){b.push([h].concat(Array.prototype.slice.call(arguments,0)))}}var c=b;"undefined"!==typeof d?c=b[d]=[]:d="mixpanel";c.people=c.people||[];c.toString=function(b){var a="mixpanel";"mixpanel"!==d&&(a+="."+d);b||(a+=" (stub)");return a};c.people.toString=function(){return c.toString(1)+".people (stub)"};i="disable track track_pageview track_links track_forms register register_once alias unregister identify name_tag set_config people.set people.set_once people.increment people.append people.track_charge people.clear_charges people.delete_user".split(" ");
for(g=0;g<i.length;g++)f(c,i[g]);b._i.push([a,e,d])};b.__SV=1.2;a=e.createElement("script");a.type="text/javascript";a.async=!0;a.src=("https:"===e.location.protocol?"https:":"http:")+'//cdn.mxpnl.com/libs/mixpanel-2.2.min.js';f=e.getElementsByTagName("script")[0];f.parentNode.insertBefore(a,f)}})(document,window.mixpanel||[]);
mixpanel.init("30aa7a28b81fa0274d5496e8e2222e3f");</script>
<!-- end Mixpanel -->

  <script type="text/javascript">
    mixpanel.register_once({
        "event_id": "<?php echo $event->id; ?>",
        "event_name": "<?php echo $event->name; ?>"
    });
  </script>

<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-28425601-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>

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