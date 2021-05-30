

<?php $__env->startSection('content'); ?>
    <div class="cls-content-sm panel">
        <div class="panel-body">
            <h1 class="h3"><?php echo e(__('Reset Password')); ?></h1>
            <p class="pad-btm"><?php echo e(__('Enter your email address and new password and confirm password.')); ?> </p>
            <form method="POST" action="<?php echo e(route('password.update')); ?>">
                <?php echo csrf_field(); ?>

                <input type="hidden" name="token" value="<?php echo e($token); ?>">

                <div class="form-group">
                    <input id="email" type="email" class="form-control<?php echo e($errors->has('email') ? ' is-invalid' : ''); ?>" name="email" value="<?php echo e($email ?? old('email')); ?>" placeholder="Email" required autofocus>

                    <?php if($errors->has('email')): ?>
                        <span class="invalid-feedback" role="alert">
                            <strong><?php echo e($errors->first('email')); ?></strong>
                        </span>
                    <?php endif; ?>
                </div>

                <div class="form-group">
                    <input id="password" type="password" class="form-control<?php echo e($errors->has('password') ? ' is-invalid' : ''); ?>" name="password" placeholder="New Password" required>

                    <?php if($errors->has('password')): ?>
                        <span class="invalid-feedback" role="alert">
                            <strong><?php echo e($errors->first('password')); ?></strong>
                        </span>
                    <?php endif; ?>
                </div>

                <div class="form-group">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" required>
                </div>

                <div class="form-group text-right">
                    <button type="submit" class="btn btn-primary btn-lg btn-block">
                        <?php echo e(__('Reset Password')); ?>

                    </button>
                </div>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.blank', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/solage/public_html/puzzle.sola.ge/resources/views/auth/passwords/reset.blade.php ENDPATH**/ ?>