<?php

if (isset($_POST['submit'])) {
	if (!isset($_SESSION)) {
		session_start();
	}

	require_once '../db/conn.php';
	require_once './getBooksFromDB.php';
	
	

	function checkBook($books) 
	{
		foreach ($books as $book) {
			checkIfUpdate($book);
		}
	}

	function checkIfUpdate($book) {

		$pdo = new connection;
		$con = $pdo->connect();

		$bookID = $book['bookID'];

		if($_FILES['picture']['size'] == true) {
			$imageName = $_FILES['picture']['name'];
			
			$imageExt = explode('.', $imageName);
			$imageActualExt = strtolower(end($imageExt));
			$imageNameNew = uniqid('', true).".".$imageActualExt;
			$imageDestination = "../../bookImages/".$imageNameNew;
			if($imageDestination != $book['imageLocation']) {
				require_once('storeBookImage.php');
				$updateImageLocation = storeBookImage($imageDestination);
			}
		} else {
			$updateImageLocation = $book['imageLocation'];
		}

		if($_POST['title'] == false) {
			$updateTitle = $book['name'];
		} else {
			$updateTitle = $_POST['title'];
		}

		if($_POST['author'] == false) {
			$updateAuthor = $book['author'];
		} else {
			$updateAuthor = $_POST['author'];
		}

		if($_POST['shortNote'] == false) {
			$updateShortNote = $book['shortNote'];
		} else {
			$updateShortNote = $_POST['shortNote'];
		}

		if($_POST['ownership'] == false) {
			$updateOwner = $book['ownership'];
		} else {
			$updateOwner = $_POST['ownership'];
		}

		if($_POST['read'] == false) {
			$updateRead = $book['reading'];
		} else {
			$updateRead = $_POST['read'];
		}

		if($_POST['rating'] == false) {
			$updateRating = $book['rating'];
		} else {
			$updateRating = $_POST['rating'];
		}

		if($_POST['review'] == false) {
			$updateReview = $book['review'];
		} else {
			$updateReview = $_POST['review'];
		}

		// print_r($book['bookID']);
		// die();

		class sendBook
		{
			public function __construct() {}

			public function sendBook($con, $updateTitle, $updateImageLocation, $updateAuthor, $updateReview, $updateRating, $updateShortNote, $updateOwner, $updateRead, $bookID)
			{
				try {
					$stmt = $con->prepare("UPDATE `books` SET `name`='$updateTitle',`author`='$updateAuthor',`shortNote`='$updateShortNote',`imageLocation`='$updateImageLocation',`reading`='$updateRead',`ownership`='$updateOwner',`review`='$updateReview',`rating`='$updateRating' WHERE `bookID` = ?");
					$stmt->execute([$_SESSION['bookID']]);
					
					header("Refresh:0; url=http://localhost/boekenlijst/assets/php/screen/changeDetailScreen.php?bookID=$bookID");
				} catch (PDOException $e) {
					echo "Something went wrong: " . $e->getMessage();
				}
			}
		}

		$reg = new sendBook();
		$reg->sendBook($con, $updateTitle, $updateImageLocation, $updateAuthor, $updateReview, $updateRating, $updateShortNote, $updateOwner, $updateRead, $bookID);
	}

	$bookFromDB = getBook($con, $books);
	checkBook($bookFromDB);

}
