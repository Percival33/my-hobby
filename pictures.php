<?php
require_once 'business.php';

$dir = '/var/www/dev/src/web/images/';
$pictures = array_diff(scandir($dir), array('..', '.'));

include 'products_view.php';