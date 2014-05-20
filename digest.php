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

// www.mysite.com/category/subcategory?q=myquery
//    echo $_GET['q'];  //output: myquery


    $event = $db->get_row("SELECT * FROM Events WHERE id = 2");

    $datetime = strtotime($event->date);
    $mysqldate = date("F d, Y", $datetime);

    //get guest info, split into 2 objects for sorting by id + name
    $guests_id = $db->get_results("SELECT * FROM Guests WHERE event = 2 ORDER BY id DESC");
    $guest_array_id = array();
    $guest_json_id = json_encode($guests_id);
    
    foreach ( $guests_id as $guest )
      {
            // encode as json
            $newguest = json_encode($guest);
            
            //add to json array
            $guest_array[] = $newguest;
      } 

    $guests_name = $db->get_results("SELECT * FROM Guests WHERE event = 2 ORDER BY lname");
    $guest_array_name = array();
    $guest_json_name = json_encode($guests_name);
    
    foreach ( $guests_name as $guest )
      {
            // encode as json
            $newguest = json_encode($guest);
            
            //add to json array
            $guest_array[] = $newguest;
      } 

?>

<? include_once('php/includes/header.php'); ?>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Email Your shortlist</h4>
      </div>
      <div class="modal-body">
        <p>We're going to email these people to you:</p>
        <ul class="email_list"></ul>
       
        <div class="form-group">
            <label for="email">What's your email address?</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="">
        </div>

        <!--p>If your email address is in our database, we’ll let those you picked know who you are, so they can be on the look out for you too.</p-->

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="send_email" data-loading-text="Hold Please...">Email</button>
      </div>
    </div>
  </div>
</div>


 <!-- Main Content -->
      <!-- Main jumbotron for a primary marketing message or call to action -->
      <div id="heroine" class="jumbotron">
        <div class="container">

          <div class="heroContent col-md-8 col-md-offset-2">
            <h1>Here's Who's Coming to The Feast </h1>
            <p>Have a look and choose a special few to add to your shortlist — we'll email their info to you so you can connect over dinner. Cheers to new friends! 
          </div>

        </div>
      </div>


      <div class="container">

         <div class="row"> <!-- sort row -->
              <div class="col-md-offset-3 col-md-9" id="sort">
                  <ul class="">
                    <li>Sort by</li>
                    <li class="sort_li selected" id="guests_id">Recently Added</li>
                    <li class="sort_li" id="guests_name">Name</li>
                    
              </div>
            </div>
      
        <div class="row"> <!-- column wrapper-->

          <!-- Event column -->
          <div class="col-md-3">
          
            <div id="event_info">
              
              <div class="event_deets"><!-- this div will be included in shortlist email -->
              <h3><?php echo $event->name; ?></h3>
              <p><?php echo $event->speaker; ?>, speaker</p>

              <p><?php echo $event->venue; ?><br/>
                <?php echo $event->address1; ?><br/>
                <?php 
                  if ($event->address2) {  
                    echo "$event->address2 <br/>";
                  } 
                ?>
               <?php echo $event->city; ?>, <?php echo $event->state; ?> <?php echo $event->zip; ?>
              </p>

              <p><?php echo $mysqldate; ?><br/>
                <?php echo $event->time; ?></p>
              </div>

              <p><span id="guest_count"></span> of <span id="tickets_sold">27</span> feasters are listed here.</p>

              <p><a href="index.php">Still need to add yourself?</a></p>
            </div>

            <div id="short_list" style="display:none;">
              <h3>I'd like to meet</h3>
                <ul class="shortlist"></ul>
                <a class="ml_submit" id="shortlist_email" style="display:none;">Email me!</a>
            </div>

          </div>

          <!-- Guest column -->
          <div class="col-md-9"> 
            
            <!-- lead speaker 
            <div class="row">
              <div class="col-md-9" id="lead_speaker">
                  <p>lead speaker</p>
              </div>
            </div> row -->

            <!-- guests -->
            <div class="row" id="guest_digest" style="display:none;">
            </div> <!-- row -->

          </div>

        </div> <!-- /row column wrapper -->

  </div> <!-- /container -->

  <div id="html_template" style="display:none;"></div>



<? include_once('php/includes/footer.php'); ?>

  <script>
    mixpanel.track( 'Visit digest page');
    var guests_id = { "guests": <?php print_r($guest_json_id); ?> };
    var guests_name = { "guests": <?php print_r($guest_json_name); ?> };
  </script>

  <!-- digest template (col-md-6 = 50% width) -->
  <script type="text/x-template" id="guest_template">
    {#guests}
        <div class="col-md-6 guest_wrap" id="guest{id}"> 
            <div class="guest_inner clearfix">

              <div class="guest_head clearfix">
                  <div class="name pull-left">
                    <h4>{fname} {lname}</h4>
                    <p>
                    {#twitter}
                      <a href="http://twitter.com/{twitter}">@{twitter}</a> <br/>
                    {:else}
                    {/twitter}
                    {#company}
                      {company}
                    {:else}
                    {/company}
                    </p>
                  </div>
                  <div class="avatar pull-right"><img src="{avatar}"/></div>
              </div>
              
              <div class="guest_body clearfix">
                <p><!--Hi, Im {fname} {lname}. -->I {what}, because {why}</p>
                <p><strong>My challenge is... <br/>{question}</strong></p>  
              </div>

              <div class="guest_footer">
                <p class="pull-left">{location}</p>
                <p class="pull-right">Add to shortlist <input type="checkbox" class="shortlist_check" name="{fname} {lname}" value="{id}"> </p>
              </div>
           </div><!-- /guest_wrap -->
        </div>
    {/guests}
  </script>

  <!-- email template -->
  <script type="text/x-template" id="email_template">
        <table <table cellspacing='10' width='100%' style='background: #ffffff; margin-bottom: 10px;'>
        <tr>
          <td>
            <p><strong>{fname} {lname}</strong><br/>
            {#twitter}
              <a href="http://twitter.com/{twitter}">@{twitter}</a> <br/>
            {:else}
            {/twitter}
            {#company}
                {company}
            {:else}
            {/company}</p>
            <td align="right"><img src="{avatar}"/></td>
          </td>
        </tr>
        <tr>
          <td colspan='2'>
           <p>I {what}, because {why}.</p>
          <p><strong>My challenge is...{question}</strong></p>
          </td>
        </tr>
        </table>
  </script>

  <script src="js/dust-full-2.0.3.js"></script>
  <script src="js/main.js"></script>
  </body>
  </html>
