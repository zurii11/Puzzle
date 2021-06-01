<?php $__env->startSection('content'); ?>

<div class="row">
    <div class="col-sm-12">
        <!-- <a href="<?php echo e(route('sellers.create')); ?>" class="btn btn-info pull-right"><?php echo e(__('add_new')); ?></a> -->
    </div>
</div>

<br>

<!-- Basic Data Tables -->
<!--===================================================-->
<div class="panel">
    <div class="panel-heading">
        <h3 class="panel-title"><?php echo e(__('Customers')); ?></h3>
    </div>
    <div class="panel-body">
        <table class="table table-striped table-bordered demo-dt-basic" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>#</th>
                    <th><?php echo e(__('დასახელება')); ?></th>
                    <th><?php echo e(__('საიდენტიფიკაციო')); ?></th>
                    <th><?php echo e(__('ელ.ფოსტა')); ?></th>
                    <th><?php echo e(__('ტელეფონი')); ?></th>
                    <th><?php echo e(__('მისამართი')); ?></th>
                    <th><?php echo e(__('სტატუსი')); ?></th>
                    <th width="10%"><?php echo e(__('მოქმედება')); ?></th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $customers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $customer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($key+1); ?></td>
                        <td><?php echo e($customer->user["name"]); ?></td>
                        <td><?php echo e($customer->user["usertype_id"]); ?></td>
                        <td><?php echo e($customer->user["email"]); ?></td>  
                        <td><?php echo e($customer->user["phone"]); ?></td>
                        <td><?php echo e($customer->user["address"]); ?></td>
                        <td><?php echo e($customer->user["status"]); ?></td>
                        <td>
                            <div class="btn-group dropdown">
                                <button class="btn btn-primary dropdown-toggle dropdown-toggle-icon" data-toggle="dropdown" type="button">
                                    <?php echo e(__('Actions')); ?> <i class="dropdown-caret"></i>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li><a onclick="confirm_modal_status('<?php echo e(route('customers.statusthree', $customer->user_id)); ?>');"><?php echo e(__('Status Three')); ?></a></li>
                                    <li><a onclick="confirm_modal_status('<?php echo e(route('customers.statustwo', $customer->user_id)); ?>');"><?php echo e(__('Status Two')); ?></a></li>
                                    <li><a onclick="confirm_modal_status('<?php echo e(route('customers.statuszero', $customer->user_id)); ?>');"><?php echo e(__('Status Zero')); ?></a></li>
                                    <li><a onclick="confirm_modal('<?php echo e(route('customers.destroy', $customer->id)); ?>');"><?php echo e(__('Delete')); ?></a></li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>

    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/puzzle/public_html/resources/views/customers/index.blade.php ENDPATH**/ ?>