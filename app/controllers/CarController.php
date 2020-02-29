<?php


namespace Controllers;

use Models\car;
use Models\brand;

class CarController extends BaseController
{
    public function index()
    {
        $car = Car::all();
        $this->render('admin.car.index', ['car'=>$car]);

    }

    public function formCar()
    {
        $brand = Brand::all();
        $this->render('admin.car.addForm', ['brand'=>$brand]);
    }

    public function saveCar()
    {
        $car = new Car();
        $requestData = $_POST;

        foreach ($requestData as $key => $value) {
            $car->$key = $value;
        }

        $requestDataFile = $_FILES;

        $car->image = img_upload($requestDataFile['image']); // vut file anh vao public images

        $car->save();

        header('location: ' . BASE_URL . 'car?msg=Bạn đã lưu thành công');
    }

    public function removeCar($id)
    {
        $car = Car::find($id);

        $car->delete();

        header("location: " . BASE_URL . 'car?msg=Bạn đã xóa thành công');
    }

    public function formEdit($id)
    {
        $car = Car::find($id);

        $brand = Brand::all();

        $this->render('admin.car.editForm', ['car' => $car,'brand'=>$brand]);
    }

    public function saveEdit()
    {
        $id = $_POST['id'];
        $car = Car::find($id);

        // kiểm tra tồn tại id
        if (!$car) {
            header('location: ' . BASE_URL . 'car?msg=Sai thông tin rồi bạn ê');
            die;
        }

        $requestDate = $_POST;

        $requestDateFile = img_upload($_FILES['image']);
        if ($requestDateFile != null) { // kiểm tra có hình ảnh hay không
            $car->logo = $requestDateFile;
        }

        $car->fill($requestDate);

        $msg = $car->save() == true ? 'Cập nhật thông tin thành công' : 'Cập nhật thông tin thất bại';

        header('location: ' . BASE_URL . 'car?msg=Bạn đã sửa thành công');

        die;
    }

    public function checkCarName()
    {
        $car_name = trim($_POST['model_name']);
        $id = isset($_POST['id']) ? $_POST['id'] : '';
        if ($id == '') {
            $existed = Car::where('model_name', $car_name)->count();
        } else {
            $existed = Car::where('model_name', $car_name)
                ->where('id', '!=', $id)
                ->count();
        }

        echo $existed == 0 ? "true" : "false";
    }
}
