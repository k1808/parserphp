<?php

include_once 'classes/parser.php';
include_once 'libs/simple_html_dom.php';
include_once 'functions.php';
set_time_limit(0);
$countries = json_decode(file_get_contents('rezult/all'));
$done = 0;
foreach ($countries as $href=>$name){
    $country = file_get_contents('rezult/countries/'.$name);
    $p = parser::app($country);
    $p->moveTo('table class="infobox');
    $p->moveTo('<th scope="row" class="infobox-label">Capital');
    $p->moveTo('<a');
    $p->moveAfter('>');
    $st = $p->readTo('<');
    echo $st.'<br>';

    $done++;
}
echo '<hr>'.$done;
