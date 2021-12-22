<?php
require_once 'business.php';

function index()
{
  include 'views/index_view.php';
}

function quiz()
{
  include 'views/quiz_view.php';
}

function pictures()
{
  $dir = '/var/www/dev/src/web/images/';
  $pictures = array_diff(scandir($dir), array('..', '.'));

  // $pictures = get picuteres XD

  include 'views/pictures_view.php';
}