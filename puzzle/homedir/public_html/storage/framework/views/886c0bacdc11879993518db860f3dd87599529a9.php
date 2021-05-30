

<?php $__env->startSection('content'); ?>
<section class="gry-bg py-4 profile">
        <div class="container">
            <div class="row cols-xs-space cols-sm-space cols-md-space">
                <div class="col-lg-3 d-none d-lg-block">
                    <?php if(Auth::user()->user_type == 'seller'): ?>
                        <?php echo $__env->make('frontend.inc.seller_side_nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php elseif(Auth::user()->user_type == 'customer'): ?>
                        <?php echo $__env->make('frontend.inc.customer_side_nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php endif; ?>
                </div>

                <div class="col-lg-9">
                    <div class="main-content">
                        <div class="card">
                            <div class="card-header py-3">
                                <h3 class="heading-5"><?php echo e($ticket->subject); ?> #<?php echo e($ticket->code); ?></h3>
                                <ul class="list-inline alpha-6 mb-0">
                                    <li class="list-inline-item"><?php echo e(date('h:i:m A d-m-Y', strtotime($ticket->created_at))); ?></li>
                                    <li class="list-inline-item"><span class="badge badge-pill badge-secondary">Open</span></li>
                                </ul>
                            </div>
                            <div class="card-body">
                                <div class="border-bottom pb-4">
                                    <form class="" action="<?php echo e(route('support_ticket.seller_store')); ?>" method="POST" enctype="multipart/form-data">
                                        <?php echo csrf_field(); ?>
                                        <input type="hidden" name="ticket_id" value="<?php echo e($ticket->id); ?>">
                                        <input type="hidden" name="user_id" value="<?php echo e($ticket->user_id); ?>">
                                        <div class="form-group">
                                            <textarea class="form-control editor" name="reply" placeholder="<?php echo e(__('type product description')); ?>" data-buttons="bold,underline,italic,|,ul,ol,|,paragraph,|,undo,redo"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <input type="file" name="attachments[]" id="file-2" class="custom-input-file custom-input-file--2" data-multiple-caption="{count} files selected" multiple /> 
                                            <label for="file-2" class=" mw-100 mb-0">
                                                <i class="fa fa-upload"></i>
                                                <span><?php echo e(__('Attach files')); ?>.</span>
                                            </label>
                                        </div>
                                        <div class="text-right">
                                            <button type="submit" class="btn btn-base-1"><?php echo e(__('Send Reply')); ?></button>
                                        </div>
                                    </form>
                                </div>
                                <div class="pt-4">
                                    <?php $__currentLoopData = $ticket_replies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ticketreply): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($ticket->user_id == $ticketreply->user_id): ?>
                                            <div class="block block-comment mb-3 border-0">
                                                <div class="d-flex flex-row-reverse">
                                                    <div class="pl-3">
                                                        <div class="block-image d-block size-40" data-toggle="tooltip" data-title="<?php echo e($ticketreply->user->name); ?>">
                                                            <img loading="lazy"  src="<?php echo e(asset($ticketreply->user->avatar_original)); ?>" class="rounded-circle">
                                                        </div>
                                                    </div>
                                                    <div class="flex-grow-1 ml-5 pl-5">
                                                        <div class="p-3 bg-gray rounded">
                                                            <?php echo $ticketreply->reply; ?>
                                                            <?php if($ticketreply->files != null && is_array(json_decode($ticketreply->files))): ?>
                                                                <div class="mt-3 clearfix">
                                                                    <?php $__currentLoopData = json_decode($ticketreply->files); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                        <div class="float-right bg-white p-2 rounded ml-2">
                                                                            <a href="<?php echo e(asset($file->path)); ?>" download="<?php echo e($file->name); ?>" class="file-preview d-block text-black-50" style="width:100px">
                                                                                <div class="text-center h4">
                                                                                    <i class="la la-file"></i>
                                                                                </div>
                                                                                <div class="d-flex">
                                                                                    <div class="flex-grow-1 minw-0">
                                                                                        <div class="text-truncate">
                                                                                            <?php echo e(explode('.', $file->name)[0]); ?>

                                                                                        </div>
                                                                                    </div>
                                                                                    <div>
                                                                                        .<?php echo e(explode('.', $file->name)[1]); ?>

                                                                                    </div>
                                                                                </div>
                                                                            </a>
                                                                        </div>
                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                </div>
                                                            <?php endif; ?>
                                                        </div>
                                                        <span class="comment-date alpha-5 text-sm mt-1 d-block text-right">
                                                            <?php echo e(date('h:i:m d-m-Y', strtotime($ticketreply->created_at))); ?>

                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php else: ?>
                                            <div class="block block-comment mb-3 border-0">
                                                <div class="d-flex">
                                                    <div class="pr-3">
                                                        <div class="block-image d-block size-40" data-toggle="tooltip" data-title="<?php echo e($ticketreply->user->name); ?>">
                                                            <img loading="lazy"  src="<?php echo e(asset($ticketreply->user->avatar_original)); ?>" class="rounded-circle" data-toggle="tooltip" data-title="fsdfsf">
                                                        </div>
                                                    </div>
                                                    <div class="flex-grow-1 mr-5 pr-5">
                                                        <div class="p-3 bg-gray rounded">
                                                            <?php echo $ticketreply->reply; ?>
                                                            <?php if($ticketreply->files != null && is_array(json_decode($ticketreply->files))): ?>
                                                                <div class="mt-3 clearfix">
                                                                    <?php $__currentLoopData = json_decode($ticketreply->files); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                        <div class="float-right bg-white p-2 rounded ml-2">
                                                                            <a href="<?php echo e(asset($file->path)); ?>" download="<?php echo e($file->name); ?>" class="file-preview d-block text-black-50" style="width:100px">
                                                                                <div class="text-center h4">
                                                                                    <i class="la la-file"></i>
                                                                                </div>
                                                                                <div class="d-flex">
                                                                                    <div class="flex-grow-1 minw-0">
                                                                                        <div class="text-truncate">
                                                                                            <?php echo e(explode('.', $file->name)[0]); ?>

                                                                                        </div>
                                                                                    </div>
                                                                                    <div>
                                                                                        .<?php echo e(explode('.', $file->name)[1]); ?>

                                                                                    </div>
                                                                                </div>
                                                                            </a>
                                                                        </div>
                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                </div>
                                                            <?php endif; ?>
                                                        </div>
                                                        <span class="comment-date alpha-5 text-sm mt-1 d-block">
                                                            <?php echo e(date('h:i:m d-m-Y', strtotime($ticketreply->created_at))); ?>

                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <div class="block block-comment mb-3 border-0">
                                        <div class="d-flex flex-row-reverse">
                                            <div class="pl-3">
                                                <div class="block-image d-block size-40">
                                                    <img loading="lazy"  src="<?php echo e(asset($ticket->user->avatar_original)); ?>" class="rounded-circle">
                                                </div>
                                            </div>
                                            <div class="flex-grow-1 ml-5 pl-5">
                                                <div class="p-3 bg-gray rounded">
                                                    <?php echo $ticket->details; ?>
                                                    <?php if($ticket->files != null && is_array(json_decode($ticket->files))): ?>
                                                        <div class="mt-3 clearfix">
                                                            <?php $__currentLoopData = json_decode($ticket->files); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <div class="float-right bg-white p-2 rounded ml-2">
                                                                    <a href="<?php echo e(asset($file->path)); ?>" download="<?php echo e($file->name); ?>" class="file-preview d-block text-black-50" style="width:100px">
                                                                        <div class="text-center h4">
                                                                            <i class="la la-file"></i>
                                                                        </div>
                                                                        <div class="d-flex">
                                                                            <div class="flex-grow-1 minw-0">
                                                                                <div class="text-truncate">
                                                                                    <?php echo e(explode('.', $file->name)[0]); ?>

                                                                                </div>
                                                                            </div>
                                                                            <div>
                                                                                .<?php echo e(explode('.', $file->name)[1]); ?>

                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                </div>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </div>
                                                    <?php endif; ?>
                                                </div>
                                                <span class="comment-date alpha-5 text-sm mt-1 d-block text-right">
                                                    <?php echo e(date('h:i:m d-m-Y', strtotime($ticket->created_at))); ?>

                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/puzzlege/public_html/resources/views/frontend/support_ticket/show.blade.php ENDPATH**/ ?>