function ValidateEmail(mail) 
{
 if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(mail))
  {
    return (true)
  }
    return (false)
}

function adjustCardHeight() {
	$('.guest_wrap:nth-child(even)').each(function(){
			var thisHeight = $(this).css('height');

			var oddHeight = $(this).prev().css('height');

			if (oddHeight > thisHeight) {
				$(this).css('height', oddHeight);
		}
	});
}


$(function(){

// Digest templates

    // Set up and compile the Dust.js templates
    var guest_dust = dust.compile($("#guest_template").html(),"guest_dust");
    dust.loadSource(guest_dust);
  
    // render the templates
    dust.render("guest_dust", guests_id, function(err, res){
    $("#guest_digest").append(res);
    $("#guest_digest").fadeIn();
    });

	adjustCardHeight();
    


//email templates
    // Set up and compile the Dust.js templates
    var email_dust = dust.compile($("#email_template").html(),"email_dust");
    dust.loadSource(email_dust);

//fill guest_count
	$("span#guest_count").html(guests_id.guests.length);

//sort cards - by name
	$('#sort li#guests_name').click(function(){

		mixpanel.track( 'Sort',{ 'Sort type': 'Name' } );

		$('#sort li').removeClass('selected');
		$(this).addClass('selected');

		$("#guest_digest").html('');

		// render the templates
	    dust.render("guest_dust", guests_name, function(err, res){
	    $("#guest_digest").append(res);
	    });

	    $('.shortlist li').each(function(){
		var checkID = $(this).attr('id');
		console.log(checkID);

		$('#guest_digest #' + checkID + ' input.shortlist_check' ).prop( "checked", true );
		});
		
		adjustCardHeight();

	});

	//by id
	$('#sort li#guests_id').click(function(){

		mixpanel.track( 'Sort',{ 'Sort type': 'Recently Added' } );

		$('#sort li').removeClass('selected');
		$(this).addClass('selected');

		$("#guest_digest").html('');

		// render the templates
	    dust.render("guest_dust", guests_id, function(err, res){
	    $("#guest_digest").append(res);
	    });

	    $('.shortlist li').each(function(){
		var checkID = $(this).attr('id');
		console.log(checkID);

		$('#guest_digest #' + checkID + ' input.shortlist_check' ).prop( "checked", true );
		});

	    adjustCardHeight();


	});


// Add names to shortlist
	$( "#guest_digest" ).on('change', 'input', function() {
			$("#short_list").show();
			//shared vars
			var $input = $( this );
			var nameId = $input.attr('value');
			var name = $input.attr('name');
			
			if ($input.prop( "checked" )){

				var newName = "<li id=guest" + nameId + ">" + name + "</li>"; 
				$( "ul.shortlist" ).append( newName ); 

				$("#shortlist_email").show();

				mixpanel.track( 'Add to shortlist',{ 'Person': name } );

			} else {
				var li = "li#guest" + nameId;
				$(li).remove();

				mixpanel.track( 'Removed from shortlist',{ 'Person': name } );

				if ($("ul.shortlist").children().length == 0){
					$("#shortlist_email").hide();
				}
			}

	});

//Email shortlist

	//display email modal
	$("#shortlist_email").click(function(){
		$('#myModal').modal();

		//clear list + add people
		$('.email_list').html('');
		$('.shortlist > li').clone().appendTo('.email_list');

		mixpanel.track( 'click pink email button' );
	});

	//collect guest info 
	$('button#send_email').click(function(){

		mixpanel.track( 'click send email button' );

		//update button
		var btn = $(this);
		btn.button('loading');

		//get email address
		var email_addy = $('input#email').val(); 

		if( !ValidateEmail(email_addy)) { 
			$('input#email').parent().addClass('has-error');
			$('input#email').attr('placeholder', 'Email address here please!');
			btn.button('reset');

			mixpanel.track( 'Email address not valid' );

		} else { 
			//get list ids

			//clear out template holder
			$("#html_template").html('');

			$('.email_list li').each(function(){

				//get guest id
				var guestid = $(this).attr('id');
				var guestsplits = guestid.split('t');
				var g_id = parseInt(guestsplits[1]);

				$.each(guests_id.guests, function(i, v) {

					if (v.id == g_id) {
						
						dust.render("email_dust", guests_id.guests[i], function(err, res){
			 			$("#html_template").append(res);

			 			});
					}
				});

			});

			//get table in a long string
			var table_html = $("#html_template").html();
			var event_info = $(".event_deets").html();

			$.post('php/email.php', { email: email_addy, shortlist: table_html, event_info: event_info }, function(response){

				var sent = '<h3>Sent!</h3><p>See you on Sunday.</p>'
				$('.modal-body').html('');
				$('.modal-body').html(sent);

				window.setTimeout(function(){
				     $('#myModal').modal('hide');
				  }, 2000); 
				mixpanel.track( 'Shortlist email sent' );
			});

		} //else

	}); //button#send_email

});	//end $

/*
Search for id

	search guests_id.guests for id
	then pull index of array id lives in

	$.each(guests_id.guests, function(i, v) {
    if (v.id == selectedID) {
        alert("found it");
        return;
    }

make sure even card is the same height as prev card. 



*/


