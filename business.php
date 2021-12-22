<?php

require "../vendor/autoload.php";

function get_db() {
  $mongo = new MongoDB\Client(
    "mongodb://localhost:27017/wai",
    [
      'username' => 'wai_web',
      'password' => 'w@i_w3b',
    ]);
  
  $db = $mongo->wai;
  
  return $db;
}

function add_pic_to_db($filename, $author, $name, $description, $alt) {

  $db = get_db();

  $picture = [
    'file_name' => $filename,
    'title' => $name,
    'description' => $description,
    'alt' => $alt
  ];

  $db->findOne($author)->pictures->insertOne($picture);

}