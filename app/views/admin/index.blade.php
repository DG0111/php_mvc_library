@extends('layouts.admin');

@section('content')
    <div class=".container-fluid">

        <table class="table table-bordered">
            <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Name</th>
                {{--                <th scope="col">detail</th>--}}
                {{--                <th scope="col">Short desc</th>--}}
                <th scope="col">Category</th>
                <th scope="col">Price</th>
                <th scope="col">Image</th>
                <th scope="col">Evaluate</th>
                <th scope="col">Views</th>
                <th scope="col"><a class="btn btn-sm btn-success" href="{{BASE_URL . 'admin/add-product'}}">Add
                        product</a></th>
            </tr>
            </thead>
            <tbody>
            @foreach($pro as $product)
                <tr>
                    <th scope="row">{{$product->id}}</th>
                    <td>{{$product->name}}</td>
                    {{--                    <td>{{$product->detail}}</td>--}}
                    {{--                    <td>{{$product->short_desc}}</td>--}}
                    <td>
                        @php
                            $parent = $product->getCategory();
                        @endphp
                        @if($parent !== false)
                            <?= $parent->cate_name; ?>
                        @endif
                    </td>
                    {{--                    <td>{{$product->cate_id}}</td>--}}
                    <td>{{$product->price}}</td>
                    <td><img src="{{$product->image}}" width="100px" alt=""></td>
                    <td>{{$product->star}}</td>
                    <td>{{$product->views}}</td>
                    <td class="">
                        <a class="btn btn-sm btn-info" href="{{BASE_URL . "admin/edit-product/$product->id"}}">Edit</a>
                        <a class="btn btn-sm btn-danger btn-remove"
                           href="{{BASE_URL . "admin/remove-product/$product->id"}}">Delete</a>
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
