<?php
require_once '../business.php';
require_once 'controllers_auth.php';
require_once 'controllers_upload.php';

const MAX_SIZE = 1048576;
const MIN_HEIGHT = 125;
const MIN_WIDTH = 200;

function index()
{
    return 'index_view';
}

function quiz()
{
    return 'quiz_view';
}

function pictures(&$model)
{
    $model['page_number'] = 1;
    $model['max_page'] = get_number_of_pages();

    if(isset($_GET['page'])) {
        if($_GET['page'] < 1 || $_GET['page'] > $model['max_page']) {
            $_SESSION['message'][] = 'Wybrano nie poprawną stronę. Spróbuj ponownie.';
            return REDIRECT_STRING . 'pictures';
        }
        $model['page_number'] = $_GET['page'];
    }

    if($_SERVER['REQUEST_METHOD'] ==  'POST') {
        $_SESSION['featured'] = array_merge($_POST['featured'],
            isset($_SESSION['featured']) ? $_SESSION['featured'] : array());
    }

    $model['pictures'] = get_pictures($model['page_number'], $_SESSION['user']);

    return 'pictures_view';
}

function profile(&$model)
{
   if($_SERVER['REQUEST_METHOD'] === "GET") {
       if(!empty($_SESSION['user'])) {
           $model['pictures'] = get_user_pictures($_SESSION['user']);
           return 'profile_view';
       }
       else {
           $model['message'][] = 'Zaloguj się aby edytować dodane zdjęcia.';
           return 'pictures';
       }
    }
    return REDIRECT_STRING . 'pictures';
}

function edit(&$model) {
    if($_SERVER['REQUEST_METHOD'] === "POST") {
        $picture = [
            'title'     => filter_var($_POST['title'], FILTER_SANITIZE_STRING),
            'author'    => filter_var($_POST['author'], FILTER_SANITIZE_STRING),
            'alt'       => filter_var($_POST['alt'], FILTER_SANITIZE_STRING),
            'private'   => ($_POST['private'] == "true" ? true : false),
            'id'       => $_POST['id']
        ];

        update_picture($picture);
        $_SESSION['message'][] = 'Edytowano pomyślnie.';
        return REDIRECT_STRING . 'pictures';
    }
    elseif($_SERVER['REQUEST_METHOD'] === "GET") {
        if(!empty($_SESSION['user'])) {
            $model['img'] = get_one_picture($_GET['id']);
            return 'edit_view';
        }
        $_SESSION['message'][] = 'Zaloguj się aby edytować dodane zdjęcia.';
        return REDIRECT_STRING. 'pictures';
    }
}

function saved()
{
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        foreach($_POST['toremove'] as $img) {
            $_SESSION['featured'] = array_diff($_SESSION['featured'], [$img]);
        }
    }
    return 'saved_view';
}

function show_pictures($model) {
    return "search_additionals/search_list_view";
}

function search(&$model)
{
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $title = '';
        $pictures = [];

        if(isset($_POST['title'])) {
            $title = $_POST['title'];
        }

        if(strlen($title) > 0) {
            $pic_with_matching_title = search_pictures($title, $_SESSION['user']);
            foreach($pic_with_matching_title as $img) {
                $pictures[] = $img;
            }
        }

        if(!empty($pictures)) {
            $model['pictures'] = $pictures;
        }
        else {
            $model['message'][] = 'Nie ma zdjęć o takim tytule.';
        }
        return show_pictures($model);
    }
    else {
        return 'search_view';
    }
}