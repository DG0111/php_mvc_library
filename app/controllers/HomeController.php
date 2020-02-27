<?php

namespace Controllers;

use Models\Products;
use Models\Categories;

class HomeController extends BaseController
{

    public function home()
    {
        $name = "Farrell Group";
        $test = Products::where('name','=',$name)->get();
        echo count($test) == 0 ? "true" : "false";
    }
}
