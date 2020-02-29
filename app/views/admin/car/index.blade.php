@extends('layouts.admin');

@section('content')
    <div class=".container-fluid">

        <table class="table table-bordered">
            <thead>
            <tr>
                <th scope="col">brand_id</th>
                <th scope="col">Name</th>
                <th scope="col">image</th>
                <th scope="col">price</th>
                <th scope="col">sale price</th>
                <th scope="col">detail</th>
                <th scope="col">quantity</th>
                <th scope="col"><a class="btn btn-sm btn-success" href="{{BASE_URL . 'car/add-car'}}">Add
                        car</a></th>
            </tr>
            </thead>
            <tbody>
            @foreach($car as $car)
                <tr>
                    <th scope="row">{{$car->brand_id}}</th>
                    <td>{{$car->model_name}}</td>
                    <td><img src="{{$car->image}}" width="100px" alt=""></td>
                    <td>{{$car->price}}</td>
                    <td>{{$car->sale_price}}</td>
                    <td>{{$car->detail}}</td>
                    <td>{{$car->quantity}}</td>
                    <td class="">
                        <a class="btn btn-sm btn-info" href="{{BASE_URL . "car/edit-car/$car->id"}}">Edit</a>
                        <a class="btn btn-sm btn-danger btn-remove"
                           href="{{BASE_URL . "car/remove-car/$car->id"}}">Delete</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        @if(isset($_GET['msg']))
            <input type="hidden" id="msg" value="{{$_GET['msg']}}">
        @endif
    </div>
@stop

@section('scripts')
    <script>
        $(document).ready(function () {
            if ($('#msg').length > 0) {
                Swal.fire({
                    position: 'center',
                    icon: 'info',
                    title: $('#msg').val(),
                    showConfirmButton: false,
                    timer: 1500
                })
            }
            $('.btn-remove').click(function () {
                var redirectUrl = $(this).attr('href');
                Swal.fire({
                    title: 'Thông báo!',
                    text: "Bạn có chắc chắn muốn xóa sản phẩm này ?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Đồng ý!'
                }).then((result) => {
                    if (result.value) {
                        window.location.href = redirectUrl;
                    }
                })
                return false;
            });
        });
    </script>
@stop
