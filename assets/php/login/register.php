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
				echo "<button onclick=\"window.location.href='http://localhost/boekenLijst';\">Go back</button>";
			} else {
				$stmt = $con->prepare("INSERT INTO `users`(`naam`, `password`) VALUES ('$name', '$password')");
				$stmt->execute();

				$_SESSION["loggedIn"] = true;
				$_SESSION["name"] = $_POST['name'];

				header("Refresh:0; url=http://localhost/boekenLijst/assets/screen/mainScreen.php");
			}
		} catch (PDOException $e) {
			echo "Something went wrong: " . $e->getMessage();
		}
	}
}

if (strlen($name) >= 1 && strlen($password) >= 1) {
	if (strcmp($password, $password2) !== 0) {
		echo "Use the same password";
		echo "<br><br>";
		var_dump($name);
		echo "<button onclick=\"window.location.href='http://localhost/boekenLijst/assets/screen/registerScreen.php';\">Go back</button>";
	} else {
		$password = password_hash($password, PASSWORD_DEFAULT);

		$reg = new register();
		$reg->register($con, $name, $password);
	}
} else {
	echo "<p style='text-align: center'>Niet alles is ingevuld</p>";
	echo "<br><br>";
	echo "<div style='text-align: center;'>";
	echo "<button style='position: absolute;' onclick=\"window.location.href='http://localhost/boekenLijst';\">Terug</button>";
	echo "</div>";
}