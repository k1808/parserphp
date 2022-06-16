<?php
include_once 'classes/Curl.php';
include_once 'functions.php';

$c = Curl::app('https://ru.wikipedia.org/wiki/')
    ->set(CURLOPT_HEADER, 1);
$data = $c->request('wiki/Кропивницкий');
debug($data);