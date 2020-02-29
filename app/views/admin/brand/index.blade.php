@extends('layouts.admin');

@section('content')
    <div class=".container-fluid">
        <div>
            <form action="{{BASE_URL . 'brand/search'}}" method="get">
                <input required name="search" placeholder="Tìm Kiếm" type="text">
                <button class="btn-danger" type="submit">SEARCH</button>
            </form>
        </div>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Name</th>
                <th scope="col">Logo</th>
                <th scope="col">Country</th>
                <th scope="col"><a class="btn btn-sm btn-success" href="{{BASE_URL . 'brand/add-brand'}}">Add
                        brand</a></th>
            </tr>
            </thead>
            <tbody>
            @foreach($brand as $brand)
                <tr>
                    <th scope="row">{{$brand->id}}</th>
                    <td>{{$brand->brand_name}}</td>
                    <td><img src="{{$brand->logo}}" width="100px" alt=""></td>
                    <td>{{$brand->country}}</td>
                    <td class="">
                        <a class="btn btn-sm btn-info" href="{{BASE_URL . "brand/edit-brand/$brand->id"}}">Edit</a>
                        <a class="btn btn-sm btn-danger btn-remove"
                           href="{{BASE_URL . "brand/remove-brand/$brand->id"}}">Delete</a>
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
