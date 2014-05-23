<?php include_once('php/includes/header.php'); ?>

 <!-- Main Content -->
      <!-- Main jumbotron for a primary marketing message or call to action -->


      <div class="container">
      	<form class="form-inline" role="form" action="php/collect.php" method="post">
        <!-- Example row of columns -->
        <div class="row">
          <div class="col-md-8">

          <h1>Hi Fname!</h1>
          <p>Please take a moment to fill out or update your information.</p>

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
                    <label for="company">Location</label>
                    <input type="text" class="form-control" id="location" name="location" placeholder="City">
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
              <td rowspan="3"><!-- spans 4 rows -->
                <div class="form-group">
                  <label for="Bio">Bio</label>
                  <textarea style="width:100%; height:130px;" class="form-control" id="bio" name="bio" required> Twitter bio</textarea>
                  <!--input type="text" class="form-control" id="bio" name="bio" placeholder="Twitter bio" required-->
                </div>
              </td>
               
              
            </tr>
             <tr>
                <td>
                 <div class="form-group">
                  <label for="LinkedIn">LinkedIn</label>
                  <div class="input-group">
                    <span class="input-group-addon">linkedin.com/in/</span>
                    <input type="text" class="form-control" id="linkedin" name="linkedin" placeholder="feastongood">
                  </div>
                </div>
              </td>
              </tr>
              <tr>
              <td>
               <div class="form-group">
                  <label for="Facebook">Facebook</label>
                  <div class="input-group">
                    <span class="input-group-addon">facebook.com/</span>
                    <input type="text" class="form-control" id="facebook" name="facebook" placeholder="feastongood">
                  </div>
                </div>
              </td>
            </tr>
             <tr>
              <td>
               <div class="form-group">
                  <label for="instagram">Instagram</label>
                  <div class="input-group">
                    <span class="input-group-addon">instagram.com/</span>
                    <input type="text" class="form-control" id="instagram" name="instagram" placeholder="feastongood">
                  </div>
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
          <h3>we're curious, What makes you tick?</h3>
           <!--Hi, I'm <span class="ml_fname">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> <span class="ml_lname">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>. -->
           <p>I <input type="text" class="ml_inline" id="what" name="what" placeholder="what you do" required>, because <input type="text" class="ml_inline" id="why" name="why" placeholder="why you do it" required>.</p>
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

<?php include_once('php/includes/footer.php'); ?>
  </body>
  </html>
