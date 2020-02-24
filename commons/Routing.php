<?php

namespace Commons;

use Phroute\Phroute\RouteCollector;
use Phroute\Phroute\Dispatcher;

class Routing
{
    public static function customRouting($url)
    {
        $router = new RouteCollector();

        $router->get('/', ['Controllers\HomeController', 'home']);

        $router->group(['prefix' => 'products'], function ($router) {
            $router->get('add-product', ['Controllers\ProductsController', 'showForm']);
            $router->post('save-add-product', ['Controllers\ProductsController', 'saveProduct']);
            $router->get('remove/{id:i}', ['Controllers\ProductsController', 'remove']);
            $router->get('edit/{id:i}', ['Controllers\ProductsController', 'edit']);
            $router->post('save-edit', ['Controllers\ProductsController', 'saveEdit']);
        });


        $dispatcher = new Dispatcher($router->getData());
        $response = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], parse_url($url, PHP_URL_PATH));
        echo $response;
    }
}
