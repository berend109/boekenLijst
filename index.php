<?php
    session_start();

	include_once './assets/php/db/conn.php';
?>

<!DOCTYPE html>

<head>

	<title>Boeken Lijst App</title>

	<!-- bootstrap 5 css -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" 
		rel="stylesheet" 
		integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" 
		crossorigin="anonymous">

	<!-- custom css -->
	<link rel="stylesheet" href="./assets/css/index.css">

</head>

<body>

	<div class="container-md border rounded-3 m-5 p-2 mx-auto shadow bg-light" id="mainContainer">

		<p class="text-center fs-2">Welkom</p>
		<p class="text-center fs-5 mt-5">
		Met deze applicatie ga jij je persoonlijke boeken bij kunnen houden.<br>
		Je zult deze boeken dan in een nette lijst kunnen bezien en sorteren.
		</p>

		<div id="loginRegisterDiv" class="p-5 mx-auto">
			<div id="login-div" style="display: block;">
				<form id="loginForm" action="./assets/php/login/login.php" method="post">
					<div class="mb-3">
						<label for="nickname" class="form-label">Nickname</label>
						<input type="text" class="form-control" name="name" required>
					</div>
					<div class="mb-3">
						<label for="pasword" class="form-label">Password</label>
						<input type="password" class="form-control" name="pswd" required>
					</div>
					<button type="submit" class="btn btn-success">Login</button>
					<button class="btn btn-info float-end" id="loginRegistSwapbtn" onclick="swapLoginRegister()">register</button>
				</form>
			</div>

			<div id="register-div" style="display: none;">
				<form id="registerForm" action="./assets/php/login/register.php" method="post">
					<div class="mb-3">
						<label for="nickname" class="form-label">Nickname</label>
						<input type="text" class="form-control" name="name" required>
					</div>
					<div class="mb-3">
						<label for="pasword" class="form-label">Password</label>
						<input type="password" class="form-control" name="pswdRegister1" required>
					</div>
					<div class="mb-3">
						<label for="pasword" class="form-label">Repeat Password</label>
						<input type="password" class="form-control" name="pswdRegister2" required>
					</div>
					<button type="submit" class="btn btn-success">Register</button>
					<button class="btn btn-info float-end" id="loginRegistSwapbtn" onclick="swapLoginRegister()">login</button>
				</form>
			</div>
		</div>

	</div>

	<!-- JavaScript -->
	<script src="./assets/js/loginRegistForm.js"></script>

</body>

</html>