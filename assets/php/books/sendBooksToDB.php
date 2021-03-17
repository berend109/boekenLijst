<?php

if (isset($_POST['submit'])) {
	if(!isset($_SESSION)) {
		session_start();
	}

	require_once('../db/conn.php');

	$pdo = new connection;
	$con = $pdo->connect();

	$bookTitle = $_POST['title'];
	$bookAuthor = $_POST['author'];
	$userid = $_SESSION['id'];
	$shortNote = $_POST['shortNote'];
	$owner = $_POST['ownership'];
	$read = $_POST['read'];
	// store image local
	require_once('storeBookImage.php');

	class sendBook
	{
		public function __construct() {}

		public function sendBook($con, $bookTitle, $imageDestination, $bookAuthor, $userid, $shortNote, $owner, $read)
		{
			try {
				$stmt = $con->prepare("SELECT * FROM `books` WHERE `name` = ?");
				$stmt->execute([$bookTitle]);
				$book = $stmt->fetch();

				// TODO: make a check so you don't
				if ($book) {
					echo "Boek is al toegevoegd.";
					echo "<br><br>";
					echo "<button onclick=\"window.location.href='http://localhost/boekenlijst/assets/php/screen/mainScreen.php';\">Go back</button>";
				} else {
					// INSERT QUERY
					$stmt = $con->prepare("INSERT INTO `books`(`name`, `author`, `shortNote`, `imageLocation`, `reading`, `ownership`, `usrId`, `dataAdded`) VALUES ('$bookTitle','$bookAuthor','$shortNote','$imageDestination','$read','$owner','$userid', NOW())");
					$stmt->execute();

					header("Refresh:0; url=http://localhost/boekenlijst/assets/php/screen/mainScreen.php");
				}
			} catch (PDOException $e) {
				echo "Something went wrong: " . $e->getMessage();
			}
		}
	}

	// TODO: Check if every required field is filled in.
	$reg = new sendBook();
	$reg->sendBook($con, $bookTitle, $imageDestination, $bookAuthor, $userid, $shortNote, $owner, $read);

}
