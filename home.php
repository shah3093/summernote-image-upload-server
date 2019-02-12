<?php

if(isset($_FILES['image']['name'])) {
	if(!$_FILES['image']['error']) {
		$name = md5(rand(100, 200));
		$ext = explode('.', $_FILES['image']['name']);
		$imagename = $name.'.'.$ext[1];
		$destination = 'upload/'.$imagename; //change this directory
		$location = $_FILES["image"]["tmp_name"];
		move_uploaded_file($location, $destination);
		echo 'http://localhost/oop/upload/'.$imagename;//change this URL
	} else {
		echo $message = 'Ooops!  Your upload triggered the following error:  '.$_FILES['image']['error'];
	}
}

if(isset($_POST['imgSrc'])) {
	$file = str_replace("http://localhost/oop/","",$_POST['imgSrc']);
	if(!unlink($file)) {
		echo("Error deleting ");
	} else {
		echo("Deleted ");
	}
}