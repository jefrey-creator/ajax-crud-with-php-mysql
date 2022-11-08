// username
// password
// registerBtn

function Register(){

	const username = $('#username').val();
	const password = $('#password').val();
	const rep_password = $('#rep_password').val();

	$.ajax({
		url: './main/reg-action.php',
		method: 'POST',
		data: {
			username: username,
			password: password,
			rep_password: rep_password,
		},
		cache: false,
		beforeSend: function(){
			$('#loading').css('display', 'inline-block');
			$('#registerBtn').attr('disabled', 'disabled');
		},
		success:function(data){

			if (data == "username_error") {
				$('#username_err').text('Username is required');
			}else if(data == "pass_err"){
				$('#password_err').text('Password is required');
			}else if(data == "short"){
				$('#password_err').text('Password is too short. Must be minimum of 8 characters.');
			}else if(data == "not matched"){
				$('#password_err').text('Passwords do not match!');
			}else if(data == "exist"){
				$('#username_err').text('Username is already exist!');
			}else{

				if (data == "success") {
					$('#success').append('<div class="alert alert-success">Successfully registered.</div>');

					$('#username').val('');
					$('#password').val('');
					$('#rep_password').val('');

					setTimeout(function(){
						$('#success').remove();
					}, 2000);
				}
			}

			$('#loading').css('display', 'none');
			$('#registerBtn').removeAttr('disabled');
		},
		error:function(err){
			console.log(error);
		}
	});


}

function isExist(){

	const data = $('#regForm').serialize();
	const username = $('#username').val();

	$('#username_err').text('');
	$('#username_ok').text('');

	$.ajax({
	
		url: './main/reg-isexist.php',
		method: "POST",
		data: {username: username},
		cache: false,
		beforeSend: function(){
			$('#loading').css('display', 'inline-block');
		},
		success:function(data){
			if (data == true) {
				$('#username_err').text('Username already exist!');
				$('#username_ok').text('');
				$('#registerBtn').attr('disabled', 'disabled');
			}else if(data == false){
				$('#username_ok').text('Username is available.');
				$('#username_err').text('');
				$('#registerBtn').removeAttr('disabled');
			}else{
				$('#username_err').text('');
				$('#username_ok').text('');
				$('#registerBtn').attr('disabled', 'disabled');
			}
			$('#loading').css('display', 'none');
		}

	});
}