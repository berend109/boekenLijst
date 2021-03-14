<?php

if (!isset($_SESSION)) {
	session_start();
}

if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == true) { ?>

	<!DOCTYPE html>
	<html lang="nl">

	<head>

		<title>Boeken Lijst App</title>

		<!-- bootstrap 5 css -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

		<!-- custom css -->
		<link rel="stylesheet" href="../../css/mainScreen.css">

		<!-- favicon -->
		<link rel="icon" href="../../img/FaviconIMG.jpg" type="image/gif" sizes="16x16">

	</head>

	<body>

		<nav class="navbar sticky-top navbar-light bg-light">
			<div class="container-fluid">
				<div class="d-flex justify-content-start">
					<button class="btn btn-secondary" id="menu-btn">Boek Toevoegen</button>
				</div>
				<div class="d-flex justify-content-center">
					<p id="navbarProjectName" class="navbar-brand">boekenlijst</p>
				</div>
				<div class="d-flex justify-content-center">
					<form action='../login/logout.php'>
						<button class="btn btn-danger form-control me-2">Sign out</button>
					</form>
				</div>
			</div>
		</nav>

		<div class="my-container active-cont">
			<div class="content">
				<div class="text-light bg-secondary side-navbar" id="sidebar">
					<ul class="nav flex-column text-white w-100">
						<a class="nav-link h3 text-white my-2 text-center">
							Boek Toevoegen
						</a>
						<!-- send book info to db -->
						<!-- TODO: make this work -->
						<form class="d-grid" action="../books/sendBooksToDB.php" method="post">
							<div class="p-3">
								<p for="nickname" class=" text-center">Titel</p>
								<input type="text" class="form-control text-center" name="title" required>
							</div>
							<div class="p-3">
								<p for="pasword" class=" text-center">Auteur</p>
								<input type="password" class="form-control text-center" name="author" required>
							</div>
							<!-- add more like the design -->
							<div class="p-3">
								<button class="btn btn-danger form-control">Submit boek</button>
							</div>
						</form>
					</ul>
				</div>
				<div class="container">
					<p>hello world</p>
				</div>
			</div>
		</div>

		<script src="../../js/sidebar.js"></script>

	</body>

	</html>

<?php

} else {
	echo "You are not logged in !!";
	echo '<br><br>';
	echo "<button onclick=\"window.location.href='http://localhost/boekenlijst/';\">Go back</button>";
	header("Refresh:5; url=http://localhost/boekenlijst/");
}

?>