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
//
//        $router->group(['prefix' => 'products'], function ($router) {
//            $router->get('add-product', ['Controllers\ProductsController', 'showForm']);
//            $router->post('save-add-product', ['Controllers\ProductsController', 'saveProduct']);
//            $router->get('remove/{id:i}', ['Controllers\ProductsController', 'remove']);
//            $router->get('edit/{id:i}', ['Controllers\ProductsController', 'edit']);
//            $router->post('save-edit', ['Controllers\ProductsController', 'saveEdit']);
//        });

        $router->group(['prefix' => 'admin'], function ($router) {
            // products
            $router->get('/', ['Controllers\AdminController', 'index']);
            $router->get('add-product', ['Controllers\AdminController', 'formProduct']);
            $router->post('save-add-product', ['Controllers\AdminController', 'saveProduct']);
            $router->get('edit-product/{id:i}', ['Controllers\AdminController', 'formEdit']);
            $router->post('save-edit-product', ['Controllers\AdminController', 'saveEdit']);
            $router->get('remove-product/{id:i}', ['Controllers\AdminController', 'removeProduct']);
            $router->post('check-product-name', ['Controllers\AdminController', 'checkProductName']);
            // end products
        });


        $dispatcher = new Dispatcher($router->getData());
        $response = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], parse_url($url, PHP_URL_PATH));
        echo $response;
    }
}
