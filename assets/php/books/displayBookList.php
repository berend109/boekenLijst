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
	if(!$book) {
		echo 'test';
	} else {

		$bookTitle = $book['name'];
		$bookAuthor = $book['author'];
		$bookOwnership = $book['ownership'];
		$bookReading = $book['reading'];
		$bookShortNote = $book['shortNote'];
		$bookImageLocation = $book['imageLocation'];
		$bookID = $book['bookID'];

		echo '
		<div class="row position-fixed">
			<div class="col-10 ">
				<div class="card mb-3" id="bookCard">
					<div class="row g-0">
						<div class="col-md-4">
							<div class="card-header">
							Foto boek
							</div>
							<img id="bookImage" src="'. $bookImageLocation .'" alt="Book cover">
						</div>
						<div class="col-md-4">
							<div class="card-header">
							Details
							</div>
							<div class="card-body">
								<h5 class="card-title">Titel: '. $bookTitle .'</h5>
								<h5 class="card-title">Auteur: '. $bookAuthor .'</h5>
								<h5 class="card-title">Bezit: '. $bookOwnership .'</h5>
								<h5 class="card-title">Lezen: '. $bookReading .'</h5>
							</div>
						</div>
						<div class="col-md-4">
							<div class="card-header">
							Korte notitie
							</div>
							<div class="card-body">
								<p class="card-text">'. $bookShortNote . '</p>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-2">
				<div class="d-grid gap-2">
					<a href="./changeDetailScreen.php?bookID=' . $bookID . '" type="button" class="btn btn-success">Aanpassen</a>
					<a href="./detailScreen.php?bookID=' . $bookID . '" type="button" class="btn btn-info"> Details</a>
					<a href="../books/removebookDB.php?bookID=' . $bookID . '" onclick="return  confirm(\'Wilt u de boek verwijderen\')" type="button" class="btn btn-danger">Verwijderen</a>
				</div>
			</div>
		</div>
		';

	}
}

$bookFromDB = getBook($con, $books);
checkBook($bookFromDB);
