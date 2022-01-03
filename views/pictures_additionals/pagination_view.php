<?php
    $next_page = $page_number + 1;
    $prev_page = $page_number - 1;

    if($prev_page >= 1) {
        echo '<a class="pagination" href="/pictures?page=' . $prev_page . '">Poprzednia strona</a>';
    }

    echo '<p class="pagination"> ' . $page_number . '</p>';

    if($next_page <= $max_page) {
        echo '<a class="pagination" href="/pictures?page=' . $next_page . '">Następna strona</a>';
    }