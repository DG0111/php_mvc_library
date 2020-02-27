<?php

namespace Controllers;

use Models\Products;
use Models\Categories;

class AdminController extends BaseController
{
    public function index()
    {
        $pro = Products::all();
        $this->render('admin.index', compact('pro'));

    }

    public function formProduct()
    {
        $categories = Categories::All();
        $this->render('admin.products.addForm', ['cate' => $categories]);
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

        header('location: ' . BASE_URL . 'admin?msg=Bạn đã lưu thành công');
    }

    public function removeProduct($id)
    {
        $product = Products::find($id);

        $product->delete();

        header("location: " . BASE_URL . 'admin?msg=Bạn đã xóa thành công');
    }

    public function formEdit($id)
    {
        $categories = Categories::All();
        $product = Products::find($id);
        $this->render('admin.products.editForm', ['cate' => $categories, 'pro' => $product]);
    }

    public function saveEdit()
    {

        $id = $_POST['id'];
        $product = Products::find($id);

        // kiểm tra tồn tại id
        if (!$product) {
            header('location: ' . BASE_URL . 'admin?msg=Sai thông tin rồi bạn ê');
            die;
        }

        $requestDate = $_POST;
        $requestDateFile = img_upload($_FILES['image']);
        if ($requestDateFile != null) { // kiểm tra có hình ảnh hay không
            $product->image = $requestDateFile;
        }

        $product->fill($requestDate);
        $msg = $product->save() == true ? 'Cập nhật thông tin thành công' : 'Cập nhật thông tin thất bại';

        header('location: ' . BASE_URL . 'admin?msg=Bạn đã sửa thành công');
        die;
    }

    public function checkProductName()
    {
        $name = trim($_POST['name']);
        $id = $_POST['id'];
        if ($id) {
            $existed = Products::where('name', $name)
                ->where('id', '!=', $id)
                ->count();
        } else {
            $existed = Products::where('name', $name)->count();
        }

        echo $existed == 0 ? "true" : "false";
    }


}
