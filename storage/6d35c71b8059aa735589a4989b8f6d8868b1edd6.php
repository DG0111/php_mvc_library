<?php $__env->startSection('content'); ?>
    <form id="add-car-form" action="<?php echo e(BASE_URL . 'car/save-add-car'); ?>" method="post"
          enctype="multipart/form-data">
        <h3>Thêm mới car</h3>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Name car<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="model_name">
                </div>
                <div class="form-group">
                    <label for="">Danh mục</label>
                    <select name="brand_id" class="form-control">
                        <?php $__currentLoopData = $brand; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($brand->id); ?>"><?php echo e($brand->brand_name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>price<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="price">
                </div>
                <div class="form-group">
                    <label>sale price<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="sale_price">
                </div>
                <div class="form-group">
                    <label>Detail<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="detail">
                </div>
                <div class="form-group">
                    <label>Quantity<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="quantity">
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
                    <input type="file" onchange="encodeImageFileAsURL(this)" class="form-control" name="image">
                </div>
            </div>
            <div class="col-12 d-flex justify-content-end">
                <button class="btn btn-primary" type="submit">Lưu</button>&nbsp;
                <a href="<?= BASE_URL ?>" class="btn btn-danger">Hủy</a>
            </div>
        </div>
    </form>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
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
            $('#add-car-form').validate({
                // quy định bắt lỗi (nếu vi phạm thì hiển thị lỗi)
                rules: {
                    model_name: {
                        required: true,
                        rangelength: [4, 100],
                        remote:
                            {
                                url: "<?php echo e(BASE_URL . 'car/check-car-name'); ?>",
                                type: "post",
                                data:
                                    {
                                        name: function () {
                                            return $('#add-car-form :input[name="model_name"]').val();
                                        }
                                    },
                            },
                    },
                    image: {
                        required: true,
                        accept: "image/*",
                    },
                    detail: {
                        required: true,
                    },
                    price: {
                        required: true,
                    }
                },
                // Text của lỗi sẽ hiển thị ra ngoài
                messages: {
                    model_name: {
                        required: "Hãy nhập tên nhãn hiệu",
                        rangelength: "tên nhãn hiệu nằm trong khoảng 4-10 ký tự",
                        remote: "Tên nhãn hiệu đã tồn tại",
                    },

                    image: {
                        accept: "Sai định dạng ảnh",
                        required: "Hãy chọn ảnh nhãn hiệu",

                    },
                    detail: {
                        required: "Hãy nhập đất nước !",
                    },
                    price: {
                        required: "Hãy nhập đất nước !",
                    },
                }
            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\baiTap2\app\views/admin/car/addForm.blade.php ENDPATH**/ ?>