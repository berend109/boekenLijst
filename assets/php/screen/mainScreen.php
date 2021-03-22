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
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css"
			rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl"
			crossorigin="anonymous">

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
					<a id="navbarProjectName" class="navbar-brand" href="http://localhost/boekenlijst/assets/php/screen/mainScreen.php">boekenlijst</a>
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
					<a class="nav-link h3 text-white my-2 text-center">Boek Toevoegen</a>
					<form class="d-grid" action="../books/sendBooksToDB.php" method="post" enctype="multipart/form-data">
						<div class="mt-0 mb-0 p-3">
							<p class="text-center form-title">Titel</p>
							<input type="text" class="form-control text-center" name="title" required>
						</div>
						<div class="mt-0 mb-0 p-3">
							<p class="text-center form-title">Auteur</p>
							<input type="text" class="form-control text-center" name="author" required>
						</div>
						<div class="mt-0 mb-0 p-3">
							<p class="text-center form-title">Foto</p>
							<input type="file" class="form-control" name="picture">
						</div>
						<div class="mt-0 mb-0 p-3">
							<p class="text-center form-title">Korte notitie</p>
							<textarea class="form-control text-center" name="shortNote" maxlength="100" placeholder="Max 100 karakters"></textarea>
						</div>
						<div class="mt-0 mb-0 p-3">
							<p class="text-center form-title">Wel of niet in bezit</p>
							<select class="form-select" name="ownership">
								<option value="nee">nee</option>
								<option value="ja">ja</option>
							</select>
						</div>
						<div class="mt-0 mb-0 p-3">
							<p class="text-center form-title">Wel of niet gelezen</p>
							<select class="form-select" name="read">
								<option value="nee">nee</option>
								<option value="bezig">bezig</option>
								<option value="ja">ja</option>
							</select>
						</div>
						<div class="mt-2 p-4">
							<button id="submitBTN" type="submit" class="btn btn-danger form-control py-2" name="submit">Boek toevoegen</button>
						</div>
					</form>
				</div>
			</div>
		</div>

		<div class="container mt-5" id="booklistContainer">
			<?php
				require_once '../books/displayBooks.php';
			?>
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