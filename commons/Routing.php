<?php

namespace Commons;

use Phroute\Phroute\RouteCollector;
use Phroute\Phroute\Dispatcher;

class Routing
{
    public static function customRouting($url)
    {
        $router = new RouteCollector();

        $router->group(['prefix' => 'brand'], function ($router) {
            // products
            $router->get('/', ['Controllers\BrandController', 'index']);
            $router->get('add-brand', ['Controllers\BrandController', 'formBrand']);
            $router->post('save-add-brand', ['Controllers\BrandController', 'saveBrand']);
            $router->get('edit-brand/{id:i}', ['Controllers\BrandController', 'formEdit']);
            $router->post('save-edit-brand', ['Controllers\BrandController', 'saveEdit']);
            $router->get('remove-brand/{id:i}', ['Controllers\BrandController', 'removeBrand']);
            $router->post('check-brand-name', ['Controllers\BrandController', 'checkBrandName']);
            $router->get('search', ['Controllers\BrandController', 'search']);
            // end products
        });
        $router->group(['prefix' => 'car'], function ($router) {
            // cars
            $router->get('/', ['Controllers\CarController', 'index']);
            $router->get('add-car', ['Controllers\CarController', 'formCar']);
            $router->post('save-add-car', ['Controllers\CarController', 'saveCar']);
            $router->get('edit-car/{id:i}', ['Controllers\CarController', 'formEdit']);
            $router->post('save-edit-car', ['Controllers\CarController', 'saveEdit']);
            $router->get('remove-car/{id:i}', ['Controllers\CarController', 'removeCar']);
            $router->post('check-car-name', ['Controllers\CarController', 'checkCarName']);
            // end cars
        });


        $dispatcher = new Dispatcher($router->getData());
        $response = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], parse_url($url, PHP_URL_PATH));
        echo $response;
    }
}
