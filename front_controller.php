<?php
require_once 'controllers.php';

// obsługa  sesji?
// require access.php ?

require_once 'routing.php';

$action_url = $_GET['action'];

$controller_name = $routing[$action_url];
$controller_name();