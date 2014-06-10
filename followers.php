<?php
    include_once('php/config.php'); 
    $title = 'Followers - The Feast Connection Tool';
    include_once('php/includes/header.php'); 

    $user_count = $db->get_var("SELECT count(*) FROM users");

    // users by id
    $users_id = $db->get_results("SELECT * FROM users ORDER BY id DESC");
    $users_array_id = array();
    $users_json_id = json_encode($users_id);

    //users by name
    $users_name = $db->get_results("SELECT * FROM users ORDER BY lname");
    $users_array_name = array();
    $users_json_name = json_encode($users_name);

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


 <!-- Content -->
      <div id="followers" class="container">


       <div class="row"> <!-- header -->

          <div class="col-md-8">
              <h2>Who's all here?</h2>
              <p>There are <?php echo $user_count; ?> people following New York Rising, check them out!<br/>
              <i>Is your avatar missing? Want to update any of your info?
              <br/>Send <a href="mailto:tash@feastongood.com">tash@feastongood.com</a> a note and we'll post it.</i></p>
          </div>
          
          <div class="col-md-4"></div>

        </div>

        <div id="holder" class="row" style="display:none;">

            <!-- templates print here -->


  
        </div><!-- holder -->
      </div> <!-- /container -->
  <!-- /Main Content -->


<script src="js/dust-full-2.0.3.js"></script>

<script>
mixpanel.track("Followers page");
var users_id = { "users": <?php print_r($users_json_id); ?> };
var users_name = { "users": <?php print_r($users_json_name); ?> };
</script>

 <!-- digest template (col-md-6 = 50% width) -->
  <script type="text/x-template" id="follower_template">
    {#users}
        <div class="col-md-6 follower" id="follower{id}"> 
              <div class="follower_wrap round">
                <div class="follower_left">
                {#avatar}
                <a id="{fname}_{lname}"><img src="{avatar}" alt="{fname} {lname}" title="{fname} {lname}"/></a><br/>
                {:else}
                {/avatar}
                <!-- <h5><a class='follower_replies' data-toggle='modal' data-target='#myModal' onClick='mixpanel.track('View replies modal opened');'>2 Replies</a></h5> -->
                
              </div>
              <div class="follower_right">
                <h2>{fname} {lname}</h2>
                <h5>{city}</h5>
                <p>{bio}</p>
                <ul>
                  {#url}
                  <li><a href="http://{url}"><img src="images/icons/link.png"/></a></li>
                  {:else}
                  {/url}
                  {#twitter}
                  <li><a href="http://twitter.com/{twitter}"><img src="images/icons/twitter.png"/></a></li>
                  {:else}
                  {/twitter}
                  {#linkedin}
                  <li><a href="http://linkedin.com/in/{linkedin}"><img src="images/icons/linkedin.png"/></a></li>
                  {:else}
                  {/linkedin}
                  {#instagram}
                  <li><a href="http://instagram.com/{instagram}"><img src="images/icons/instagram.png"/></a></li>
                  {:else}
                  {/instagram}
                </ul>
              </div>
            </div>
          </div>
    {/users}
  </script>

<?php include_once('php/includes/footer.php'); ?>
    <script>
    // Set up and compile the Dust.js templates
    var follower_dust = dust.compile($("#follower_template").html(),"follower_dust");
    dust.loadSource(follower_dust);
  
    // render the templates
    dust.render("follower_dust", users_id, function(err, res){
    $("#holder").append(res);
    $("#holder").fadeIn();
    console.log("dust loaded");
    adjustCardHeight();
    });

  </script>


  </body>
  </html>
