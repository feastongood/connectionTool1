$('input:radio[name="haveOrg"]').change(
	function(){
    	console.log('click!!'); 
    
        if ($(this).val() == 'Yes'){
            $('#organization').slideDown();
        } else {
        	$('#organization').slideUp();
        }
    });