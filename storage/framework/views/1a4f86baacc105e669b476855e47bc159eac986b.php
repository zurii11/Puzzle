

<?php $__env->startSection('content'); ?>

<div class="panel">
    <div class="panel-heading">
        <h3 class="panel-title"><?php echo e(__('Support Desk')); ?></h3>
    </div>
    <div class="panel-body">
        <table class="table table-striped table-bordered demo-dt-basic" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th><?php echo e(__('Ticket ID')); ?></th>
                    <th><?php echo e(__('Sending Date')); ?></th>
                    <th><?php echo e(__('Subject')); ?></th>
                    <th><?php echo e(__('User')); ?></th>
                    <th><?php echo e(__('Status')); ?></th>
                    <th><?php echo e(__('Last reply')); ?></th>
                    <th><?php echo e(__('Options')); ?></th>
                </tr>
            </thead>
            <tbody>
                    <?php $__currentLoopData = $tickets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $ticket): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td>#<?php echo e($ticket->code); ?></td>
                        <td><?php echo e($ticket->created_at); ?> <?php if($ticket->viewed == 0): ?> <span class="pull-right badge badge-info"><?php echo e(__('New')); ?></span> <?php endif; ?></td>
                        <td><?php echo e($ticket->subject); ?></td>
                        <td><?php echo e($ticket->user->name); ?></td>
                        <td>
                            <?php if($ticket->status == 'pending'): ?>
                                <span class="badge badge-pill badge-danger"><?php echo e(__('Pending')); ?></span>
                            <?php elseif($ticket->status == 'open'): ?>
                                <span class="badge badge-pill badge-secondary"><?php echo e(__('Opened')); ?></span>
                            <?php else: ?>
                                <span class="badge badge-pill badge-success"><?php echo e(__('Solved')); ?></span>
                            <?php endif; ?>
                        </td>
                        <td>
                            <?php if(count($ticket->ticketreplies) > 0): ?>
                                <?php echo e($ticket->ticketreplies->last()->created_at); ?>

                            <?php else: ?>
                                <?php echo e($ticket->created_at); ?>

                            <?php endif; ?>
                        </td>
                        <td>
                            <a href="<?php echo e(route('support_ticket.admin_show', encrypt($ticket->id))); ?>" class="btn-link"><?php echo e(__('View Details')); ?></a>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>

    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/solage/public_html/puzzle.sola.ge/resources/views/support_tickets/index.blade.php ENDPATH**/ ?>