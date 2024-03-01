<?php

require_once 'config.php';
set_time_limit(0);
$countries = json_decode(file_get_contents('result/all'));
$done = 0;
foreach ($countries as $href=>$name){
    $country = file_get_contents('result/countries/'.$name);
    $p = Parser::app($country);
    $p->moveTo('table class="infobox');
    $p->moveTo('<th scope="row" class="infobox-label">Capital');
    $p->moveTo('<a');
    $p->moveAfter('>');
    $st = $p->readTo('<');
    echo $st.'<br>';
    $done++;
}
echo '<hr>'.$done;
