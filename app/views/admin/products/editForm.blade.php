@extends('layouts.admin')
@section('content')
    <form id="edit-product-form" action="{{BASE_URL . 'admin/save-edit-product'}}" method="post"
          enctype="multipart/form-data">
        <h3>Thêm mới sản phẩm</h3>
        <div class="row">
            <div class="col-md-6">
                <input name="id" hidden type="text" value="{{$pro->id}}">
                <div class="form-group">
                    <label>Tên sản phẩm<span class="text-danger">*</span></label>
                    <input value="{{$pro->name}}" type="text" class="form-control" name="name">
                </div>
                <div class="form-group">
                    <label for="">Danh mục sản phẩm</label>
                    <select name="cate_id" class="form-control">
                        @foreach($cate as $cate)
                            <option value="{{$cate->id}}">{{$cate->cate_name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Giá sản phẩm<span class="text-danger">*</span></label>
                    <input value="{{$pro->price}}" type="number" class="form-control" name="price">
                </div>
                <div class="form-group">
                    <label for="">Lượt xem</label>
                    <input value="{{$pro->views}}" type="number" class="form-control" name="views">
                </div>
                <div class="form-group">
                    <label for="">Đánh giá</label>
                    <input value="{{$pro->star}}" type="number" class="form-control" name="star">
                </div>
                <div class="form-group">
                    <label for="">Mô tả ngắn</label>
                    <textarea name="short_desc" class="form-control" rows="5">{{$pro->short_desc}}</textarea>
                </div>
            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="col-8 offset-2">
                        <img id="preview-img" src="{{BASE_URL . $pro->image}}" class="img-fluid">
                    </div>
                </div>
                <div class="form-group">
                    <label for="">Ảnh đại diện sản phẩm<span class="text-danger">*</span></label>
                    <input type="file" class="form-control" onchange="encodeImageFileAsURL(this)" name="image">
                </div>
                <div class="form-group">
                    <label for="">Thông tin chi tiết</label>
                    <textarea name="detail" class="form-control" rows="9">{{$pro->detail}}</textarea>
                </div>
            </div>
            <div>
                <img src="products/public/images/5e534bbe2e083-images.jpg" width="100%" alt="">
            </div>
            <div class="col-12 d-flex justify-content-end">
                <button class="btn btn-primary" type="submit">Lưu</button>&nbsp;
                <a href="<?= BASE_URL ?>" class="btn btn-danger">Hủy</a>
            </div>
        </div>
    </form>
@stop

@section('scripts')
    <script>
        function encodeImageFileAsURL(element) {
            var file = element.files[0];
            if (file === undefined) {
                $('#preview-img').attr('src', "{{BASE_URL . $pro->image}}");
            } else {
                var reader = new FileReader();
                reader.onloadend = function () {
                    $('#preview-img').attr('src', reader.result);
                    // console.log('RESULT', reader.result)
                }
                reader.readAsDataURL(file);
            }
        }

        $(document).ready(function () {
            /**
             * name: bắt buộc nhập, tối thiểu 4 ký tự
             * price: bắt buộc nhập, giá trị nhỏ nhất = 1
             * lượt xem: không bắt buộc nhập, nếu nhập thì phải là số, và không âm
             * đánh giá: không bắt buộc nhập, nếu nhập thì phải là số, và không âm
             * ảnh đại diện: bắt buộc, phải có đuôi là định dạng ảnh (jpg, png, jpeg, gif)
             */
            $('#edit-product-form').validate({
                // quy định bắt lỗi (nếu vi phạm thì hiển thị lỗi)
                rules: {
                    name: {
                        required: true,
                        rangelength: [4, 100],
                        remote: {
                            url: "{{BASE_URL .'admin/check-product-name'}}",
                            type: "post",
                            data: {
                                name: function () {
                                    return $('#edit-product-form :input[name="name"]').val();
                                },
                                id: function () {
                                    return $('#edit-product-form :input[name="id"]').val();
                                }
                            }
                        }
                    },
                    cate_id: {},
                    price: {
                        required: true,
                        min: 1,
                        number: true,
                    },
                    views: {
                        min: 0,
                        number: true,
                    },
                    star: {
                        number: true,
                        min: 0,
                        max: 5,

                    },
                    short_desc: {},
                    image: {
                        accept: "image/*",
                    }
                },
                // Text của lỗi sẽ hiển thị ra ngoài
                messages: {
                    name: {
                        required: "Hãy nhập tên sản phẩm",
                        rangelength: "tên sản phẩm nằm trong khoảng 4-10 ký tự",
                        remote: "Tên sản phẩm đã tồn tại",
                    },
                    cate_id: {},
                    price: {
                        required: "Hãy nhập giá sản phẩm",
                        min: "Gia sản phẩm phải lớn không",
                        number: "Giá sản phẩm thì phải là một số",

                    },
                    views: {
                        min: "Không được nhập số nhỏ hơn không",
                        number: "Lượt xem thì phải là một số",
                    },
                    star: {
                        min: "Không được nhập số nhỏ hơn không",
                        max: "Đánh giá không quá năm sao",
                        number: "Đánh giá thì phải là một số",
                    },
                    short_desc: {},
                    image: {
                        accept: "Sai định dạng ảnh",
                    }
                }
            });
        });
    </script>
@stop
