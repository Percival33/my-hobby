<?php
require_once '../controllers.php';

// obsługa  sesji?
// require access.php ?

require_once '../routing.php';

$action_url = $_GET['action'];
$controller_name = $routing[$action_url];
$controller_name();

// if(in_array($action_url, $routing)) {
//   echo "Jest";
//   exit();
// }
// else {
//   $controller_name = $routing['/error'];
//   $controller_name();
//   exit();
// }