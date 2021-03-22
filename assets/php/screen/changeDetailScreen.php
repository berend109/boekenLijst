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
		<link rel="stylesheet" href="../../css/index.css">

		<!-- favicon -->
		<link rel="icon" href="../../img/FaviconIMG.jpg" type="image/gif" sizes="16x16">

	</head>

	<body>

		<nav class="navbar sticky-top navbar-light bg-light">
			<a id="navbarProjectName" class="navbar-brand brand" href="http://localhost/boekenlijst/assets/php/screen/mainScreen.php">boekenlijst</a>
			<form action='../login/logout.php'>
				<button class="btn btn-danger form-control me-2">Sign out</button>
			</form>
		</nav>

		<?php
			$_SESSION["bookID"] = htmlspecialchars($_GET["bookID"]);
			require_once("../books/changeDetail.php");
		?>

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