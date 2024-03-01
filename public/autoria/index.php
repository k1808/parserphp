<div><a href="/">Home</a></div>
<div><a href="index1.php">Next</a></div>
<?php
require_once 'config.php';

$c = Curl::app('https://auto.ria.com')
    ->set(CURLOPT_HEADER, 1)
    ->agent('Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36')
    ->referer('google.com')
    ->follow()
    ->ssl(0);
$c->config_save('wiki.conf');
$data = $c->request('search/?indexName=auto&categories.main.id=1&country.import.usa.not=-1&price.currency=1&top=10&abroad.not=0&custom.not=1&page=1&size=100000');
debug($data);