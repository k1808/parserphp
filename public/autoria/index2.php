<?php
require_once 'config.php';
set_time_limit(0);
ini_set('max_execution_time', '100000');

ini_set('memory_limit', '4096M');
ignore_user_abort(true);
//phpinfo();die;
$c = Curl::app('https://en.wikipedia.org/')
    ->config_load('wiki.conf');
$countries = json_decode(file_get_contents('result/all'));
$done = 0;
foreach ($countries as $href=>$name){
    $data = $c->request($href);
    file_put_contents('result/countries/'.$name, $data['html']);

    sleep(mt_rand(0, 1));
    $done++;
    echo '<br>'.$done;
}

