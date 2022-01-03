<?php

function login(&$model)
{
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $credentials = [
            'login'     => $_POST['login'],
            'password'  => $_POST['password']
        ];

        if(verify_user($credentials) == true) {

            $_SESSION['message'][] = "Witaj ponownie!";
            $_SESSION['user'] = get_user_id($_POST['login']);
            session_regenerate_id();

            return REDIRECT_STRING . 'pictures';
        }
        else {
            $model['message'][] = "Błędny login lub hasło. Spróbuj ponownie.";
            return 'login_view';
        }
    }
    else {
        return 'login_view';
    }
}

function register(&$model)
{
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $credentials = [
            'login'     => $_POST['login'],
            'password'  => $_POST['password'],
            'email'      => $_POST['email']
        ];

        if(username_taken($_POST['login']) === true) { // login is already taken
            $model['message'][] = "Podany login jest już zajęty.";
            return 'register_view';
        }
        if($_POST['password'] != $_POST['repeat_password']) { // passwords differs
            $model['message'][] = "Podane hasła różnią się";
            return 'register_view';
        }

        add_user($credentials);

        $_SESSION['message'][] = "Utworzono użytkownika pomyślnie.";
        $_SESSION['user'] = get_user_id($_POST['login']);

        return REDIRECT_STRING . 'pictures';
    }
    elseif($_SERVER['REQUEST_METHOD'] == 'GET') {
        return 'register_view';
    }
}

function logout()
{
    $params = session_get_cookie_params();
    setcookie(session_name(), '', -1, $params['path'], $params['domain'], $params['secure'], $params['httponly']);

    session_destroy();
    session_unset();
    $_SESSION['message'][] = "Wylogowano pomyślnie.";

    return REDIRECT_STRING . 'pictures';
}
