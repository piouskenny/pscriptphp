<?php

namespace Classes;
class Router
{
    public array $getRoutes = [];
    public array $postRoutes = [];

    public function get($url, $fn)
    {
        $this->getRoutes[$url] = $fn;
    }

    public function post($url, $fn)
    {
        $this->postRoutes[$url] = $fn;
    }

    public function resolve()
    {
        $currentUrl = $_SERVER['PATH_INFO'] ?? '/';

        $method = $_SERVER['REQUEST_METHOD'];

        if ($method === 'GET') {
            $fn = $this->getRoutes[$currentUrl] ?? null;
        } else {
            $fn = $this->postRoutes[$currentUrl] ?? null;
        }

        if ($fn) {
            call_user_func($fn, $this);
        } else {
            echo "404 ERROR PAGE NOT FOUND";
        }
    }


    public function renderView($view)
    {
        ob_start();

        include_once __DIR__ . "/../View/$view.php";

        $content = ob_get_clean();

        include_once __DIR__ . "/../View/_layout.php";
    }
}
