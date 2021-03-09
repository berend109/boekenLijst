<?php

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

		<form class="p-5 mx-auto" id="loginForm">
			<div class="mb-3">
				<label for="exampleInputEmail1" class="form-label">Nickname</label>
				<input type="email" class="form-control" name="nickname" id="exampleInputEmail1">
			</div>
			<div class="mb-3">
				<label for="exampleInputPassword1" class="form-label">Password</label>
				<input type="password" class="form-control" name="password" id="exampleInputPassword1">
			</div>
			<button type="submit" class="btn btn-success">Submit</button>
		</form>

	</div>

</body>

</html>