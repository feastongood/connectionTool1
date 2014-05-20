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
    $db = new ezSQL_mysql('db70126_guestb','alldaylong','db70126_guestbook','internal-db.s70126.gridserver.com');

    /***********************************************************************/


    $event = $db->get_row("SELECT * FROM Events WHERE id = 2");


    $datetime = strtotime($event->date);
    $mysqldate = date("F d, Y", $datetime);
?>
<? include_once('php/includes/header.php'); ?>


 <!-- Main Content -->
      <!-- Main jumbotron for a primary marketing message or call to action -->
      <div id="heroine" class="jumbotron">
        <div class="container">

          <div class="heroContent col-md-8 col-md-offset-2">
            <h1>You're coming for dinner!</h1>
            <p>We're so excited to have you feast with us on incredible ideas for world-shaking change. First off, let's learn a bit more about you. We'll use this to tell everyone who they can expect to meet over their meal.</p>
            <p class="pink">Please fill out this quick form.</p>
          </div>

        </div>
      </div>


      <div class="container">
      	<form class="form-inline" role="form" action="php/collect.php" method="post">
        <!-- Example row of columns -->
        <div class="row">
          <div class="col-md-8">

              <table id="basic_info">
                <tr>
                  <td>
                    <div class="form-group">
                      <label for="fname">First Name</label>
                      <input type="text" class="form-control" id="fname" name="fname" placeholder="First Name" required>
                    </div>
                  </td>
                  <td>
                    <div class="form-group">
                      <label for="lname">Last Name</label>
                      <input type="text" class="form-control" id="lname" name="lname" placeholder="Last Name" required>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td>
                   <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="hello@feastongood.com" required>
                  </div>
                </td>
                <td>
                  <div class="form-group">
                    <label for="company">Company</label>
                    <input type="text" class="form-control" id="company" name="company" placeholder="The Feast">
                  </div>
                </td>
              </tr>
              <tr>
                <td>
                 <div class="form-group">
                  <label for="twitter">Twitter</label>
                  <div class="input-group">
                    <span class="input-group-addon">@</span>
                    <input type="text" class="form-control" id="twitter" name="twitter" placeholder="feastongood">
                  </div>
                </div>
              </td>
              <td>
                <div class="form-group">
                  <label for="location">Location</label>
                  <input type="text" class="form-control" id="location" name="location" placeholder="City" required>
                </div>
              </td>
            </tr>
          </table>
      </div>

      <div class="col-md-4">

        <div class="secondary">
        <p>You can't save the world on your own. We've found dinners to be much more fruitful when you know who's coming in advance, so we thought this handy form could help. </p><p>Fill it out with love, and in 24 hours we'll send you a recap via email. Bon appetit! </p> 
        </div>
      </div>
      
        <div class="row">

          <div id="madlibs" class="col-md-12">
          <h3>So... What makes you tick?</h3>
           <!--Hi, I'm <span class="ml_fname">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> <span class="ml_lname">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>. -->
           <p>I <input type="text" class="ml_inline" id="what" name="what" placeholder="what you do" required>, because <input type="text" class="ml_inline" id="why" name="why" placeholder="why you do it" required>.</p>
           <p>The biggest challenge I'm facing is, <br/>
             <input type="text" class="ml_inline" id="question" name="question" placeholder="How do you create intimacy between total strangers at a dinner party?" required></p>
           </div>
         </div> <!-- /row madlibs -->

         <div class="row">
          <div class="col-md-12">
            <input type="text" style="display:none;" id="event" name="event" value="<?php echo $event->id; ?>"> <!-- update with new event id-->

            <input class="ml_submit" type="submit" onClick="mixpanel.track( 'Form submit' );">
          </div>

        </div>
      


    </div>
</form>
  </div> <!-- /container -->
  <!-- /Main Content -->

<? include_once('php/includes/footer.php'); ?>


  <script src="js/jqBootstrapValidation.js"></script>


  <script>
     mixpanel.track( 'Visit form page');
    $(function(){
        $('#fname').blur(function(){
            var name = $(this).val();
            $('span.ml_fname').html('');
            $('span.ml_fname').html(name);
        });

        $('#lname').blur(function(){
            var name = $(this).val();
            $('span.ml_lname').html('');
            $('span.ml_lname').html(name);
        });

        $("input").not("[type=submit]").jqBootstrapValidation();
    });
  </script>
  </body>
  </html>
