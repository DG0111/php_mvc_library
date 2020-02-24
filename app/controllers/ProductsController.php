<?php

namespace Controllers;

use Models\Categories;
use Models\Products;

class ProductsController extends BaseController
{
    public function showForm()
    {
        $categories = Categories::All();
        $this->render('product.addForm', ['cate' => $categories]);
    }

    public function saveProduct()
    {
        $product = new Products();
        $requestData = $_POST;

        foreach ($requestData as $key => $value) {
            $product->$key = $value;
        }

        $requestDataFile = $_FILES;

        $product->image = img_upload($requestDataFile['image']); // vut file anh vao public images

        $product->save();

        header('location: ' . BASE_URL);
    }

    public function remove($id)
    {
        $product = Products::find($id);

        $product->delete();

        header("location: " . BASE_URL);
    }

    public function edit($id)
    {
        $categories = Categories::All();
        $product = Products::find($id);
        $this->render('product.editForm', ['cate' => $categories, 'pro' => $product]);
    }

    public function saveEdit()
    {

        $product = Products::find($_POST['id']);

        $requestData = $_POST;

        foreach ($requestData as $key => $value) {
            $product->$key = $value;
        }

        $requestDataFile = $_FILES;

        $product->image = img_upload($requestDataFile['image']); // vut file anh vao public images

        $product->save();

        header('location: ' . BASE_URL);

    }
}
