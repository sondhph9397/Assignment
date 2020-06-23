
<?php $__env->startSection('main-content'); ?>
<section class="content">
    <div class="container-fluid">
        <form action=" <?php echo e(getClientURL('save-edit-user')); ?>" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-6">
                    <div class="card card-primary">
                        <div class="card-body"> 
                            <div class="form-group">
                            <input type="text" name="id" hidden id="" value="<?php echo e($model->id); ?>">
                                <label for="">Tên Người dùng<span class="text-danger">*</span></label>
                                <input type="text" value="<?php echo e($model->name); ?>" class="form-control" name="name">
                                <label for="" class="error"><?php echo e(isset($_GET['nameerr']) ? $_GET['nameerr'] : ""); ?></label>
                            </div>
                            <div class="form-group">
                                <label for="">email<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="email" value="<?php echo e($model->email); ?>">
                                <label for="" class="error"><?php echo e(isset($_GET['emailerr']) ? $_GET['emailerr'] : ""); ?></label>
                            </div>
                            <div class="form-group">
                                <label for="">Ảnh<span class="text-danger">*</span></label>
                                <input type="file" class="form-control" name="image"><img src="<?php echo e($model->avatar); ?>" alt="">
                                <label for="" class="error"><?php echo e(isset($_GET['fileerr']) ? $_GET['fileerr'] : ""); ?></label>
                            </div>
                          
                            <div class="form-group">
                                <label for="">Quyền<span class="text-danger">*</span></label>
                                <select class="form-control" name="role" id="">
                                <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($ro->id); ?>" <?php if($ro->id==$model->role): ?> 
                                        selected
                                         <?php endif; ?>
                                        ><?php echo e($ro->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                              
                        </div>
                    </div>
                </div>
                <div class="col-md-12 d-flex justify-content-start">
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Sửa</button>&nbsp;
                        <a href="<?php echo e(getClientURL('user')); ?>" class="btn btn-danger">Hủy</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Assignment\app\views/users/edit-form.blade.php ENDPATH**/ ?>