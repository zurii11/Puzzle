

<?php $__env->startSection('content'); ?>

<div class="cls-content-sm panel">
    <div class="panel-body">
        <h1 class="h3"><?php echo e(__('Reset Password')); ?></h1>
        <p class="pad-btm"><?php echo e(__('Enter your email address to recover your password.')); ?> </p>
        <form method="POST" action="<?php echo e(route('password.email')); ?>">
            <?php echo csrf_field(); ?>
            <div class="form-group">
                <input id="email" type="email" class="form-control<?php echo e($errors->has('email') ? ' is-invalid' : ''); ?>" name="email" value="<?php echo e(old('email')); ?>" required placeholder="Email">

                <?php if($errors->has('email')): ?>
                    <span class="invalid-feedback" role="alert">
                        <strong><?php echo e($errors->first('email')); ?></strong>
                    </span>
                <?php endif; ?>
            </div>
            <div class="form-group text-right">
                <button class="btn btn-danger btn-lg btn-block" type="submit">
                    <?php echo e(__('Send Password Reset Link')); ?>

                </button>
            </div>
        </form>
        <div class="pad-top">
            <a href="<?php echo e(route('user.login')); ?>" class="btn-link text-bold text-main"><?php echo e(__('Back to Login')); ?></a>
        </div>
    </div>
</div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.blank', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/puzzlege/public_html/resources/views/auth/passwords/email.blade.php ENDPATH**/ ?>