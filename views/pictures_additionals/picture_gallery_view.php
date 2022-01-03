<?php
    foreach ($pictures as $img) {
        $is_checked = '';
        if(!empty($_SESSION['featured'])) {
            $is_checked = (in_array($img['_id'], $_SESSION['featured']) ? 'checked' : '');
        }

        $div_beg =  '<div class="gallery-item">' .
                    '<input type="checkbox" name="featured[]" value="' . $img['_id'] . '"'  . $is_checked . '/>';

        $div_end = '</div>';
        $img_html = '<img src="' . '../images/thumb/th_' . $img['filename'] . '" alt="' . $img['alt'] . '"/><br />';
        $link_beg = '<a href="/images/w_' . $img['filename'] . '">';
        $link_end = '</a>';

        $author = $img['author'];

        $edit_link = '';
        $is_private = '';

        if (isset($_SESSION['user']) && $img['user'] == $_SESSION['user']) {
            $author = get_user_login($_SESSION['user']);
            $edit_link = '<a class="edit-link" href="/edit?id=' . $img['_id'] . '">' . 'edytuj' . '</a>';
            if($img['private'] == true) {
                $is_private = '<p class="warning">To zdjęcie jest prywatne</p>';
            }
        }
        $author = '<p class="author"> Autor: ' . $author . '</p>';

        $title = '<p class="title"> Tytuł: ' . $img['title'] . '</p>';

        if (!file_exists($_SERVER['DOCUMENT_ROOT'] . '/images/thumb/th_' . $img['filename'])) {
            $link_beg = '';
            $link_end = '';
        }



        $gallery_item = $div_beg .
            $title .
            $link_beg .
            $img_html .
            $link_end .
            $author .
            $is_private .
            $edit_link .
            $div_end;

        echo $gallery_item;
    }
?>