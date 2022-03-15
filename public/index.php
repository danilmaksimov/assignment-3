<?php

use App\App;
use Dotenv\Dotenv;

require __DIR__ . '/../vendor/autoload.php';

$dotEnv = Dotenv::createImmutable(__DIR__ . '/..');
$dotEnv->load();
App::run();