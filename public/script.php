<?php

require_once 'libs/functions.php';
$str = file_get_contents('index.php');
//$str = '2+3 223 2223';
preg_match('#<main[^>]*>(.+?)</main>#su', $str, $matches);
debug($matches[1]);