<?php $__env->startSection('content'); ?>

    <div id="page-content">
        <section class="slice-xs sct-color-2 border-bottom">
            <div class="container container-sm">
                <div class="row cols-delimited justify-content-center">
                    <div class="col-3">
                    <a href="<?php echo e(route('cart')); ?>">
                        <div class="icon-block icon-block--style-1-v5 text-center">
                            <div class="block-icon c-gray-light mb-0">
                                <i class="la la-shopping-cart"></i>
                            </div>
                            <div class="block-content d-none d-md-block">
                                <h3 class="heading heading-sm strong-300 c-gray-light text-capitalize">1. <?php echo e(__('My Cart')); ?></h3>
                            </div>
                        </div>
                    </a> 
                    </div>
                    <div class="col-3">
                    <a href="<?php echo e(route('checkout.shipping_info')); ?>">
                        <div class="icon-block icon-block--style-1-v5 text-center active">
                            <div class="block-icon mb-0">
                                <i class="la la-truck"></i>
                            </div>
                            <div class="block-content d-none d-md-block">
                                <h3 class="heading heading-sm strong-300 c-gray-light text-capitalize">2. <?php echo e(__('Shipping info')); ?></h3>
                            </div>
                        </div>
                    </a> 
                    </div>

                    <div class="col-3">
                    <a href="<?php echo e(route('checkout.payment_info')); ?>">
                        <div class="icon-block icon-block--style-1-v5 text-center">
                            <div class="block-icon c-gray-light mb-0">
                                <i class="la la-credit-card"></i>
                            </div>
                            <div class="block-content d-none d-md-block">
                                <h3 class="heading heading-sm strong-300 c-gray-light text-capitalize">3. <?php echo e(__('Payment')); ?></h3>
                            </div>
                        </div>
                    </a> 
                    </div>
                </div>
            </div>
        </section>

        <section class="py-4 gry-bg">
            <div class="container">
                <div class="row cols-xs-space cols-sm-space cols-md-space">
                    <div class="col-lg-8">
                        <form class="form-default" data-toggle="validator" action="<?php echo e(route('checkout.store_shipping_infostore')); ?>" role="form" method="POST">
                            <?php echo csrf_field(); ?>
                            <div class="card">
                                <?php if(Auth::check()): ?>
                                    <?php
                                        $user = Auth::user();
                                    ?>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label"><?php echo e(__('Name')); ?></label>
                                                    <input type="text" class="form-control" name="name" value="<?php echo e($user->name); ?>" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label"><?php echo e(__('Email')); ?></label>
                                                    <input type="email" class="form-control" name="email" value="<?php echo e($user->email); ?>" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group has-feedback">
                                                    <label class="control-label"><?php echo e(__('Region')); ?></label>
                                                    <input type="text" class="form-control" value="<?php echo e(__($user->region)); ?>" name="region" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group has-feedback">
                                                    <label class="control-label"><?php echo e(__('City')); ?></label>
                                                    <input type="text" class="form-control" value="<?php echo e($user->city); ?>" name="city" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label"><?php echo e(__('Address')); ?></label>
                                                    <input type="text" class="form-control" name="address" value="<?php echo e($user->address); ?>" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group has-feedback">
                                                    <label class="control-label"><?php echo e(__('Phone')); ?></label>
                                                    <input type="number" min="0" class="form-control" value="<?php echo e($user->phone); ?>" name="phone" required>
                                                </div>
                                            </div>
                                        </div>

                                        <input type="hidden" name="checkout_type" value="logged">
                                    </div>
                                <?php else: ?>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="control-label"><?php echo e(__('Name')); ?></label>
                                                    <input type="text" class="form-control" name="name" placeholder="<?php echo e(__('Name')); ?>" required>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="control-label"><?php echo e(__('Email')); ?></label>
                                                    <input type="text" class="form-control" name="email" placeholder="<?php echo e(__('Email')); ?>" required>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="control-label"><?php echo e(__('Address')); ?></label>
                                                    <input type="text" class="form-control" name="address" placeholder="<?php echo e(__('Address')); ?>" required>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label"><?php echo e(__('Select your country')); ?></label>
                                                    <select class="form-control custome-control" data-live-search="true" name="country">
                                                        <?php $__currentLoopData = \App\Country::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option value="<?php echo e($country->name); ?>"><?php echo e($country->name); ?></option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group has-feedback">
                                                    <label class="control-label"><?php echo e(__('City')); ?></label>
                                                    <input type="text" class="form-control" placeholder="<?php echo e(__('City')); ?>" name="city" required>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group has-feedback">
                                                    <label class="control-label"><?php echo e(__('Postal code')); ?></label>
                                                    <input type="number" min="0" class="form-control" placeholder="<?php echo e(__('Postal code')); ?>" name="postal_code" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group has-feedback">
                                                    <label class="control-label"><?php echo e(__('Phone')); ?></label>
                                                    <input type="number" min="0" class="form-control" placeholder="<?php echo e(__('Phone')); ?>" name="phone" required>
                                                </div>
                                            </div>
                                        </div>

                                        <input type="hidden" name="checkout_type" value="guest">
                                    </div>
                                <?php endif; ?>
                            </div>

                            <div class="row align-items-center pt-4">
                                <div class="col-md-6">
                                    <a href="#" onclick="history.go(-1)" class="link link--style-3">
                                        <i class="ion-android-arrow-back"></i>
                                        <?php echo e(__('Return to shop')); ?>

                                    </a>
                                </div>
                                <div class="col-md-6 text-right">
                                    <button type="submit" class="btn btn-styled btn-base-1"><?php echo e(__('Continue to Delivery Info')); ?></a>
                                </div>
                            </div>
                            
                        </form>
                    </div>

                    <div class="col-lg-4 ml-lg-auto">
                        <?php echo $__env->make('frontend.partials.cart_summary', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                </div>
            </div>
        </section>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/puzzle/public_html/resources/views/frontend/shipping_info.blade.php ENDPATH**/ ?>