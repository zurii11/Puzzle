

<?php $__env->startSection('content'); ?>

<div class="col-lg-10 col-lg-offset-1 pad-btm mar-btm">
    <div class="panel">
        <div class="pad-all bg-gray-light">
            <h3 class="mar-no"><?php echo e($ticket->subject); ?> #<?php echo e($ticket->code); ?></h3>
             <ul class="mar-top list-inline">
                <li><?php echo e($ticket->user->name); ?></li>
                <li><?php echo e($ticket->created_at); ?></li>
                <li><span class="badge badge-pill badge-secondary"><?php echo e(ucfirst($ticket->status)); ?></span></li>
            </ul>
        </div>

        <div class="panel-body">
            <form class="" action="<?php echo e(route('support_ticket.admin_store')); ?>" method="post" id="ticket-reply-form" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <input type="hidden" name="ticket_id" value="<?php echo e($ticket->id); ?>" required>
                <input type="hidden" name="status" value="<?php echo e($ticket->status); ?>" required>
                <div class="form-group">
                    <textarea class="editor" name="reply" data-buttons="bold,underline,italic,|,ul,ol,|,paragraph,|,undo,redo" required></textarea>
                </div>
                <div class="form-group">
                    <input type="file" name="attachments[]" class="form-control" multiple>
                </div>
                <div class="form-group text-right pos-rel">
                    <button type="button" class="btn btn-primary" onclick="submit_reply('pending')">Submit as <strong><?php echo e(ucfirst($ticket->status)); ?></strong></button>
                    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-right">
                        <li onclick="submit_reply('open')"><a href="#">Submit as <strong>Open</strong></a></li>
                        <li onclick="submit_reply('solved')"><a href="#">Submit as <strong>Solved</strong></a></li>
                        <!-- default new ticket status pending. after admin first reply it will be open -->
                    </ul>
                </div>
            </form>
            <div class="pad-top">
                <?php $__currentLoopData = $ticket->ticketreplies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ticketreply): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="media bord-top pad-top">
                        <a class="media-left" href="#"><img loading="lazy"  class="img-circle img-sm" alt="Profile Picture" src="<?php echo e(asset($ticketreply->user->avatar_original)); ?>">
                        </a>
                        <div class="media-body">
                            <div class="comment-header">
                                <a href="#" class="media-heading box-inline text-main text-bold"><?php echo e($ticketreply->user->name); ?></a>
                                <p class="text-muted text-sm"><?php echo e($ticketreply->created_at); ?></p>
                            </div>
                            <div>
                                <?php
                                    echo $ticketreply->reply;
                                ?>
                                <?php if($ticketreply->files != null && is_array(json_decode($ticketreply->files))): ?>
                                    <div>
                                        <?php $__currentLoopData = json_decode($ticketreply->files); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div>
                                                <a href="<?php echo e(asset($file->path)); ?>" download="<?php echo e($file->name); ?>" class="support-file-attach bg-gray pad-all rounded">
                                                    <i class="fa fa-link mar-rgt"></i> <?php echo e($file->name); ?>

                                                </a>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <div class="media bord-top pad-top">
                    <a class="media-left" href="#"><img loading="lazy"  class="img-circle img-sm" alt="Profile Picture" src="<?php echo e(asset($ticket->user->avatar_original)); ?>">
                    </a>
                    <div class="media-body">
                        <div class="comment-header">
                            <a href="#" class="media-heading box-inline text-main text-bold"><?php echo e($ticket->user->name); ?></a>
                            <p class="text-muted text-sm"><?php echo e($ticket->created_at); ?></p>
                        </div>
                        <p>
                            <?php
                                echo $ticket->details;
                            ?>
                            <?php if($ticket->files != null && is_array(json_decode($ticket->files))): ?>
                                <div>
                                    <?php $__currentLoopData = json_decode($ticket->files); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div>
                                            <a href="<?php echo e(asset($file->path)); ?>" download="<?php echo e($file->name); ?>" class="support-file-attach bg-gray pad-all rounded">
                                                <i class="fa fa-link mar-rgt"></i> <?php echo e($file->name); ?>

                                            </a>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            <?php endif; ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script type="text/javascript">
        function submit_reply(status){
            $('input[name=status]').val(status);
            if($('textarea[name=reply]').val().length > 0){
                $('#ticket-reply-form').submit();
            }
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/puzzlege/public_html/resources/views/support_tickets/show.blade.php ENDPATH**/ ?>