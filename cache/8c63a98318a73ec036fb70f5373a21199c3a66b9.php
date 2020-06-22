
<?php $__env->startSection('main-content'); ?>
<section class="content">
    <div class="container-fluid">
        <form action=" <?php echo e(getClientURL('save-add-user')); ?>" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-6">
                    <div class="card card-primary">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="">Tên Người dùng<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="name">
                            </div>
                            <div class="form-group">
                                <label for="">email<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="email">
                            </div>
                            <div class="form-group">
                                <label for="">Mât khẩu<span class="text-danger">*</span></label>
                                <input type="password" class="form-control" name="password">
                            </div>
                            <div class="form-group">
                                <label for="">Ảnh<span class="text-danger">*</span></label>
                                <input type="file" class="form-control" name="image">
                            </div>
                          
                            <div class="form-group">
                                <label for="">Quyền<span class="text-danger">*</span></label>
                                <input type="number" min="1" max="3"  class="form-control" name="role">
                            </div>
                              
                        </div>
                    </div>
                </div>
                <div class="col-md-12 d-flex justify-content-start">
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Tạo</button>&nbsp;
                        <a href="<?php echo e(getClientURL('user')); ?>" class="btn btn-danger">Hủy</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Assignment\app\views/users/add-form.blade.php ENDPATH**/ ?>