

<?php $__env->startSection('content'); ?>

    <div class="row">
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title"><?php echo e($language->name); ?></h3>
            </div>
            <form class="form-horizontal" action="<?php echo e(route('languages.key_value_store')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <input type="hidden" name="id" value="<?php echo e($language->id); ?>">
                <div class="panel-body">
                    <table class="table table-striped table-bordered demo-dt-basic" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th><?php echo e(__('Key')); ?></th>
                                <th><?php echo e(__('Value')); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $i = 1;
                            ?>
                            <?php $__currentLoopData = openJSONFile('en'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($i); ?></td>
                                    <td><?php echo e($key); ?></td>
                                    <td>
                                        <div class="col-lg-12">
                                            <input type="text" class="form-control" style="width:100%" name="key[<?php echo e($key); ?>]" <?php if(isset(openJSONFile($language->code)[$key])): ?>
                                                value="<?php echo e(openJSONFile($language->code)[$key]); ?>"
                                            <?php endif; ?>>
                                        </div>
                                    </td>
                                </tr>
                                <?php
                                    $i++;
                                ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
                <div class="panel-footer text-right">
    				<button type="submit" class="btn btn-purple"><?php echo e(__('Save')); ?></button>
    			</div>
            </form>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/puzzlege/public_html/resources/views/business_settings/languages/language_view.blade.php ENDPATH**/ ?>