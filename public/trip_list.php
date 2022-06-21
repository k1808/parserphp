<?php
include_once 'classes/Curl.php';
include_once 'libs/simple_html_dom.php';
include_once 'functions.php';

$c = Curl::app('https://www.tripadvisor.ru/')
    ->config_load('wiki.conf');
$first_title = 'Hotels-g298484-Moscow_Central_Russia-Hotels.html';
$first_part_second_title = 'Hotels-g298484-oa';
$second_part_second_title = '-Moscow_Central_Russia-Hotels.html';
$data = $c->request($first_title);
//debug($data['html']);
$dom = str_get_html($data['html']);

$flags = $dom->find('.listing_title');
echo count($flags);
$done = 0;
$hotels = [];
//foreach ($flags as $link){
//
//    $done++;
//    $hotels[$link->href] = $link->plaintext;
//}
//debug($hotels);
//file_put_contents('rezult/all', json_encode($countries));