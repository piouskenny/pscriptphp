<?php

require __DIR__ . '/vendor/autoload.php';

use App\Controller\SampleController;
use Classes\Router;

$router = new Router();

$router->get('/', [new SampleController(), 'index']);
$router->resolve();
