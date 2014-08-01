
$(function(){

// open/close project form

	$('input:radio[name="haveOrg"]').change(
		function(){
	    	console.log('click!!'); 
	    
	        if ($(this).val() == 'Yes'){
	            $('#organization').slideDown();
	        } else {
	        	$('#organization').slideUp();
	        }
	    });


//callback handler for form submit
$("#contribute_form").submit(function( event )
{
	console.log('contribute form submit');
    // var postData = $('#contributor_form').serializeArray();
    // var formURL = $('#contributor_form').attr("action");
    // $.ajax(
    // {
    //     url : formURL,
    //     type: "POST",
    //     data : postData,
    //     success:function(data, textStatus, jqXHR) 
    //     {
    //         console.log('Posted!');
    //     },
    //     error: function(jqXHR, textStatus, errorThrown) 
    //     {
    //         console.log('broke!');     
    //     }
    // });
    event.preventDefault(); //STOP default action
    event.unbind(); //unbind. to stop multiple form submit.
});
 
$( "#contribute_submit" ).click(function() {
	console.log("submit clicked");
  $("#contribute_form").submit();
});


$( "#target" ).submit(function( event ) {
  alert( "Handler for .submit() called." );
  event.preventDefault();
});


$( "#other" ).click(function() {
  // $( "#target" ).submit();
  $("#contribute_form").submit();
});





});