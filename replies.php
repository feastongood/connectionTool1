<?php
    include_once('php/config.php'); 
    $title = 'Replies - The Feast Connection Tool';
    include_once('php/includes/header.php'); 

    //question id - update manually
    $qid = 1;

    //reply count
    $reply_count = $db->get_var("SELECT count(*) FROM replies WHERE questionID=$qid and display=1");

    //reply storage
    $replies = $db->get_results("SELECT id, reply, twitter, dateAdded FROM replies WHERE questionID=1 and display=1");


 // $date = $reply->dateAdded;
                    // $date_time = strtotime($date);
                    // $date = date("F j, Y", $date_time);
                    
                    // $a_reply = $reply->reply;
                    // $reply_br = nl2br($a_reply); 
?>

<link href="css/button.css" rel="stylesheet">

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

  <!-- Question Replies -->
      <div class="container body">
         <div class="row">

         <!-- Left Column - Question -->
            <div class="col-md-3 left_col">
            <h5>Questions</h5>
                  <p>I want to be bold, because I know or group is bold.</p>

                  <p>1. What radical revenue models inspire you?  </p>

                  <p>2. Or, if you had the luxury of not having to worry about sustainability, what revenue // payment experiments would you try, if you had two buildings in mid-town Manhattan to play with?</p>  
            </div>  

              <!-- Replies -->
            <div class="col-md-9">
              <div class="row"> <!-- header -->
                  <div class="col-md-7" id="replyID">
                    <h3>Replies</h3>
                  </div>
                  <div class="col-md-2"><h3>Display?</h3></div>
              </div>
               <form id="display_replies">
                <?php echo $reply_count ; ?>
                <? foreach ( $replies as $m ) { ?>

                     <div class="row">
                      <div class="col-md-7" id="<?= $m->id ?>">
                          <h5><a href="http://twitter.com/<?= $m->twitter ?>"><?= $m->twitter ?></a> on $date</h5>  
                      </div>   

                      <div class="onoffswitch">
                          <input type="checkbox" name="<?= $m->id ?>" class="onoffswitch-checkbox" id="myonoffswitch" checked>
                          <label class="onoffswitch-label" for="myonoffswitch">
                              <span class="onoffswitch-inner"></span>
                              <span class="onoffswitch-switch"></span>
                          </label>
                      </div>


                <?  } ?>

                <div class="row">
                  <div class="col-md-7" id="">
                    <h5><a href="http://twitter.com/"></a> on May 22, 2014</h5> Congratulations on signing a contractor. Doing construction work in NYC is no joke!<br>
                    <br>
                    I really like where Prime Produce is going in terms of being a guild/community space. It resonates with a few other communities I?m familiar with:<br>
                    <br>
                    Makeshift Society<br>
                    Makeshift opened in SF about 18 months ago, and they?re about to open a space in Williamsburg. They bill themselves as a co-working space, but Rena Tom (founder) is much more interested in creating physical space for a community of independent creators. When she launched Makeshift the term ?co-working? was something people were starting to understand, which is why their language focuses around it. They have a very active mailing list, and their space in SF is primarily used for classes. Their community is made of up of all kinds of people: jewelers, photographers, graphic designers, 1-2 person branding/marketing shops, etc. I think I?m one of the few tech people involved, which is nice (especially for SF). <br>
                    <br>
                    Orbital<br>
                    Not sure if you know Gary Chou, but he recently took over the old Kickstarter space in LES and is starting a space called Orbital. He comes from a similar angle of creating a guild or space for independent creators. Gary leans more into the tech/startup community than Rena, as he was previously the General Manager at Union Sq Ventures. He?s very interested in distributed income streams, and creating a supportive space for people who are pursuing an economically self-sufficient life style. <br>
                    <br>
                    I know them both personally, so if you?d like a intro to either, just me know.
                    </div>
                    
                    <div class="col-md-2">

                      <div class="onoffswitch">
                          <input type="checkbox" name="replyID" class="onoffswitch-checkbox" id="myonoffswitch" checked>
                          <label class="onoffswitch-label" for="myonoffswitch">
                              <span class="onoffswitch-inner"></span>
                              <span class="onoffswitch-switch"></span>
                          </label>
                      </div>

                    </div>
                  </div>
                </form>
            
            </div>

           
          </div> <!-- row that holds left col + replies -->

      </div> <!-- /container body-->
  <!-- /Main Content -->

<?php include_once('php/includes/footer.php'); ?>
  <script>
    $(function(){
        $('button.reply').click(function(){
          //clear reset form
          $('#modal-question').html('');
          $('#questionID').val('');
          $('#reply').val(''),
          $("form").show();
          $("#reply_question").show();
          
          //get new content
          var question_txt = $(this).siblings('.questions').html();
          var question_id = $(this).attr('rel');
          
          //add new content
          $('#modal-question').html(question_txt);
          $('#questionID').val(question_id);
        });

        $('a.replies').click(function(){
          //set modal
          $('#replies').show(),
          $("form").hide();
          $("#reply_question").hide();
          $("#myModalLabel").html('A reply or two');
        });

        $('#reply_question').click(function() {
          
          $.ajax({
              type : 'POST',
              url : 'php/post_reply.php',           
              data: {
                  reply : $('#reply').val(),
                  questionID   : $('#questionID').val(),
                  userID  : $('#userID').val(),
                  twitter : $('#twitter').val()
              },
              success:function (data) {
                  $("#modal-question").html(data);
                  $("form").hide();
                  $("#reply_question").hide();
              }          
          });     
        });

    });
  </script>


  </body>
  </html>
