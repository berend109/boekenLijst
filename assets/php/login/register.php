<?php

if (!isset($_SESSION)) {
	session_start();
}

require_once('../db/conn.php');

$pdo = new connection;
$con = $pdo->connect();
$name = $_POST['name'];
$password = $_POST['pswdRegister1'];
$password2 = $_POST['pswdRegister2'];

class register
{
	public function __construct() {}

	public function register($con, $name, $password)
	{
		try {
			$stmt = $con->prepare("SELECT * FROM `users` WHERE naam = ?");
			$stmt->execute([$name]);
			$user = $stmt->fetch();

			if ($user) {
				$_SESSION['name'] = $_POST['name'];
				echo "Username or password already exists";
				echo "<br><br>";
				echo "<button onclick=\"window.location.href='http://localhost/boekenlijst';\">Go back</button>";
			} else {
				/*
				De user id zal eigenlijk in de database moeten gebeuren.
				nu heb je kans dat twee gebruikers dezelfde id krijgen.
				Het wordt nu gebruikt omdat project niet zo groot is en het nodig is om de usr id in session te krijgen.
				dit is nodig om de gebruiker na het registreren te kunne laten inloggen en boeken te kunnen toevoegen.
				zonder dit is er geen usr id en geen methode om boeken aan een usr te verbinden.
				 */
				$usrID = uniqid();
				$stmt = $con->prepare("INSERT INTO `users`(`naam`, `password`, `id`) VALUES ('$name', '$password', '$usrID')");
				$stmt->execute();
				
				$_SESSION['id'] = $usrID;
				$_SESSION["loggedIn"] = true;
				$_SESSION["name"] = $_POST['name'];

				header("Refresh:0; url=http://localhost/boekenlijst/assets/php/screen/mainScreen.php");
			}
		} catch (PDOException $e) {
			echo "Something went wrong: " . $e->getMessage();
		}
	}
}

if (strlen($name) && strlen($password)) {
	if (strcmp($password, $password2) !== 0) {
		echo "Use the same password";
		echo "<br><br>";
		var_dump($name);
		echo "<button onclick=\"window.location.href='http://localhost/boekenlijst/assets/php/screen/registerScreen.php';\">Go back</button>";
	} else {
		$password = password_hash($password, PASSWORD_DEFAULT);

		$reg = new register();
		$reg->register($con, $name, $password);
	}
} else {
	echo "<p style='text-align: center'>Niet alles is ingevuld</p>";
	echo "<br><br>";
	echo "<div style='text-align: center;'>";
	echo "<button style='position: absolute;' onclick=\"window.location.href='http://localhost/boekenlijst';\">Terug</button>";
	echo "</div>";
}