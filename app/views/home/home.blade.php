@extends('layouts.layouts')

@section('link')
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
@stop

@section('content')
    <div class=".container-fluid">

        <table class="table table-bordered">
            <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Name</th>
                <th scope="col">detail</th>
                <th scope="col">Short desc</th>
                <th scope="col">Category</th>
                <th scope="col">Price</th>
                <th scope="col">Image</th>
                <th scope="col">Evaluate</th>
                <th scope="col">Views</th>
                <th scope="col"><a class="btn btn-sm btn-success" href="{{BASE_URL . 'products/add-product'}}">Add
                        product</a></th>
            </tr>
            </thead>
            <tbody>
            @foreach($products as $product)
                <tr>
                    <th scope="row">{{$product->id}}</th>
                    <td>{{$product->name}}</td>
                    <td>{{$product->detail}}</td>
                    <td>{{$product->short_desc}}</td>
                    <td>{{$product->cate_id}}</td>
                    <td>{{$product->price}}</td>
                    <td><img src="{{$product->image}}" width="50px" alt=""></td>
                    <td>{{$product->star}}</td>
                    <td>{{$product->views}}</td>
                    <td>
                        <a class="btn btn-sm btn-danger" href="{{BASE_URL . "products/remove/$product->id"}}">Delete</a>
                        <a class="btn btn-sm btn-danger" href="{{BASE_URL . "products/edit/$product->id"}}">Edit</a>
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>
    </div>

@stop

@section('scripts')
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"
            integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
            integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
            crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
            integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
@stop
