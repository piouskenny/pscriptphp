<?php

namespace App\Controller;

require __DIR__ . "/../../vendor/autoload.php";

use Classes\Router;
use Database\connection;
use Classes\Validate;

class SampleController
{
    private $connection;

    public function index(Router $router)
    {
        $router->renderView('Home');
    }
}