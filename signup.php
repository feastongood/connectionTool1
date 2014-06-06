<?php 
    include_once('php/config.php'); 
$title = 'Signup - The Feast Connection Tool';
include_once('php/includes/header.php'); ?>

 <!-- Main Content -->
      <!-- Main jumbotron for a primary marketing message or call to action -->


<div class="modal fade bs-example-modal-sm in" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="false" id="twitter_check">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">

        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h4 class="modal-title" id="mySmallModalLabel">Quick question</h4>
        </div>
        <div class="modal-body">
          <p>Do you have a twitter account?</p>
        <div class="form-group">
                  <label for="twitter_1">Twitter</label>
                  <div class="input-group">
                    <span class="input-group-addon">@</span>
                    <input type="text" class="form-control" id="twitter_1" name="twitter_1" placeholder="feastongood" required>
                  </div>
        </div>
        <p style="font-size: 11px;">We can autofill a few of these fields if you do.</p>
        </div>
        <div class="modal-footer" style="margin-top:0px">
        <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
        <button type="button" id="post_twitter" class="btn btn-primary">Yes</button>
      </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div>

      <div class="container-fluid">
      	<form class="form-inline" role="form" action="php/post_signup.php" method="post">
        <!-- Example row of columns -->
        <div class="row">
          <div class="col-md-8">

          <h1>Hi!</h1>
          <p>Please take a moment to fill out your information.</p>

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
                    <label for="company">City</label>
                    <input type="text" class="form-control" id="city" name="city" placeholder="New York" required>
                  </div>
                </td>
              </tr>
              <tr>
               <td>
                <div class="form-group">
                  <label for="url">URL</label>
                  <div class="input-group">
                    <span class="input-group-addon">http://</span>
                    <input type="text" class="form-control" id="url" name="url" placeholder="feastongood.com">
                  </div>
                </div>
                 
              </td>
              <td rowspan="3"><!-- spans 4 rows -->
                <div class="form-group">
                  <label for="Bio">Bio</label>
                  <textarea style="width:100%; height:130px;" class="form-control" id="bio" name="bio" placeholder="160 char bio" required></textarea>
                </div>
              </td>
               
              
            </tr>
             <tr>
                <td>
                <div class="form-group">
                  <label for="twitter">Twitter</label>
                  <div class="input-group">
                    <span class="input-group-addon">@</span>
                    <input type="text" class="form-control" id="twitter" name="twitter" placeholder="feastongood" required>
                  </div>
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
        <p>No one can save the world by themselves.</p><p>We're creating a digital space for social innovators and the people who support them to come together help each other do great work. </p> <p>So glad you're here, thanks for joining us.</p>
        </div>
      </div>
      
        <div class="row">

          <div id="madlibs" class="col-md-12">
          <h3>We're curious, What makes you tick?</h3>
           <p>I <input type="text" class="ml_inline" id="what" name="what" placeholder="what you do" required>, because <input type="text" class="ml_inline" id="why" name="why" placeholder="why you do it" required>.</p>
           </div>
         </div> <!-- /row madlibs -->

         <div class="row">
          <div class="col-md-12">
            <input type="text" style="display:none;" id="avatar" name="avatar" value=""> <!-- avatar url-->

            <input class="ml_submit" type="submit" onClick="mixpanel.track('Signup form submit');"/>
          </div>

        </div>
    </div>
</form>
  </div> <!-- /container -->
  <!-- /Main Content -->

<?php include_once('php/includes/footer.php'); ?>

<script src="js/jqBootstrapValidation.js"></script>


  <script>
    // mixpanel.track( 'Visit form page');
    $(function(){
        $('#twitter_check').modal('show');
        $("input").not("[type=submit]").jqBootstrapValidation();
        var twitterData = [];
    });
  </script>
   <script src="js/json2.js"></script>
   <script>mixpanel.track("Signup page");</script>
  </body>
  </html>
