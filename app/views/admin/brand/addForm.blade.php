@extends('layouts.admin')
@section('content')
    <form id="add-brand-form" action="{{BASE_URL . 'brand/save-add-brand'}}" method="post"
          enctype="multipart/form-data">
        <h3>Thêm mới thương hiệu</h3>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Tên nhãn hiệu<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="brand_name">
                </div>
                <div class="form-group">
                    <label>Đất nước<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="country">
                </div>
            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="col-8 offset-2">
                        <img id="preview-img" src="<?= BASE_URL . 'public/images/default-image.jpg'?>"
                             class="img-fluid">
                    </div>
                </div>
                <div class="form-group">
                    <label for="">Ảnh đại diện sản phẩm<span class="text-danger">*</span></label>
                    <input type="file" onchange="encodeImageFileAsURL(this)" class="form-control" name="logo">
                </div>
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
                $('#preview-img').attr('src', "<?= BASE_URL . 'public/images/default-image.jpg'?>");
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
            $('#add-brand-form').validate({
                // quy định bắt lỗi (nếu vi phạm thì hiển thị lỗi)
                rules: {
                    brand_name: {
                        required: true,
                        rangelength: [4, 100],
                        remote:
                            {
                                url: "{{BASE_URL . 'brand/check-brand-name'}}",
                                type: "post",
                                data:
                                    {
                                        name: function () {
                                            return $('#add-brand-form :input[name="brand_name"]').val();
                                        }
                                    },
                            },
                    },
                    logo: {
                        required: true,
                        accept: "image/*",
                    },
                    country: {
                        required: true,
                    }
                },
                // Text của lỗi sẽ hiển thị ra ngoài
                messages: {
                    brand_name: {
                        required: "Hãy nhập tên nhãn hiệu",
                        rangelength: "tên nhãn hiệu nằm trong khoảng 4-10 ký tự",
                        remote: "Tên nhãn hiệu đã tồn tại",
                    },

                    logo: {
                        accept: "Sai định dạng ảnh",
                        required: "Hãy chọn ảnh nhãn hiệu",

                    },
                    country: {
                        required: "Hãy nhập đất nước !",
                    }
                }
            });
        });
    </script>
@stop
