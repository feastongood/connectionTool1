<?php
    include_once('php/config.php'); 
    $title = 'New York Rising - The Feast Connection Tool';
    include_once('php/includes/header.php'); 

    //user count
    $userCount = $db->get_var("SELECT count(*) FROM users");

    //reply storage
    $q1replies = $db->get_results("SELECT reply, twitter, dateAdded FROM replies WHERE questionID=2 and display=1");
    $q1_html = '';

    if (count($q1replies) > 0 ){
      foreach ($q1replies as $reply) {
        $a_reply = $reply->reply;
        $tweeter = $reply->twitter;
        $date = $reply->dateAdded;

        $date_time = strtotime($date);
        $date = date("F j, Y", $date_time);
        
        $reply_br = nl2br($a_reply);

        $q1_html .= "<div class='each_reply'><h5><a href='http://twitter.com/$tweeter'>$tweeter</a> on $date</h5> $reply_br</div>";
      }

      //reply count: update manually
      $q1reply_count = $db->get_var("SELECT count(*) FROM replies WHERE questionID=2 and display=1");
      $replyLink = "<a class='replies' data-toggle='modal' data-target='#myModal' onClick='mixpanel.track('View replies modal opened');'>$q1reply_count Replies</a>";
    
    } else {
    
      $replyLink = '';
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
          <input type="text" style="display:none;" id="questionID" name="questionID" value="2"> <!-- update with question id-->
          <input type="text" style="display:none;" id="userID" name="userID" value=""> <!-- update with userID us PHP-->
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
              <h3><?php echo $userCount; ?></h3>
              <p>Helpers and Followers</p>
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
            <div class="col-md-3 left_col round">
              <div class="team">
              <h5>Team</h5>
                <img class="avatar" src="images/project/gita.png" title="Gita Nandan" alt="Gita Nandan"/>
                Gita Nandan
              </div>
              <!-- follow button -->
              <div class="external_links">
                <ul>
                  <li><img src="images/icons/link.png"/> <a href="http://stormrecovery.ny.gov/community-reconstruction-program" target="_blank">New York Rising</a></li>
                  <li><img src="images/icons/link.png"/> <a href="http://redhookcrp.wordpress.com" target="_blank">Red Hook CRP</a></li>
                  <li><img src="images/icons/fb.png"/> <a href="https://www.facebook.com/NYStormRecovery" target="_blank">Facebook</a></li>
                  <li><img src="images/icons/twitter.png"/> <a href="https://www.twitter.com/NYStormRecovery" target="_blank">Twitter</a></li>
                </ul>
              </div>

              <div class="helpers"></div>
              <div class="followers">
                <h5><?php echo $userCount; ?> Followers</h5>
              </div>
            </div>

         <!-- Updates and Asks -->
            <div class="col-md-9">
              <div class="row">
                <div class="update round">
                  <div class="col-md-7"><!-- wins and rocks -->
                    <h5>Wins</h5>
                    <p>The committee is clearly keeping up the energy to keep on working even after the official end of the process, which is really inspirational volunteering activism.</p>

                    <h5>Rocks</h5>
                    <p>As we move into the implementation phase there has been a bit of a communication breakdown from the top-down, and feeling a bit in the dark.  </p>

                    <p>posted by Gita Nandan<br/>
                    5/28/2014</p>
                    
                    <?php echo $replyLink; ?>
                  </div>
                  <div class="col-md-5 questions"><!-- question -->
                  <h5>Questions</h5>
                  <p>If you had/have a vision of how to transform your community that requires multiple governmental agencies, what out of the box approaches would you take?</p>
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
