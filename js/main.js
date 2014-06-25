  function adjustCardHeight() {
    $('.follower:nth-child(even)').each(function(){
        var thisHeight = $(this).css('height');

        var oddHeight = $(this).prev().css('height');

        if (oddHeight > thisHeight) {
          $(this).css('height', oddHeight);
      }
    });
  }

  function open_reply(reply){
    $("#myModal form").hide();
    $("#reply_question").hide();
    $("#myModalLabel").html('A reply or two');

    $('#replies').children().hide();
    $('#replies #' + reply).show();
    $('#replies').show();
    mixpanel.track('View replies: Question ' + reply); 
  }

  function set_question(id){
    $('.form-inline #questionID').attr('value', id);
    mixpanel.track("Post reply: Question " + id);
  }

$(function(){
        
//Site-wide question modal
    $('#nav_question').click(function(){
        $("#feedback").hide();
        $("#post_question").show();
        $('#question_form').trigger("reset");
        $("#question_form").show();
    });

    $('#post_question').click(function() {
      
      $.ajax({
          type : 'POST',
          url : 'http://connect.feastongood.com/php/post_question.php',           
          data: {
              question : $('#question').val(),
              name   : $('#name').val(),
              email   : $('#email').val()

          },
          success:function (data) {
              $('#question_form').hide();
              $("#feedback").html(data).show();
              $("#post_question").hide();
              mixpanel.track("Question posted");
          }          
      });     
    });        
        
//Signup page
$('#post_twitter').click(function() {

      $.ajax({
          type : 'POST',
          url : 'php/post_twitter.php',           
          data: {
              twitter_1 : $('#twitter_1').val()
          },
          success:function (data) {
            twitterData = JSON.parse( data );
            
            //autofill fields
            $('input#city').val(twitterData.location);
            $('input#twitter').val(twitterData.screen_name);
            $('input#url').val(twitterData.entities.url.urls[0].display_url);
            $('input#avatar').val(twitterData.profile_image_url);
            $('textarea#bio').val(twitterData.description);

            //hide modal
            $('#twitter_check').modal('hide');

            mixpanel.track("Twitter autofill");
            
          }          
      });     
    });       


//Project page

    $('button.reply').click(function(){
      //clear reset form
      $('#modal-question').html('');
      $('#questionID').val('');
      $('#reply').val(''),
      $("#myModal form").show();
      $("#reply_question").show();
      $('#replies').hide();
      $('#myModal form').trigger("reset");
      
      //get new content
      var question_txt = $(this).siblings('.questions').html();
      
      //add new content
      $('#modal-question').html(question_txt);
      $('#questionID').val(question_id);
    });

    $('#reply_question').click(function() {
      
      $.ajax({
          type : 'POST',
          url : '../php/post_reply.php',           
          data: {
              reply : $('#reply').val(),
              questionID   : $('#questionID').val(),
              twitter : $('#reply_twitter').val(),
              name   : $('#reply_name').val()
              //email   : $('#reply_email').val()
          },
          success:function (data) {
              $("#modal-question").html(data);
              $("#myModal form").hide();
              $("#reply_question").hide();
              mixpanel.track("Reply posted");
          }          
      });     
    });

    

});