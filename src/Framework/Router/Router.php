<?php

/**
 * Created by PhpStorm.
 * User: alexc
 * Date: 21/08/2018
 * Time: 22:22
 */

namespace App\Router;


use App\Controller\Controller;

class Router
{
    private $routes;

    public function addRoute(string $uri, string $method, string $callable)
    {
        $this->routes[] = new Route($uri, $method, $callable);
    }

    public function handle()
    {
        foreach ($this->routes as $route) {
            if ($_SERVER["REQUEST_URI"] === $route->getUri() && $_SERVER["REQUEST_METHOD"] === $route->getMethod()) {
                $class = "\\App\\Controller\\".ucfirst($route->getCallable()[0])."Controller";
                $method = $route->getCallable()[1]."Action";
                $instance_controller = new $class();
                return call_user_func_array([$instance_controller, $method], []);
            }
        }
        // throw new Exception("No matched routes");
        $controller = new Controller();
        return call_user_func_array([$controller, "notFound"], []);
    }
}
