<div><a href="/">Home</a></div>
<div><a href="index1.php">Next</a></div>
<?php
require_once 'config.php';

$c = Curl::app('https://en.wikipedia.org/')
    ->set(CURLOPT_HEADER, 1)
    ->agent('Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36')
    ->referer('google.com')
    ->ssl(0);
$c->config_save('wiki.conf');
$data = $c->request('wiki/List_of_sovereign_states');
debug($data);