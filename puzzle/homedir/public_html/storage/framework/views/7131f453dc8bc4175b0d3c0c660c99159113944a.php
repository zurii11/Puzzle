

<?php $__env->startSection('content'); ?>

<div class="col-lg-6 col-lg-offset-3">
    <div class="panel">
        <div class="panel-heading">
            <h3 class="panel-title"><?php echo e(__('Role Information')); ?></h3>
        </div>

        <!--Horizontal Form-->
        <!--===================================================-->
        <form class="form-horizontal" action="<?php echo e(route('roles.store')); ?>" method="POST" enctype="multipart/form-data">
        	<?php echo csrf_field(); ?>
            <div class="panel-body">
                <div class="form-group">
                    <label class="col-sm-3 control-label" for="name"><?php echo e(__('Name')); ?></label>
                    <div class="col-sm-9">
                        <input type="text" placeholder="<?php echo e(__('Name')); ?>" id="name" name="name" class="form-control" required>
                    </div>
                </div>
                <div class="panel-heading">
                    <h3 class="panel-title"><?php echo e(__('Permissions')); ?></h3>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label" for="banner"></label>
                    <div class="col-sm-9">
                        <div class="row">
                            <div class="col-sm-10">
                                <label class="control-label"><?php echo e(__('Products')); ?></label>
                            </div>
                            <div class="col-sm-2">
                                <label class="switch">
                                    <input type="checkbox" name="permissions[]" class="form-control demo-sw" value="1">
                                    <span class="slider round"></span>
                                </label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-10">
                                <label class="control-label"><?php echo e(__('Flash Deal')); ?></label>
                            </div>
                            <div class="col-sm-2">
                                <label class="switch">
                                    <input type="checkbox" name="permissions[]" class="form-control demo-sw" value="2">
                                    <span class="slider round"></span>
                                </label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-10">
                                <label class="control-label"><?php echo e(__('Orders')); ?></label>
                            </div>
                            <div class="col-sm-2">
                                <label class="switch">
                                    <input type="checkbox" name="permissions[]" class="form-control demo-sw" value="3">
                                    <span class="slider round"></span>
                                </label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-10">
                                <label class="control-label"><?php echo e(__('Sales')); ?></label>
                            </div>
                            <div class="col-sm-2">
                                <label class="switch">
                                    <input type="checkbox" name="permissions[]" class="form-control demo-sw" value="4">
                                    <span class="slider round"></span>
                                </label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-10">
                                <label class="control-label"><?php echo e(__('Sellers')); ?></label>
                            </div>
                            <div class="col-sm-2">
                                <label class="switch">
                                    <input type="checkbox" name="permissions[]" class="form-control demo-sw" value="5">
                                    <span class="slider round"></span>
                                </label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-10">
                                <label class="control-label"><?php echo e(__('Customers')); ?></label>
                            </div>
                            <div class="col-sm-2">
                                <label class="switch">
                                    <input type="checkbox" name="permissions[]" class="form-control demo-sw" value="6">
                                    <span class="slider round"></span>
                                </label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-10">
                                <label class="control-label"><?php echo e(__('Messaging')); ?></label>
                            </div>
                            <div class="col-sm-2">
                                <label class="switch">
                                    <input type="checkbox" name="permissions[]" class="form-control demo-sw" value="7">
                                    <span class="slider round"></span>
                                </label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-10">
                                <label class="control-label"><?php echo e(__('Business Settings')); ?></label>
                            </div>
                            <div class="col-sm-2">
                                <label class="switch">
                                    <input type="checkbox" name="permissions[]" class="form-control demo-sw" value="8">
                                    <span class="slider round"></span>
                                </label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-10">
                                <label class="control-label"><?php echo e(__('Frontend Settings')); ?></label>
                            </div>
                            <div class="col-sm-2">
                                <label class="switch">
                                    <input type="checkbox" name="permissions[]" class="form-control demo-sw" value="9">
                                    <span class="slider round"></span>
                                </label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-10">
                                <label class="control-label"><?php echo e(__('Staffs')); ?></label>
                            </div>
                            <div class="col-sm-2">
                                <label class="switch">
                                    <input type="checkbox" name="permissions[]" class="form-control demo-sw" value="10">
                                    <span class="slider round"></span>
                                </label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-10">
                                <label class="control-label"><?php echo e(__('SEO Setting')); ?></label>
                            </div>
                            <div class="col-sm-2">
                                <label class="switch">
                                    <input type="checkbox" name="permissions[]" class="form-control demo-sw" value="11">
                                    <span class="slider round"></span>
                                </label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-10">
                                <label class="control-label"><?php echo e(__('E-commerce Setup')); ?></label>
                            </div>
                            <div class="col-sm-2">
                                <label class="switch">
                                    <input type="checkbox" name="permissions[]" class="form-control demo-sw" value="12">
                                    <span class="slider round"></span>
                                </label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-10">
                                <label class="control-label"><?php echo e(__('Support Ticket')); ?></label>
                            </div>
                            <div class="col-sm-2">
                                <label class="switch">
                                    <input type="checkbox" name="permissions[]" class="form-control demo-sw" value="13">
                                    <span class="slider round"></span>
                                </label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-10">
                                <label class="control-label"><?php echo e(__('Pickup Point Order')); ?></label>
                            </div>
                            <div class="col-sm-2">
                                <label class="switch">
                                    <input type="checkbox" name="permissions[]" class="form-control demo-sw" value="14">
                                    <span class="slider round"></span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel-footer text-right">
                <button class="btn btn-purple" type="submit"><?php echo e(__('Save')); ?></button>
            </div>
        </form>
        <!--===================================================-->
        <!--End Horizontal Form-->

    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/solage/public_html/puzzle.sola.ge/resources/views/roles/create.blade.php ENDPATH**/ ?>