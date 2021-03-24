<?php

$imageDestination = "";

function storeBookImage($imageDestination) {
	$imageName = $_FILES['picture']['name'];
	$imageTMPName = $_FILES['picture']['tmp_name'];
	$imageSize = $_FILES['picture']['size'];
	$imageError = $_FILES['picture']['error'];
	
	$imageExt = explode('.', $imageName);
	$imageActualExt = strtolower(end($imageExt));
	$imageNameNew = uniqid('', true).".".$imageActualExt;
	$imageDestination = "../../bookImages/".$imageNameNew;
	
	// what images are allowed and what max size is allowed
	$allowed = array('jpg', 'jpeg', 'png');
	if (in_array($imageActualExt, $allowed)) {
		if ($imageError === 0) {
			if($imageSize < 1000000) {
				move_uploaded_file($imageTMPName, $imageDestination);
				return $imageDestination;
			} else {
				echo "Joun foto is te groot (max 1000000 KB)";
				return 0;
			}
		} else {
			echo "Er was een error met het uploaden van je foto.";
			return 0;
		}
	} else {
		echo "Je hebt verkeerde foto type geupload";
		return 0;
	}

}
