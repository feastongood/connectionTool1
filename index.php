<?php
    include_once('php/config.php'); 
    $title = 'The Feast - The Feast Connection Tool';
    include_once('php/includes/header.php'); 

    //user count
    $userCount = $db->get_var("SELECT count(*) FROM users");

    //reply storage
    $q1replies = $db->get_results("SELECT reply, twitter, dateAdded FROM replies WHERE questionID=3 and display=1");
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
          <!-- <div class="form-group">
            <label for="twitter">Your Twitter Name</label>
            <div class="input-group">
              <span class="input-group-addon">@</span>
              <input type="text" class="form-control" id="twitter" name="twitter" placeholder="feastongood">
            </div>
          </div>-->

            <div class="form-group" stye="float:left;">
           <label for="name">Name</label>
            <div class="input-group">
              <input type="text" class="form-control" id="reply_name" name="reply_name" placeholder="">
            </div>
            </div>
          
          <div class="form-group" stye="float:left;">
           <label for="name">Email</label>
            <div class="input-group">
              <input type="text" class="form-control" id="reply_email" name="reply_email" placeholder="">
            </div>
            </div>

          <input type="text" style="display:none;" id="questionID" name="questionID" value="3"> <!-- update with question id-->
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
              <h2>The Feast</h2>
              <h5>Established 2008</h5>
              <p>The Feast is committed to fostering a community of innovators who are revolutionizing their industries and striving for social impact. Each year we host a flagship Conference to share unique perspectives and tackle today’s greatest societal challenges. Our Conference serves as a starting point for relationships, groundbreaking projects and new initiatives that run all year long.
</p>
          </div>
          
          <div class="col-md-3" id="follower_count">
            <div class="team_count">
              <h3>7</h3>
              <p>Team members</p>
            </div>
            <div class="helper_count">
              <a href="followers.php"><h3><?php echo $userCount; ?></h3>
              <p>Followers</p></a>
            </div>
          </div>

        </div>
      </div>

  <!-- Project Image/Video -->
      <div class="jumbotron">
        <div class="container">
            <img class="cover" src="images/project/Feast_CoverPhoto.jpg" alt="The Feast"/>
        </div>
      </div>

  <!-- Project Info -->
      <div class="container body">
         <div class="row">

         <!-- Left Column -->
            <div class="col-md-3 left_col round">
              <div class="team">
              <h5>Team</h5>
                <!-- loop through team members? 
					- query for project people
					- loop through and print each member
					- how do we denote CEO? or rank?
                -->

                <a href="followers.php#Jerri_Chou"><img class="avatar" src="http://pbs.twimg.com/profile_images/192787162/Chou_Jeri-088162_bigger.jpg" title="Jerri Chou" alt="Jerri Chou"/></a>
                <a href="followers.php#Karen_Baker"><img class="avatar" src="http://pbs.twimg.com/profile_images/430911776600096768/xu_HNBmt_bigger.jpeg" title="Karen Baker" alt="Karen Baker"/></a>
                <a href="followers.php#Lauren_Sinreich"><img class="avatar" src="http://pbs.twimg.com/profile_images/426144880390176768/PgSXbITA_bigger.jpeg" title="Lauren Sinreich" alt="Lauren Sinreich"/></a>
                
                <p>and 4 more.</p>                
              </div>
              <!-- follow button -->
              <div class="external_links">
                <ul>
                  <li><img src="images/icons/link.png"/> <a href="http://feastongood.com" target="_blank">The Feast</a></li>
                  <li><img src="images/icons/fb.png"/> <a href="https://www.facebook.com/feastongood" target="_blank">Facebook</a></li>
                  <li><img src="images/icons/twitter.png"/> <a href="https://www.twitter.com/feastongood" target="_blank">Twitter</a></li>
                  <li><img src="images/icons/instagram.png"/> <a href="https://www.instagram.com/feastongood" target="_blank">Instagram</a></li>
                  <li><img src="images/icons/vimeo.png"/> <a href="https://www.vimeo.com/feastongood" target="_blank">Vimeo</a></li>
                </ul>
              </div>

              <div class="helpers"></div>
              <div class="followers">
                <a href="followers.php"><h5><?php echo $userCount; ?> Followers</h5></a>
              </div>
            </div>

         <!-- Updates and Asks -->
            <div class="col-md-9">
              <div class="row">
                <div class="update round">
                  <div class="col-md-7"><!-- wins and rocks -->
                    <h5>Wins</h5>
                    <p>Several back to back serendipitous talks about a new way to do content that finally gets the systems map that is my brain out in a useful way for the world. Also starting to curate in a super solid thread around the idea of progression from self out to world throughout the conference.</p>

                    <h5>Rocks</h5>
                    <p>Still trying to figure out the best way to facilitate mass collaboration in a way the lets attendees lead the dialogue while still curating useful and inspiring content/curatorial boundaries.  Also trying to figure out what's necessary vs. unnecessary to facilitate. </p>

                    <p>posted by <a href="followers.php#Jerri_Chou">Jerri Chou</a><br/>
                    6/6/2014</p>
                    
                    <?php echo $replyLink; ?>
                  </div>
                  <div class="col-md-5 questions"><!-- question -->
                  <h5>Questions</h5>
                  <p>What are the best generative tactics for organizing cross-disciplinary people around challenges of interest?</p>
				  <ul>We're also looking for a:
                  <li>Lead sponsor for the conference</li>
                  <li><a href="http://feastongood.com/about/work-with-us/">Web engineer for The Connection Tool</a> </li>
                  </ul>
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
