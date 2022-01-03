<?php

const REDIRECT_STRING = 'redirect:';
require_once "controllers/controllers.php";

function dispatch($routing, $action_url) {
    $controller_name = $routing[$action_url];
    $model = [];
    $view_name = $controller_name($model);
    build_response($view_name, $model);
}

function build_response($view, $model)
{
    if(strpos($view, REDIRECT_STRING) === 0) {
        $url = substr($view, strlen(REDIRECT_STRING));
        header("Location: " . $url);
        exit;
    }
    else {
        render($view, $model);
    }
}

function render($view_name, $model) {
    extract($model);
//    print_r($model);
    include 'views/' . $view_name . '.php';
}


