<?php
include_once 'classes/Curl.php';
include_once 'libs/simple_html_dom.php';
include_once 'functions.php';

$c = Curl::app('https://en.wikipedia.org/')
    ->config_load('wiki.conf');
$data = $c->request('wiki/List_of_sovereign_states');
//debug($data);
$dom = str_get_html($data['html']);
$flags = $dom->find('.flagicon');
$done = 0;
$countries = [];
foreach ($flags as $span){
    $b = $span->parent();
    if($b->tag != 'b') continue;
    $a = $b->find('a', 0);
    $done++;
    $countries[$a->href] = $a->plaintext;
}
debug($countries);
file_put_contents('rezult/all', json_encode($countries));