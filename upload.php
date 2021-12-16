<?php
	define("MAX_SIZE", 1048576);
	
	$upload_dir = 'images/';

	if(isset($_FILES['picture'])) {

		$file = $_FILES['picture'];
		$file_name = $file['name'];
		
		$file_tmp = $file['tmp_name'];
		$file_size = $file['size'];
		
		$ext = pathinfo($file['name'], PATHINFO_EXTENSION);
		$allowed_types = ['jpg', 'png'];

		$target = $upload_dir . $file_name;

		if(in_array($ext, $allowed_types) === false) {
			echo "Niedozwolony typ pliku. Akceptowane typy to: jpg, png";
			exit();
		} 

		if($file_size > MAX_SIZE) {
			echo "Za duży rozmiar pliku. Maksymalny rozmiat pliku to 1MB";
			exit();
		}

		if(move_uploaded_file($file_tmp, $target)){
			header("Location: pictures.php");
			echo "Przesłanie pliku przebiegło pomyślnie!";
			exit();
		}
		else {
			echo "Błąd przesyłania pliku. Spróbuj ponownie!";
			exit();
		}
	}
	else {
		echo "Błąd przesyłania pliku. Spróbuj ponownie";
		header("Location: upload_view.php");
		exit();
	}
	
	
include 'views/upload_view.php';

