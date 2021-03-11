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

				echo "register successful";
				echo "<br><br>";
				echo "<button onclick=\"window.location.href='http://localhost/boekenLijst';\">Go back</button>";
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
		echo "<button onclick=\"window.location.href='http://localhost/boekenLijst';\">Go back</button>";
	} else {
		$reg = new register();
		$reg->register($con, $name, $password);
	}
} else {
	echo "Fill out the form";
	echo "<br><br>";
	var_dump($name);
	echo "<button onclick=\"window.location.href='http://localhost/boekenLijst';\">Go back</button>";
}