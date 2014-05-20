<? include_once('php/includes/header.php'); ?>


 <!-- Main Content -->
      <!-- Main jumbotron for a primary marketing message or call to action -->
      <div id="heroine" class="jumbotron">
        <div class="container">

          <div class="heroContent col-md-8 col-md-offset-2">
            <h1>The Event Editor!</h1>
            <p>Want to set up a new event?</p>
            <p class="pink">Please fill out this quick form.</p>
          </div>

        </div>
      </div>


      <div class="container">
      	<form class="form" role="form" action="php/newEvent.php" method="post">
        <!-- Example row of columns -->
        <div class="row">
          <div class="col-md-8">

              <table>
                <tr>
                  <td>
                    <div class="form-group">
                      <label for="name">Event Name</label>
                      <input type="text" class="form-control" id="name" name="name" placeholder="Name">
                    </div>
                  </td>
                  <td>
                    <div class="form-group">
                      <label for="theme">Event Theme</label>
                      <input type="text" class="form-control" id="theme" name="theme" placeholder="Empathy">
                    </div>
                  </td>
                  <td>
                   <div class="form-group">
                    <label for="speaker">Main Speaker</label>
                    <input type="email" class="form-control" id="speaker" name="speaker" placeholder="Speaker Name">
                  </div>
                </td>
              </tr>
              <tr>
                <td>
                  <div class="form-group">
                    <label for="date">Date</label>
                    <input type="text" class="form-control" id="date" name="date" placeholder="">
                  </div>
                </td>
                  <td>
                   <div class="form-group">
                    <label for="time">Time</label>
                    <input type="email" class="form-control" id="time" name="time" placeholder="6-8 pm">
                  </div>
                </td>
                <td></td>
                </tr>
                <tr>
                <td colspan="2">
                  <div class="form-group">
                    <label for="venue">Venue</label>
                    <input type="text" class="form-control" id="venue" name="venue" placeholder="Venue Name">
                  </div>
                  <div class="form-group">
                    <label for="venue">Address</label>
                    <input type="text" class="form-control" id="address1" name="address1" placeholder="Address 1">
                    <input type="text" class="form-control" id="address2" name="address2" placeholder="Address 2">
                    <input type="text" class="form-control" id="city" name="city" placeholder="City">
                    <input type="text" class="form-control" id="state" name="state" placeholder="State">
                    <input type="text" class="form-control" id="zip" name="zip" placeholder="Zip">
                  </div>

                </td>
              </tr>
              
          </table>
      </div>

      <div class="col-md-4">

      </div>
      </div>
        
         <div class="row">


          <input class="ml_submit" type="submit">

        </div>
      


    </div>
    </form>
  </div> <!-- /container -->
  <!-- /Main Content -->

<? include_once('php/includes/footer.php'); ?>
<script src="js/bootstrap-datepicker.js"></script>
<script>
  $('#date').datepicker();
</script>
  </body>
  </html>