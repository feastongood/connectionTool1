<?php
    include_once('php/config.php'); 
    $title = 'Followers - The Feast Connection Tool';
    include_once('php/includes/header.php'); 

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
        <div class="row">

<?php 
  
  //get users
  $users = $db->get_results("SELECT fname, lname, avatar, city, bio, url, twitter, linkedin, instagram, what, why FROM users");

  //parse through users
  foreach ($users as $user){ ?>
 <img src='images/project/gita.png' alt='$user->fname $user->lname' title='$user->fname'/><br/>
  } ?>

      <div class='follower col-md-6'>
            <div class='follower_wrap round'>
                <div class='follower_left'>
                <img src='images/project/gita.png' alt='$user->fname $user->lname' title='$user->fname'/><br/>
               <!-- <h5><a class='follower_replies' data-toggle='modal' data-target='#myModal' onClick='mixpanel.track('View replies modal opened');'>2 Replies</a></h5> -->
                
              </div>
  <div class="follower_right">
                <h2><?php echo $user->fname;?> <?php echo $user->lname;?></h2>
                <h5>New York City</h5>
                <p>Community @primeproduce. Partnerships @catchafire. Chair @ynpnnyc. Love social-info-tech-design.</p>
                <ul>
                  <li><a href=""><img src="images/icons/link.png"/></a></li>
                  <li><a href=""><img src="images/icons/twitter.png"/></a></li>
                  <li><a href=""><img src="images/icons/linkedin.png"/></a></li>
                  <li><a href=""><img src="images/icons/instagram.png"/></a></li>
                </ul>
              </div>
            </div>
          </div>
 

  //print out html

  //loop through social media links, display the ones that are populated
?>


          <div class="follower col-md-6">
            <div class="follower_wrap round">
                <div class="follower_left">
                <img src="images/project/gita.png" alt="Gita Nandan" title="Gita Nandan"/><br/>
               <!-- <h5><a class='follower_replies' data-toggle='modal' data-target='#myModal' onClick='mixpanel.track('View replies modal opened');'>2 Replies</a></h5> -->
                
              </div>
              <div class="follower_right">
                <h2>Chris Cannon</h2>
                <h5>New York City</h5>
                <p>Community @primeproduce. Partnerships @catchafire. Chair @ynpnnyc. Love social-info-tech-design.</p>
                <ul>
                  <li><a href=""><img src="images/icons/link.png"/></a></li>
                  <li><a href=""><img src="images/icons/twitter.png"/></a></li>
                  <li><a href=""><img src="images/icons/linkedin.png"/></a></li>
                  <li><a href=""><img src="images/icons/instagram.png"/></a></li>
                </ul>
              </div>
            </div>
          </div>

<div class="follower col-md-6">
            <div class="follower_wrap round">
                <div class="follower_left">
                <img src="images/project/gita.png" alt="Gita Nandan" title="Gita Nandan"/><br/>
               <!-- <h5><a class='follower_replies' data-toggle='modal' data-target='#myModal' onClick='mixpanel.track('View replies modal opened');'>2 Replies</a></h5> -->
                
              </div>
              <div class="follower_right">
                <h2>Chris Cannon</h2>
                <h5>New York City</h5>
                <p>Community @primeproduce. Partnerships @catchafire. Chair @ynpnnyc. Love social-info-tech-design.</p>
                <ul>
                  <li><a href=""><img src="images/icons/link.png"/></a></li>
                  <li><a href=""><img src="images/icons/twitter.png"/></a></li>
                  <li><a href=""><img src="images/icons/linkedin.png"/></a></li>
                  <li><a href=""><img src="images/icons/instagram.png"/></a></li>
                </ul>
              </div>
            </div>
          </div>


  

      </div> <!-- /container -->
  <!-- /Main Content -->

<?php include_once('php/includes/footer.php'); ?>
<script>mixpanel.track("Followers page");</script>

  </body>
  </html>
