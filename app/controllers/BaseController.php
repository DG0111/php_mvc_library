<?php
namespace Controllers;

use Jenssegers\Blade\Blade;

class BaseController
{
    public function render($view, $dataArr){

        $blade = new Blade('app/views', 'storage');

        echo $blade->make($view, $dataArr)->render();
    }

}
