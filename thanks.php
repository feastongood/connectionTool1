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
    $mysqldate = date("M d, Y", $datetime);
?>
<? include_once('php/includes/header.php'); ?>


 <!-- Main Content -->
      <!-- Main jumbotron for a primary marketing message or call to action -->
      <div id="heroine" class="jumbotron" style="height:500px;">
        <div class="container">

          <div class="heroContent col-md-8 col-md-offset-2">
            <h1 style="font-size: 120px; color:#00debc;">Thanks!</h1>
            <p>Watch your inbox! <br/>We'll drop you a line we've got everybody's information together.</p>
          </div>

        </div>
      </div>


      <div class="container" style="display:none;">
  
     </div> <!-- /container -->
  <!-- /Main Content -->

<? include_once('php/includes/footer.php'); ?>

  </body>
  </html>
