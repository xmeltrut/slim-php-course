<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\App;

// UPGRADES
//
// * New way to instanciate app and container
// * 404 error handling
// * ExceptionController now takes its own $response
// * Install all of the new packages
// * Mention changing service access to get('service')

require __DIR__ . '/../vendor/autoload.php';

$app = new App();

$container = $app->getContainer();

$container['templating'] = function() {
    return new Mustache_Engine([
        'loader' => new Mustache_Loader_FilesystemLoader(
            __DIR__ . '/../templates',
            ['extension' => '']
        )
    ]);
};

$app->get('/', '\App\Controller\ShopController:default');
$app->get('/details/{id:[0-9]+}', '\App\Controller\ShopController:details');

$container['notFoundHandler'] = function ($container) {
    return function ($request, $response) use ($container) {
        $controller = new \App\Controller\ExceptionController($container);
        return $controller->notFound($request, $response);
    };
};

$app->run();