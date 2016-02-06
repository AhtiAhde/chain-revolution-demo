<?php
namespace ChainRevolution\Demo;

require 'vendor/autoload.php';

use ChainRevolution\Demo\GlomeClient;

$configs = json_decode(file_get_contents('config/config.json'), true);
$glomeClient = new GlomeClient($configs, true);
try {
    $firstGlomeId = $glomeClient->createUser()['glomeid'];
    $secondGlomeId = $glomeClient->createUser()['glomeid'];
    $glomeClient->pairGlomeIds($firstGlomeId, $secondGlomeId);
    var_dump($glomeClient->getUserProfile($firstGlomeId));
    var_dump($glomeClient->getUserProfile($secondGlomeId));
}
catch (\Exception $ex) {
    $ex->getMessage();
}
