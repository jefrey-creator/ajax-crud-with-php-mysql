function Login(){

	const data = $('#loginForm').serialize();
	const username = $('#username').val();
	const password = $('#password').val();

	// $('#loginBtn').attr('disabled', 'disabled');

	$.ajax({
		url: './main/login-action.php',
		method: 'POST',
		data: {
			username: username,
			password: password
		},
		cache: false,
		beforeSend:function(){
			$('#loading').css('display', 'inline-block');
			$('#loginBtn').attr('disabled', 'disabled');
		},
		success:function(data){
			if (data == "success") {
				$('#success').append('<div class="alert alert-success">Logged in successfully.</div>');
				setTimeout(function(){
					location.replace('welcome')
				}, 2000);
				$('#loginBtn').attr('disabled', 'disabled');
			}else if(data == "error"){
				$('#error').append('<div class="alert alert-danger">Invalid username or password!</div>');
				setTimeout(function(){
					$('#error').remove();
				}, 2000);
				$('#loginBtn').removeAttr('disabled');
				$('#loading').css('display', 'none');
			}

			
		},
		error:function(err){
			console.log(err);
		}
	});

}

function logOut(){

	$('#success').append('<div class="alert alert-success">You have been logged out.</div>');
	$('#outBtn').attr('disabled', 'disabled');
	setTimeout(function(){
		location.replace('logout')
	}, 2000);

}