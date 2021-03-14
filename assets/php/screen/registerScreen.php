<?php
    session_start();

	include_once './assets/php/db/conn.php';
?>

<!DOCTYPE html>
<html lang="nl">

<head>

	<title>Boeken Lijst App</title>

	<!-- bootstrap 5 css -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css"
		rel="stylesheet"
		integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl"
		crossorigin="anonymous">

	<!-- custom css -->
	<link rel="stylesheet" href="../../css/index.css">

	<!-- Favicon -->
	<link rel="icon" href="../../img/FaviconIMG.jpg" type="image/gif" sizes="16x16">

</head>

<body>

	<div class="container-md border rounded-3 m-5 p-2 mx-auto shadow bg-light" id="mainContainer">

		<p class="text-center fs-2">Welkom</p>
		<p class="text-center fs-5 mt-5">
		Met deze applicatie ga jij je persoonlijke boeken bij kunnen houden.<br>
		Je zult deze boeken dan in een nette lijst kunnen bezien en sorteren.
		</p>

		<div name="registerForm" id="register-div" class="p-5 mx-auto submitForm">
			<form id="registerForm" action="../login/register.php" method="post" onsubmit="return checkRegisterForm()">
				<div class="mb-3">
					<label for="nickname" class="form-label">Nickname</label>
					<?php
						$name = ($_SESSION['name']);
						echo '<input type="text" class="form-control" name="name" value="'. $name .'" ?>';
					?>
				</div>
				<div class="mb-3">
					<label for="pasword" class="form-label">Password</label>
					<input type="password" class="form-control" name="pswdRegister1">
				</div>
				<div class="mb-3">
					<label for="pasword" class="form-label">Repeat Password</label>
					<input type="password" class="form-control" name="pswdRegister2">
				</div>
				<button type="submit" class="btn btn-success">Registreren</button>
				<a class='btn btn-danger float-end' onclick="window.location.href='http://localhost/boekenLijst'">Terug naar login</a>
			</form>
		</div>

	</div>

	<!-- JS -->
	<script src="../../js/checkForm.js"></script>
	<script src="../../js/registerQuestion.js"></script>

</body>

</html>
