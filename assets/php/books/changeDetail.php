<?php

require_once 'getBooksFromDB.php';

function checkBook($books)
{
	foreach ($books as $book) {
		displayBook($book);
	}
}

function displayBook($book)
{
	if (!$book) {
		echo 'geen boek';
	} else {

		$bookTitle = $book['name'];
		$bookAuthor = $book['author'];
		$bookOwnership = $book['ownership'];
		$bookReading = $book['reading'];
		$bookShortNote = $book['shortNote'];
		$bookImageLocation = $book['imageLocation'];
		$bookID = $book['bookID'];

		echo '
		<div class="container">
			<div class="row">
				<div class="col-8 p-5">
					<p class="display-1">'. $bookTitle .'</p>
					<p class="display-6">'. $bookAuthor .'</p>
				</div>
				<div class="col-4 p-5">
					<p class="card-text class="lead"">'. $bookShortNote . '</p>
				</div>
			</div>
			<div class="row">
				<div class="col-6">
					<img id="bookImage" src="'. $bookImageLocation .'" alt="Book cover">
				</div>
				<div class="col-4">
					<div class="row">
						<div class="col">
							<p>in bezit: '. $bookOwnership .'</p>
						</div>
						<div class="col">
							<p>gelezen: '. $bookReading .'</p>
						</div>
					</div>
					<div class="row">
						<div class="col">
							<p>score: 1/10</p>
						</div>
					</div>
					<div class="row">
						<div class="col">
							<p>geschreven review hier</p>
						</div>
					</div>
					<div class="row">
						<div class="col">
							<a href="./detailScreen.php?bookID=' . $bookID . '" type="button" class="btn btn-success">Bevestigen</a>
						</div>
						<div class="col">
							<a href="../books/removebook.php?bookID=' . $bookID . '" type="button" class="btn btn-danger">Verwijderen</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		';
	}
}

$bookFromDB = getBookItem($con, $bookItem);
checkBook($bookFromDB);
