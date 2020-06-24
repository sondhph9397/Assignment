
<?php $__env->startSection('main-content'); ?>
<section class="content">
    <div class="container-fluid">
        <form action=" <?php echo e(getClientURL('save-edit-category')); ?>" method="post" enctype="multipart/form-data">
        <input type="text" hidden name="id" id="" value="<?php echo e($model->id); ?>">
            <div class="row">
                <div class="col-md-6">
                    <div class="card card-primary">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="">Tên danh mục<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="cate_name" value="<?php echo e($model->cate_name); ?>">
                                <label for="" class="error"><?php echo e(isset($_GET['cate_nameerr']) ? $_GET['cate_nameerr'] : ""); ?></label>
                            </div>
                              <div class="form-group">
                                <label for="">Mô tả ngắn<span class="text-danger">*</span></label>
                                <textarea name="desc" id="" cols="50" rows="5" class="form-control"><?php echo e($model->desc); ?></textarea>
                                <label for="" class="error"><?php echo e(isset($_GET['descerr']) ? $_GET['descerr'] : ""); ?></label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 d-flex justify-content-start">
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Sửa</button>&nbsp;
                        <a href="<?php echo e(getClientURL('category')); ?>" class="btn btn-danger">Hủy</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Assignment\app\views/categories/edit-form.blade.php ENDPATH**/ ?>