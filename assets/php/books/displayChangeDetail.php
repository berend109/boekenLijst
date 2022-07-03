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
			<form action="../books/updateBookDB.php" method="POST" enctype="multipart/form-data">
				<div class="row">
					<div class="col-8 pt-5">
						<input type="text" class="form-control text-center" maxlength="75" name="title">
						<p class="display-1">'. $bookTitle .'</p>
						<input type="text" class="form-control text-center" maxlength="75" name="author">
						<p class="display-6">'. $bookAuthor .'</p>
					</div>
					<div class="col-4 pt-5">
						<textarea style="resize: none;" class="form-control text-center" name="shortNote" maxlength="100" placeholder="Max 100 karakters"></textarea>
						<p>Notitie:</p>
						<p class="card-text">'. $bookShortNote . '</p>
					</div>
				</div>
				<div class="row">
					<div class="col-6">
						<input type="file" class="form-control" name="picture">
						<img id="bookImage" src="'. $bookImageLocation .'" alt="Book cover">
					</div>
					<div class="col-sm">
						<div class="row">
							<div class="col">
								<p>Bezit: '. $bookOwnership .'</p>
								<select class="form-select" name="ownership">
									<option disabled selected value>Selecteer</option>
									<option value="nee">nee</option>
									<option value="ja">ja</option>
								</select>
							</div>
							<div class="col">
								<p>Gelezen: '. $bookReading .'</p>
								<select class="form-select" name="read">
									<option disabled selected value>Selecteer</option>
									<option value="nee">nee</option>
									<option value="bezig">bezig</option>
									<option value="ja">ja</option>
								</select>
							</div>
						</div>
						<div class="row">
							<div class="col">
								'; if($bookRating) {
									echo '<p>Score: '. $bookRating .'</p>';
								}
								echo '
								<input type="number" id="ratingBook"  style="-webkit-appearance: none;" name="rating" min="0" max="10" placeholder="Cijfer beoordeling boek (0-10)">
							</div>
						</div>
						<div class="row">
							<div class="col">
								'; if($bookReview) {
									echo '<p>Review: </p>';
									echo '<p class="card-text">'. $bookReview .'</p>';
								}
								echo '
								<textarea type="text" id="textReviewBook" name="review" placeholder="Schrijf hier een review over de boek"></textarea>
							</div>
						</div>
						<div class="row">
							<div class="col">
								<button id="submitBTN" type="submit" class="btn btn-success" name="submit">Bevestigen</button>
							</div>
							<div class="col">
								<a href="./detailScreen.php?bookID=' . $bookID . '" type="button" class="btn btn-info"> Details</a>
							</div>
							<div class="col">
								<a href="../books/removebookDB.php?bookID=' . $bookID . '" onclick="return  confirm(\'Wilt u de boek verwijderen\')" type="button" class="btn btn-danger">Verwijderen</a>
							</div>
						</div>
					</div>
				</div>
			</form>
		</div>
		';
	}
}

$bookFromDB = getBookItem($con, $bookItem);
checkBook($bookFromDB);
