<?php

namespace Controllers;

use Models\Brand;

class BrandController extends BaseController
{
    public function index()
    {
        $brand = Brand::all();
        $this->render('admin.brand.index', compact('brand'));

    }

    public function formBrand()
    {
        $this->render('admin.brand.addForm', []);
    }

    public function saveBrand()
    {
        $brand = new Brand();
        $requestData = $_POST;

        foreach ($requestData as $key => $value) {
            $brand->$key = $value;
        }

        $requestDataFile = $_FILES;

        $brand->logo = img_upload($requestDataFile['logo']); // vut file anh vao public images

        $brand->save();

        header('location: ' . BASE_URL . 'admin?msg=Bạn đã lưu thành công');
    }

    public function removeBrand($id)
    {
        $brand = Brand::find($id);

        $brand->delete();

        header("location: " . BASE_URL . 'admin?msg=Bạn đã xóa thành công');
    }

    public function formEdit($id)
    {
        $brand = Brand::find($id);
        $this->render('admin.brand.editForm', ['brand' => $brand]);
    }

    public function saveEdit()
    {
        $id = $_POST['id'];
        $brand = Brand::find($id);

        // kiểm tra tồn tại id
        if (!$brand) {
            header('location: ' . BASE_URL . 'admin?msg=Sai thông tin rồi bạn ê');
            die;
        }

        $requestDate = $_POST;


        $requestDateFile = img_upload($_FILES['logo']);
        if ($requestDateFile != null) { // kiểm tra có hình ảnh hay không
            $brand->logo = $requestDateFile;
        }


        $brand->fill($requestDate);

        $msg = $brand->save() == true ? 'Cập nhật thông tin thành công' : 'Cập nhật thông tin thất bại';

        header('location: ' . BASE_URL . 'brand?msg=Bạn đã sửa thành công');

        die;
    }

    public function checkBrandName()
    {
        $brand_name = trim($_POST['brand_name']);
        $id = isset($_POST['id']) ? $_POST['id'] : '';
        if ($id == '') {
            $existed = Brand::where('brand_name', $brand_name)->count();
        } else {
            $existed = Brand::where('brand_name', $brand_name)
                ->where('id', '!=', $id)
                ->count();
        }

        echo $existed == 0 ? "true" : "false";
    }

    public function search()
    {
        $key = $_GET['search'];
        $brand = Brand::search($key)->get();
        $this->render('admin.brand.index', compact('brand'));
    }


}
