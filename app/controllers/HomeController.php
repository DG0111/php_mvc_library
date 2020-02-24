<?php

namespace Controllers;

use Models\Products;
use Models\Categories;

class HomeController extends BaseController
{

    public function home()
    {
        $products = Products::All();
        $categories = Categories::All();
//        $products = DB::table('products')
//            ->join('categories','products.cate_id','=','categories.id')->get();

        $this->render('home.home', ['products' => $products, 'cate' => $categories]);
    }
}
