<?php
use App\Controllers\FilmController;
use App\Controllers\JocController;
use App\Controllers\LandingController;

class Router
{
    protected $routes = [];

    public function get($uri, $controller)
    {
        $this->routes['GET'][$uri] = $controller;
    }

    public function post($uri, $controller)
    {
        $this->routes['POST'][$uri] = $controller;
    }

    public function direct($uri, $requestType)
    {
        foreach ($this->routes[$requestType] as $route => $controller) {
            $pattern = preg_replace('/\{[^\}]+\}/', '([^/]+)', $route);
            if (preg_match("#^$pattern$#", $uri, $matches)) {
                array_shift($matches);
                return $this->callAction($controller[0], $controller[1], $matches);
            }
        }

        // If no route is found, show the 404 error page
        require 'resources/views/errors/404.blade.php';
    }

    protected function callAction($controller, $action, $parameters = [])
    {
        $controller = new $controller;

        if (!method_exists($controller, $action)) {
            throw new Exception(
                "{$controller} does not respond to the {$action} action."
            );
        }

        return $controller->$action(...$parameters);
    }
}

// Define the routes
$router = new Router;
$router->get('/', [LandingController::class, 'index']);
$router->get('/films', [FilmController::class, 'index']);
$router->get('/films/create', [FilmController::class, 'create']);
$router->post('/films/store', [FilmController::class, 'store']);
$router->get('/films/edit/{id}', [FilmController::class, 'edit']);
$router->post('/films/update/{id}', [FilmController::class, 'update']);
$router->get('/films/delete/{id}', [FilmController::class, 'delete']);
$router->post('/films/destroy/{id}', [FilmController::class, 'destroy']);

$router->get('/jocs', [JocController::class, 'index']);
$router->get('/jocs/create', [JocController::class, 'create']);
$router->post('/jocs/store', [JocController::class, 'store']);
$router->get('/jocs/edit/{id}', [JocController::class, 'edit']);
$router->post('/jocs/update/{id}', [JocController::class, 'update']);
$router->get('/jocs/delete/{id}', [JocController::class, 'delete']);
$router->post('/jocs/destroy/{id}', [JocController::class, 'destroy']);

$uri = trim($_SERVER['REQUEST_URI'], '/');
$requestType = $_SERVER['REQUEST_METHOD'];

$router->direct($uri, $requestType);