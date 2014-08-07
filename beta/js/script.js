
$(function(){

// open/close project form

	$('input:radio[name="haveOrg"]').change(
		function(){ 
	    
	        if ($(this).val() == 'Yes'){
	            $('#organization').slideDown();

	            //add validation to appropriate fields
		        $('#name').prop('required', true);
		        $('#established').prop('required', true);
		        $('#p_city').prop('required', true);

	        } else {
	        	$('#organization').slideUp();

	        	//remove validation to appropriate fields
		        $('#name').prop('required', false);
		        $('#established').prop('required', false);
		        $('#p_city').prop('required', false);
	        }

	        
	    });

	//grab twitter avatar
	$('#twitter_id').blur(function() {

		if ($(this).val()){
			      $.ajax({
	          type : 'POST',
	          url : '../php/post_twitter.php',           
	          data: {
	              twitter_1 : $('#twitter_id').val()
	          },
	          success:function (data) {
	            twitterData = JSON.parse( data );
	            
	            //autofill fields
	            $('input#avatar').val(twitterData.profile_image_url);
	            console.log(twitterData.profile_image_url);
	          }          
	      }); 
		}
    
    });   

    //grab company twitter avatar
	$('#p_twitter_id').blur(function() {

		if ($(this).val()){
			      $.ajax({
	          type : 'POST',
	          url : '../php/post_twitter.php',           
	          data: {
	              twitter_1 : $('#p_twitter_id').val()
	          },
	          success:function (data) {
	            p_twitterData = JSON.parse( data );
	            
	            //autofill fields
	            $('input#p_avatar').val(p_twitterData.profile_image_url);
	            console.log(p_twitterData.profile_image_url);
	            
	          }          
	      }); 
		}
    
    }); 
 

	//callback handler for form submit
	$("#contributor_form").submit(function( event )
	{
	    $(this).attr("disabled", "disabled");
	    var postData = $('#contributor_form').serializeArray();
	    var formURL = $('#contributor_form').attr("action");
	    $.ajax(
	    {
	        url : formURL,
	        type: "POST",
	        data : postData,
	        success:function(data, textStatus, jqXHR) 
	        {
	        	window.location.href = 'http://connection.feastongood.local/beta/thanks.php' + data;
	        },
	        error: function(jqXHR, textStatus, errorThrown) 
	        {
	        	alert('Oh no! There was a problem! Please email tash@feastongood.com to let us know.');
	        }
	    });

		event.preventDefault(); //STOP default action
	    
	});


});