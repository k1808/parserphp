<?php
include_once 'classes/Curl.php';
include_once 'libs/simple_html_dom.php';
include_once 'functions.php';
set_time_limit(0);
$c = Curl::app('https://en.wikipedia.org/')
    ->config_load('wiki.conf');
$countries = json_decode(file_get_contents('rezult/all'));
$done = 0;
foreach ($countries as $href=>$name){
    $data = $c->request($href);
    file_put_contents('rezult/countries/'.$name, $data['html']);

    sleep(mt_rand(0, 1));
    $done++;
}
echo $done;
