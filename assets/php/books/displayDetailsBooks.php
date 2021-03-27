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
		$bookRating = $book['rating'];
		$bookReview = $book['review'];

		echo '
		<div class="container">
			<div class="row">
				<div class="col-8 pt-5">
					'; if($bookTitle) {
						echo '<p class="display-1">'. $bookTitle .'</p>';
					}
					echo '
					
					'; if($bookAuthor) {
						echo '<p class="display-6">'. $bookAuthor .'</p>';
					}
					echo '
				</div>
				<div class="col-4 pt-5">
					
					'; if($bookShortNote) {
						echo '<p class="card-text class="lead"">'. $bookShortNote . '</p>';
					}
					echo '
				</div>
			</div>
			<div class="row">
				<div class="col-6">
					'; if($bookImageLocation) {
						echo '<img id="bookImage" src="'. $bookImageLocation .'" alt="Book cover">';
					}
					echo '
				</div>
				<div class="col-4">
					<div class="row">
						<div class="col">
							'; if($bookOwnership) {
								echo '<p>Bezit: '. $bookOwnership .'</p>';
							}
							echo '
						</div>
						<div class="col">
							'; if($bookReading) {
								echo '<p>Gelezen: '. $bookReading .'</p>';
							}
							echo '
						</div>
					</div>
					<div class="row">
						<div class="col">
							'; if($bookRating) {
								echo '<p>Score: '. $bookRating .'</p>';
							}
							echo '
						</div>
					</div>
					<div class="row">
						<div class="col">
							'; if($bookReview) {
								echo '<div id="bookReview">Review:<br> '. $bookReview .'</div>';
							}
							echo '
						</div>
					</div>
					<div class="row">
						<div class="col">
							<a href="./changeDetailScreen.php?bookID=' . $bookID . '" type="button" class="btn btn-success">Aanpassen</a>
						</div>
						<div class="col">
							<a href="../books/removebookDB.php?bookID=' . $bookID . '" type="button" class="btn btn-danger">Verwijderen</a>
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
