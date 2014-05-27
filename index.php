<?php

    include_once('php/includes/header.php'); 

    //reply count: update manually
    $q1reply_count = $db->get_var("SELECT count(*) FROM replies WHERE questionID=1 and display=1");

    //reply storage
    $q1replies = $db->get_results("SELECT reply, twitter, dateAdded FROM replies WHERE questionID=1 and display=1");
    $q1_html = '';

    foreach ($q1replies as $reply) {
      $a_reply = $reply->reply;
      $tweeter = $reply->twitter;
      $date = $reply->dateAdded;

      $date_time = strtotime($date);
      $date = date("F j, Y", $date_time);
      
      $reply_br = nl2br($a_reply);

      $q1_html .= "<div class='each_reply'><h5><a href='http://twitter.com/$tweeter'>$tweeter</a> on $date</h5> $reply_br</div>";
    }


    

?>


<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Got something to share?</h4>
      </div>
      <div class="modal-body">
      <div id="replies" style="display:none;" >
        <?php echo $q1_html; ?>
      </div>

      <div id="modal-question"></div>
        <form class="form-inline" role="form">
          <textarea id="reply"></textarea>
           <div class="form-group">
            <label for="twitter">Your Twitter Name</label>
            <div class="input-group">
              <span class="input-group-addon">@</span>
              <input type="text" class="form-control" id="twitter" name="twitter" placeholder="feastongood">
            </div>
          </div>
          <input type="text" style="display:none;" id="questionID" name="questionID" value=""> <!-- update with question id-->
          <input type="text" style="display:none;" id="userID" name="userID" value="1"> <!-- update with userID us PHP-->
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" id="reply_question" class="btn btn-primary">Save</button>
      </div>
    </div>
  </div>
</div>

 <!-- Project Content -->
      <div id="project_header" class="container">
        <div class="row">
          <div class="col-md-9">
              <h2>New York Rising</h2>
              <h5>Established 2013</h5>
              <p>The New York Rising Community Reconstruction Program is a more than $650 million planning and implementation process established in 2013 to provide rebuilding and resiliency assistance to communities severely damaged by Hurricane Irene, Tropical Storm Lee, and Superstorm Sandy.
</p>
          </div>
          
          <div class="col-md-3" id="follower_count">
            <div class="team_count">
              <h3>1</h3>
              <p>Team member</p>
            </div>
            <div class="helper_count">
              <h3>28</h3>
              <p>Helpers and followers</p>
            </div>
          </div>

        </div>
      </div>

  <!-- Project Image/Video -->
      <div class="jumbotron">
        <div class="container">
            <img class="cover" src="images/project/NYRising_CoverPhoto.jpg" alt="New York Rising"/>
        </div>
      </div>

  <!-- Project Info -->
      <div class="container body">
         <div class="row">

         <!-- Left Column -->
            <div class="col-md-3 left_col">
              <div class="team">
              <h5>Team</h5>
                <img class="avatar" src="images/project/gita.png" title="Gita Nandan" alt="Gita Nandan"/>
              </div>
              <!-- follow button -->
              <div class="external_links">
                <ul>
                  <li><img src="images/icons/link.png"/><a href="http://stormrecovery.ny.gov/community-reconstruction-program" target="_blank">New York Rising</a></li>
                  <li><img src="images/icons/fb.png"/><a href="https://www.facebook.com/NYStormRecovery" target="_blank">Facebook</a></li>
                  <li><img src="images/icons/twitter.png"/><a href="https://www.twitter.com/NYStormRecovery" target="_blank">Twitter</a></li>
                </ul>
              </div>

              <div class="helpers"></div>
              <div class="followers">
                <a href="attendees.php">28 Followers</a>
              </div>
            </div>

         <!-- Updates and Asks -->
            <div class="col-md-9">
              <div class="row">
                <div class="update">
                  <div class="col-md-7"><!-- wins and rocks -->
                  <h5>Wins</h5>
                    <p>Construction insurance issue resolved with our GC.  Our buildings were originally constructed as one lot in 1919. I'll let your imagination run wild from there.  </p>

                    <h5>Rocks</h5>
                    <p>We are challenging ourselves to re-think conventional payment options.  Pay-per-minute is one inspiration. We may settle into a revenue model that is super recognizable, and we're okay with that, as long as we selected it with intention.  </p>

                    <p>posted by Chris Chavez<br/>
                    4/28/2014</p>

                    <!-- reply count -->
                    <a class="replies" data-toggle="modal" data-target="#myModal" onClick="mixpanel.track("View replies modal opened");"><?php echo $q1reply_count; ?> Replies</a>
                  </div>
                  <div class="col-md-5 questions"><!-- question -->
                  <h5>Questions</h5>
                  <p>I want to be bold, because I know or group is bold.</p>

                  <p>1. What radical revenue models inspire you?  </p>

                  <p>2. Or, if you had the luxury of not having to worry about sustainability, what revenue // payment experiments would you try, if you had two buildings in mid-town Manhattan to play with?</p>  
                  </div>

                  <button class="btn btn-primary btn-lg reply" rel="1" data-toggle="modal" onClick="mixpanel.track("Post reply modal opened");" data-target="#myModal">Reply</button>

                </div><!--/update-->
              </div>
            </div>
         </div>

      </div> <!-- /container -->
  <!-- /Main Content -->

<?php include_once('php/includes/footer.php'); ?>
<script>mixpanel.track("Project page");</script>


  </body>
  </html>