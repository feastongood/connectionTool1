<?php
    include_once('../php/config.php'); 
    $title = 'The Feast Connection Tool';
    include_once('includes/header.php'); 

    //user count -- move to config?
    $userCount = $db->get_var("SELECT count(*) FROM users");

    // PROJET INFO
    // grab project id from query parm
    $project_id = $_GET['p'];

    // get info from db
    $project_info = $db->get_row("SELECT id, name, short_desc, url, facebook, twitter, instagram, vimeo, linkedin, established FROM projects WHERE id=$project_id");

    // get team members
    $team_members_count = $db->get_var("SELECT count(*) FROM users WHERE projectID=$project_id");
    $team_members = $db->get_results("SELECT id, fname, lname, avatar FROM users WHERE projectID=$project_id");

    // PROJECT SIDEBAR
    // create team view
    $team_html = "";
    foreach ($team_members as $member){
      $underscore_name = $member->fname ."_" . $member->lname;
      $temp = "<a href='followers.php#$underscore_name'><img class='avatar' src='$member->avatar' title='$member->fname $member->lname' alt='$member->fname $member->lname'/></a>
      ";

      $team_html .= $temp;
    }

    // create external links
    $links_html = "<li><img src='../images/icons/link.png'/> <a href='$project_info->url' target='_blank'>$project_info->name</a></li>
    ";
    if ($project_info->facebook){
      $links_html .= "<li><img src='../images/icons/fb.png'/> <a href='$project_info->facebook' target='_blank'>Facebook</a></li>
      ";
    }
    if ($project_info->twitter){
      $links_html .= "<li><img src='../images/icons/twitter.png'/> <a href='$project_info->twitter' target='_blank'>Twitter</a></li>
      ";
    }
    if ($project_info->instagram){
      $links_html .= "<li><img src='../images/icons/instagram.png'/> <a href='$project_info->instagram' target='_blank'>Instagram</a></li>
      ";
    }
    if ($project_info->vimeo){
      $links_html .= "<li><img src='../images/icons/vimeo.png'/> <a href='$project_info->vimeo' target='_blank'>Vimeo</a></li>
      ";
    }
    if ($project_info->linkedin){
      $links_html .= "<li><img src='../images/icons/linkedin.png'/> <a href='$project_info->linkedin' target='_blank'>LinkedIn</a></li>
      ";
    }


    // REPLIES

    //get question ids for this project
    $question_ids_object = $db->get_results("SELECT Distinct(questionID) FROM replies WHERE projectID=$project_id");
    
    //convert question_ids to simple array
    $question_ids = array();
    foreach($question_ids_object as $q){ 
      array_push($question_ids, $q->questionID);
    }

    //create container array for reply html
    $reply_links = array();
    $reply_html = "";

    //get replies for each question
    foreach($question_ids as $x){
      $replies = $db->get_results("SELECT reply, name, dateAdded FROM replies WHERE questionID=$x");
      $html = "<div id='$x' style='display:none;'>";
      $replyLink = "";

      if (count($replies) > 0 ){
        foreach ($replies as $reply) {
          $a_reply = $reply->reply;
          $name = $reply->name;
          $date = $reply->dateAdded;

          $date_time = strtotime($date);
          $date = date("F j, Y", $date_time);
          
          $reply_br = nl2br($a_reply);

          $html .= "<div class='each_reply'><h5>$name on $date</h5> $reply_br</div>";
        }

        //reply count: update manually
        $reply_count = count($replies);
        $replyLink = "<a class='replies' data-toggle='modal' data-target='#myModal' onclick='open_reply($x);'>$reply_count Replies</a>";
        
        
      } else {
        $replyLink = 'No replies yet';
      }
      $html .= "</div>";
      $reply_html .= $html;
      $reply_links[$x]= $replyLink;

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
      <div id="modal-question"></div>
      <div id="replies" style="display:none;" >
        <?php echo $reply_html; ?>
      </div>

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

          <input type="text" style="display:none;" id="questionID" name="questionID" value=""> <!-- update with question id-->
          <input type="text" style="display:none;" id="userID" name="userID" value=""> <!-- update with userID use PHP-->
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
              <h2><?php echo $project_info->name; ?></h2>
              <h5>Established <?php echo $project_info->established; ?></h5>
              <p><?php echo $project_info->short_desc; ?> </p>
          </div>
          
          <div class="col-md-3" id="follower_count">
            <div class="team_count">
              <h3><?php echo $team_members_count; ?></h3>
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
            <img class="cover" src="images/<?php echo $project_id; ?>.jpg" alt="The Feast"/>
        </div>
      </div>

  <!-- Project Info -->
      <div class="container body">
         <div class="row">

         <!-- Left Column -->
            <div class="col-md-3 left_col round">
              <div class="team">
              <h5>Team</h5>
                <?php echo $team_html; ?>               
              </div>
              <!-- follow button -->
              <div class="external_links">
                <ul>
                  <?php echo $links_html; ?>
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
                <?php include("includes/update_$project_id.php"); ?>
              </div>
            </div>
         </div>

      </div> <!-- /container -->
  <!-- /Main Content -->

<?php include_once('includes/footer.php'); ?>
<script>mixpanel.track("Project page");</script>


  </body>
  </html>
