
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

	//callback handler for form submit
	$("#contributor_form").submit(function( event )
	{

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
	        	alert('Oh no! There was a problem! Please email tash@feastongood.com and let us know.');
	        }
	    });

		event.preventDefault(); //STOP default action
	    
	});
 


});