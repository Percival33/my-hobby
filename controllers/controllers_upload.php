<?php

function check_file($file, &$model)
{
    $file_name = filter_var($file['name'], FILTER_SANITIZE_STRING);
    $file_size = filter_var($file['size'], FILTER_SANITIZE_STRING);

    if(empty($file) || !file_exists($file['tmp_name'])) {
        $model['message'][] = "Brak pliku. Załącz plik!";
        return false;
    }

    $finfo = finfo_open(FILEINFO_MIME_TYPE);
    $file_tmp_name = $file['tmp_name'];
    $mime_type = finfo_file($finfo, $file_tmp_name);

    $ext = pathinfo($file_name, PATHINFO_EXTENSION);
    $allowed_types = ['jpg', 'png'];

    $messages = [];
    if  ($mime_type != 'image/jpeg' && $mime_type != 'image/png') {
        $messages[] = "Niedozwolony rodzaj pliku. Prześlij zdjęcie.";
    }
    if (in_array($ext, $allowed_types) === false) {
        $messages[] = "Niedozwolony typ pliku. Akceptowane typy to: jpg, png";
    }
    if ($file_size > MAX_SIZE) {
        $messages[] = "Za duży rozmiar pliku. Maksymalny rozmiat pliku to 1MB";
    }

    if(sizeof($messages) === 0) {
        return true;
    }
    $model['message'] = $messages;
    return false; // errors occured
}

function add_watermark($file_dst, $text, $file, $upload_dir) {
    $font = 'static/comicsans.ttf';

    if(mime_content_type($file_dst) === 'image/jpeg') {
        $jpg_image = imagecreatefromjpeg($file_dst);
        $color = imagecolorallocate($jpg_image, 255, 0, 0);
        imagettftext($jpg_image, 30, 0, 10, MIN_HEIGHT, $color, $font, $text);
        imagejpeg($jpg_image, $upload_dir . "w_" . $file['name']);
    }

    elseif(mime_content_type($file_dst) === 'image/png') {
        $png_image = imagecreatefrompng($file_dst);
        imagesavealpha($png_image, true);
        $color = imagecolorallocate($png_image, 255, 0, 0);
        imagettftext($png_image, 30, 0, 10, MIN_HEIGHT, $color, $font, $text);
        imagepng($png_image, $upload_dir . "w_" . $file['name']);
    }

}

function create_thumbnail($file_dst, $upload_dir, $filename) {

    if(mime_content_type($file_dst) === 'image/jpeg') {
        $old_image = imagecreatefromjpeg($file_dst);
        $new_image = imagescale($old_image, MIN_WIDTH, MIN_HEIGHT);
        imagejpeg($new_image,$upload_dir . "thumb/th_" . $filename);
    }

    elseif(mime_content_type($file_dst) === 'image/png') {
        $old_image = imagecreatefrompng($file_dst);
        $new_image = imagescale($old_image, MIN_WIDTH, MIN_HEIGHT);
        imagesavealpha($new_image, true);
        imagepng($new_image, $upload_dir . "thumb/th_" . $filename);
    }

}

function save_file($picture, $file, $upload_dir) {
    extract($picture);

    $filename = $file['name'];
    $target = $upload_dir . "original/" . $filename;

    if(move_uploaded_file($file['tmp_name'], $target)) {
        add_watermark($target, $watermark, $file, $upload_dir);
        create_thumbnail($target, $upload_dir, $filename);

        save_file_to_db($picture);
        $_SESSION['message'][] = "Przesłanie pliku przebiegło pomyślnie!";
    }
    else {
        $_SESSION['message'][] = "Błąd przesyłania pliku. Spróbuj ponownie.";
    }
}

function random_name(&$file) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randstring = "";
    for ($i = 0; $i < 15; $i++) {
        $randstring .= $characters[rand(0, strlen($characters))];
    }

    $finfo = finfo_open(FILEINFO_MIME_TYPE);
    $file_tmp_name = $file['tmp_name'];
    $mime_type = finfo_file($finfo, $file_tmp_name);

    if($mime_type == 'image/jpeg') {
        $file['name'] = $randstring . '.jpg';
    }
    elseif($mime_type == 'image/png') {
        $file['name'] = $randstring . '.png';
    }

}

function upload(&$model)
{
    $upload_dir = $_SERVER['DOCUMENT_ROOT'] . '/images/';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        if (isset($_FILES['picture'])) {

            $file = $_FILES['picture'];
            $upload_status = check_file($_FILES['picture'], $model);

            random_name($file);

            if ($upload_status === true) {
                $picture = [
                    'filename'  => $file['name'],
                    'title'     => filter_var($_POST['title'], FILTER_SANITIZE_STRING),
                    'author'    => filter_var($_POST['author'], FILTER_SANITIZE_STRING),
                    'alt'       => filter_var($_POST['alt'], FILTER_SANITIZE_STRING),
                    'watermark' => filter_var($_POST['watermark'], FILTER_SANITIZE_STRING),
                    'user'      => (isset($_SESSION['user']) ? $_SESSION['user'] : null),
                    'private'   => ((isset($_POST['private']) &&$_POST['private'] == "true") ? true : false)
                ];

                save_file($picture, $file, $upload_dir);

                return REDIRECT_STRING . 'pictures';
            }
        }
//        $model['message'][] = "Brak pliku. Załącz plik!";
        return 'upload_view';
    }
    elseif ($_SERVER['REQUEST_METHOD'] === 'GET') {
        return 'upload_view';
    }
}