<?php
    include_once('php/config.php'); 
    $title = 'Thanks - The Feast Connection Tool';
    include_once('php/includes/header.php');
?>


 <!-- Main Content -->
      <!-- Main jumbotron for a primary marketing message or call to action -->
      <div class="jumbotron" style="height:500px; background: #E4E4E4;">
        <div class="container">

          <div class="heroContent col-md-8 col-md-offset-2">
            <h1 style="font-size: 120px; color:#00debc;">Thanks!</h1>
            <p>Now that you're signed up, head on over to <br/><a href="index.php" onClick="mixpanel.track("Go to Project Page");">New York Rising's project page</a> to see their latest update.</p>
          </div>

        </div>
      </div>


      <div class="container" style="display:none;">
  
     </div> <!-- /container -->
  <!-- /Main Content -->

<?php include_once('php/includes/footer.php'); ?>
<script>mixpanel.track("Thanks page");</script>

  </body>
  </html>
