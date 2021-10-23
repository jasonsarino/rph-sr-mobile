/* ------------------------------------------------------------------------------
*
*  # Login page
*
*  Demo JS code for login and registration pages
*
* ---------------------------------------------------------------------------- */

document.addEventListener('DOMContentLoaded', function() {

	// Style checkboxes and radios
	$('.styled').uniform();

	$('#formRegister').on('submit', function(e){
		e.preventDefault();

		if(!$('#chkaccept').is(":checked")) {
			$('#registration-message').html('<div class="alert alert-danger alert-styled-left">By signing up, you must agree to our term of service.</div>');
		} else {
			var formdata = $(this).serialize();
			var url = $(this).attr('action');

			$.ajax({
				url: url,
				data: formdata,
				dataType: 'json',
				type: 'post',
				success: function(data) {
					if(data.success) {
						$('#registration-message').html('<div class="alert alert-success alert-styled-left"><button type="button" class="close" data-dismiss="alert"><span>&times;</span><span class="sr-only">Close</span></button>' + data.message + '</div>');
						location.reload();
					} else {
						$('#registration-message').html('<div class="alert alert-danger alert-styled-left">' + data.message + '</div>');
					}
					$('#btnSignUp').removeClass('disabled');
				}, beforeSend: function() {
					$('#btnSignUp').addClass('disabled');
				}
			});
		}

		
	});

	$('#formLogin').on('submit', function(e){
		e.preventDefault();
		var formdata = $(this).serialize();
		var url = $(this).attr('action');

		$.ajax({
			url: url,
			data: formdata,
			dataType: 'json',
			type: 'post',
			success: function(data) {
				if(data.success) {
					$('#login-message').html('<div class="alert alert-success alert-styled-left">' + data.message + '</div>');
					setTimeout(function(){ window.location.href='dashboard'; }, 2000);
				} else {
					$('#login-message').html('<div class="alert alert-danger alert-styled-left">' + data.message + '</div>');
				}
				$('#btnSignIn').removeClass('disabled');
			}, beforeSend: function() {
				$('#btnSignIn').addClass('disabled');
			}
		});
		
	});

	$('#formResetPassword').on('submit', function(e){
		e.preventDefault();
		var formdata = $(this).serialize();
		var url = $(this).attr('action');
		$.ajax({
			url: url,
			data: formdata,
			dataType: 'json',
			type: 'post',
			success: function(data) {
				if(data.success) {
					$('#recovery-message').html('<div class="alert alert-success alert-styled-left">' + data.message + '</div>');
				} else {
					$('#recovery-message').html('<div class="alert alert-danger alert-styled-left">' + data.message + '</div>');
				}
				$('#resetbtn').removeClass('disabled');
			}, beforeSend: function() {
				$('#resetbtn').addClass('disabled');
			}
		});
		
	});

	$('#formrespassword').on('submit', function(e){
		e.preventDefault();
		var formdata = $(this).serialize();
		var url = $(this).attr('action');
		$.ajax({
			url: url,
			data: formdata,
			dataType: 'json',
			type: 'post',
			success: function(data) {
				if(data.success) {
					$('#res-message').html('<div class="alert alert-success alert-styled-left">' + data.message + '</div>');
				} else {
					$('#res-message').html('<div class="alert alert-danger alert-styled-left">' + data.message + '</div>');
				}
				$('#resetpwdbtn').removeClass('disabled');
			}, beforeSend: function() {
				$('#resetpwdbtn').addClass('disabled');
			}
		});
		
	});

});
