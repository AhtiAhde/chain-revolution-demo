<?php
namespace ChainRevolution\Demo;

require 'vendor/autoload.php';

use ChainRevolution\Demo\GlomeClient;

$configs = json_decode(file_get_contents('config/config.json'), true);
$glomeClient = new GlomeClient($configs, true);
