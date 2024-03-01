<div><a href="/">Home</a></div>
<div><a href="index2.php">Next</a></div>

<?php
require_once 'config.php';
require_once '../../vendor/autoload.php';
use DiDom\Document;
$c = Curl::app('https://en.wikipedia.org/')
    ->config_load('wiki.conf');
$data = $c->request('wiki/List_of_sovereign_states');
$dom = new Document($data['html']);
$flags = $dom->find('.flagicon');
$done = 0;
$countries = [];
foreach ($flags as $span){

    $b = $span->parent();
    if($b->tagName() != 'b') continue;
    $a = $b->first('a');
    $done++;
    $countries[$a->attr('href')] = $a->text();
}
echo $done.'<hr>';
file_put_contents('result/all', json_encode($countries));