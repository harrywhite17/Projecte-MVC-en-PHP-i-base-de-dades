<?php
namespace Core;

use RuntimeException;

class Route
{
    protected $routes = [];

    public function register($route)
    {
        $this->routes[] = $route;
    }

    public function define($route)
    {
        $this->routes = $route;
        return $this;
    }

    public function redirect($uri)
    {
        $parts = explode('/', trim($uri, '/'));
        $controller = 'App\Controllers\FilmController';

        if ($parts[0] === 'jocs') {
            $controller = 'App\Controllers\JocController';
        }

        $actions = [
            '' => 'index',
            'create' => 'create',
            'store' => 'store',
            'edit' => 'edit',
            'update' => 'update',
            'delete' => 'delete',
            'destroy' => 'destroy'
        ];

        $action = isset($parts[1]) ? (isset($actions[$parts[1]]) ? $actions[$parts[1]] : null) : null;

        if ($uri === '/') {
            require '../App/Controllers/LandingController.php';
            $controllerInstance = new \App\Controllers\LandingController();
            return $controllerInstance->index();
        }

        if ($uri === '/jocs') {
            require '../App/Controllers/JocController.php';
            $controllerInstance = new \App\Controllers\JocController();
            return $controllerInstance->index();
        }

        if ($uri === '/films') {
            require '../App/Controllers/FilmController.php';
            $controllerInstance = new \App\Controllers\FilmController();
            return $controllerInstance->index();
        }

        if ($action) {
            $controllerPath = str_replace('\\', '/', $controller);
            require "../{$controllerPath}.php";
            $controllerInstance = new $controller();

            if (in_array($action, ['store', 'update', 'destroy']) && $_SERVER['REQUEST_METHOD'] === 'POST') {
                $data = $_POST;
                if ($action !== 'store' && !isset($parts[2])) {
                    throw new RuntimeException('No id provided');
                }
                return $controllerInstance->$action(isset($parts[2]) ? $parts[2] : null, $data);
            }

            if (in_array($action, ['create', 'edit', 'delete']) && $_SERVER['REQUEST_METHOD'] === 'GET') {
                return $controllerInstance->$action(isset($parts[2]) ? $parts[2] : null);
            }
        }

        return require '../resources/views/errors/404.blade.php';
    }
}