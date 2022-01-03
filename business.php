<?php

require "vendor/autoload.php";
require_once "business_picture_gallery.php";

use MongoDB\BSON\ObjectID;

function get_db()
{
  $mongo = new MongoDB\Client(
    "mongodb://localhost:27017/wai",
    [
        'username' => 'wai_web',
        'password' => 'w@i_w3b',
    ]);
  
  $db = $mongo->wai;
  
  return $db;
}

function save_file_to_db($picture)
{
    $db = get_db();
    $db->pictures->insertOne($picture);
}

function verify_user($credentials) {
    extract($credentials);

    $db = get_db();
    $user = $db->users->findOne(['login' => $login]);

    if($user !== null && password_verify($password, $user['password'])) {
        return true;
    }

    return false;
}

function add_user($credentials) {
    extract($credentials);

    $db = get_db();

    $hash = password_hash($password, PASSWORD_DEFAULT);

    $user = [
        'login'     => $login,
        'password'  => $hash,
        'email'     => $email
    ];

    $db->users->insertOne($user);
}

function username_taken($login) {
    $db = get_db();

    $user = $db->users->findOne(['login' => $login]);

    if($user !== null) { // user exists
        return true;
    }
    return false;
}

function get_user_id($login)
{
    $db = get_db();
    $user = $db->users->findOne(['login' => $login]);

    if($user !== null) {
        return $user['_id'];
    }
    return -1;
}

function get_user_login($user_id)
{
    $db = get_db();
    $user = $db->users->findOne(['_id' => $user_id]);

    if($user !== null) {
        return $user['login'];
    }
    return null;
}
