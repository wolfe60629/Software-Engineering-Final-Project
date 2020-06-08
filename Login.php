<?php
	session_start();
	if(isset($_SESSION['userlogin'])) {
		header("Location: mainPage.php");
	}
?>

<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>


<link rel="stylesheet" type="text/css" href="CSS\LoginPage.css?id=1234">
<meta http-equiv="expires" content="Sun, 01 Jan 2014 00:00:00 GMT"/>
<meta http-equiv="pragma" content="no-cache" />
<meta charset="ISO-8859-1" />
<background/>
<title>Web Application Login</title>


</head>
<body>
	<form class = "loginForm">
		<div class="logoContainer">
			 <img id="logo" src="Images/bankLogo.png" alt="logo" class="logoImg">
		</div>

		<div class="textboxContainer">
			<div class="username">
				<label for="username"><b>Username</b></label> <input id="username"
					type="text" placeholder="Enter Username" name="username" required>
			</div>
			<div class="password">
				<label for="psw"><b>Password </b></label> <input id="password"
					type="password" placeholder="Enter Password" name="password"
					required>
				</div>
				<div class="submitButton">
					<button id="submit">Login</button>
					</div>
		</div>

	</form>
</body>
</html>


<script>
$(function(){
$('#submit').click(function(e){
	var valid = this.form.checkValidity();

	if(valid) {
	var username = $('#username').val();
	var password = $('#password').val();


	e.preventDefault();

	$.ajax({
		type: 'POST',
		url: 'LoginProc.php',
		data: {username: username , password: password},
		success: function(data) {

			if ($.trim(data) === "1") {
				setTimeout(' window.location.href = "mainPage.php"', 200);
			}else {
			alert(data);
			};
		},
		error: function(data) {
			alert('Incorrect Login Information');
		}
	});
	}
	});
});
</script>
