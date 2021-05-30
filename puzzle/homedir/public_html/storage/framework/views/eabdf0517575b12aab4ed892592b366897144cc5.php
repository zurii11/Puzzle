

<?php $__env->startSection('content'); ?>
    <section class="gry-bg py-4">
        <div class="profile">
            <div class="container">
                <div class="row">
                    <div class="col-xl-10 offset-xl-1">
                        <div class="card">
                            <div class="text-center px-35 pt-5">
                                <h3 class="heading heading-4 strong-500">
                                    <?php echo e(__('Create an account.')); ?>

                                </h3>
                            </div>
                            <div class="px-5 py-3 py-lg-5">
                                <div class="row align-items-center">
                                    <div class="col-12 col-lg">
                                        <form class="form-default" role="form" action="<?php echo e(route('register')); ?>" method="POST">
                                            <?php echo csrf_field(); ?>
                                            <div class="row">
                                                <div class="col-6">
													<div class="form-group"> 
														<select id="profile_type2" name="profile_type" class="form-control" style="height: 47px; color: #b1b1b1;">
																<option value="1">ფიზიკური პირი</option>
																<option value="2">იურიდიული პირი</option>
														</select>
													</div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <div class="input-group input-group--style-1">
                                                            <input id="regname2" type="text" class="form-control<?php echo e($errors->has('name') ? ' is-invalid' : ''); ?>" placeholder="სახელი გვარი" name="name">
                                                            <span class="input-group-addon">
                                                                <i class="text-md la la-user"></i>
                                                            </span>
                                                            <?php if($errors->has('name')): ?>
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong><?php echo e($errors->first('name')); ?></strong>
                                                                </span>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <div class="input-group input-group--style-1">
                                                            <input id="regtypeid2" type="text" class="form-control<?php echo e($errors->has('usertype_id') ? ' is-invalid' : ''); ?>" placeholder="პირადი ნომერი" name="usertype_id">
                                                            <span class="input-group-addon">
                                                                <i class="text-md la la-user"></i>
                                                            </span>
                                                            <?php if($errors->has('usertype_id')): ?>
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong><?php echo e($errors->first('usertype_id')); ?></strong>
                                                                </span>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <div class="input-group input-group--style-1">
                                                            <input type="text" class="form-control<?php echo e($errors->has('phone') ? ' is-invalid' : ''); ?>" placeholder="მობილური" name="phone">
                                                            <span class="input-group-addon">
                                                                <i class="text-md la la-phone"></i>
                                                            </span>
                                                            <?php if($errors->has('phone')): ?>
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong><?php echo e($errors->first('phone')); ?></strong>
                                                                </span>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-6">
													<div class="form-group">
													  <select id="filter_region2" name="region" class="form-control" style="height: 47px; color: #b1b1b1;">
														    <option value="">რეგიონი</option>
															<option value="adjara">აჭარა</option>
															<option value="guria">გურია</option>
															<option value="tbilisi">თბილისი</option>
															<option value="imereti">იმერეთი</option>
															<option value="samegrelo">სამეგრელო</option>
															<option value="qvemokartli">ქვემო ქართლი</option>
														</select>
													</div>
                                                </div>
                                                <div class="col-6">
													<div class="form-group">
													  <select id="filter_city2" name="city" class="form-control" style="height: 47px; color: #b1b1b1;">
														    <option value="">ქალაქი</option>
														</select>
													</div>
                                                </div>
                                                <div class="col-12"> 
													<div class="form-group">
                                                        <!-- <label><?php echo e(__('name')); ?></label> -->
                                                        <div class="input-group input-group--style-1">
                                                            <input type="text" class="form-control<?php echo e($errors->has('address') ? ' is-invalid' : ''); ?>" value="<?php echo e(old('address')); ?>" placeholder="<?php echo e(__('Address')); ?>" name="address">
                                                            <span class="input-group-addon">
                                                                <i class="text-md la la-map"></i>
                                                            </span>
                                                            <?php if($errors->has('address')): ?>
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong><?php echo e($errors->first('address')); ?></strong>
                                                                </span>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <!-- <label><?php echo e(__('email')); ?></label> -->
                                                        <div class="input-group input-group--style-1">
                                                            <input type="email" class="form-control<?php echo e($errors->has('email') ? ' is-invalid' : ''); ?>" value="<?php echo e(old('email')); ?>" placeholder="<?php echo e(__('Email')); ?>" name="email">
                                                            <span class="input-group-addon">
                                                                <i class="text-md la la-envelope"></i>
                                                            </span>
                                                            <?php if($errors->has('email')): ?>
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong><?php echo e($errors->first('email')); ?></strong>
                                                                </span>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <!-- <label><?php echo e(__('password')); ?></label> -->
                                                        <div class="input-group input-group--style-1">
                                                            <input type="password" class="form-control<?php echo e($errors->has('password') ? ' is-invalid' : ''); ?>" placeholder="<?php echo e(__('Password')); ?>" name="password">
                                                            <span class="input-group-addon">
                                                                <i class="text-md la la-lock"></i>
                                                            </span>
                                                            <?php if($errors->has('password')): ?>
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong><?php echo e($errors->first('password')); ?></strong>
                                                                </span>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <!-- <label><?php echo e(__('confirm_password')); ?></label> -->
                                                        <div class="input-group input-group--style-1">
                                                            <input type="password" class="form-control" placeholder="<?php echo e(__('Confirm Password')); ?>" name="password_confirmation">
                                                            <span class="input-group-addon">
                                                                <i class="text-md la la-lock"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <div class="g-recaptcha" data-sitekey="<?php echo e(env('CAPTCHA_KEY')); ?>">
                                                            <?php if($errors->has('g-recaptcha-response')): ?>
                                                                <span class="invalid-feedback" style="display:block">
                                                                    <strong><?php echo e($errors->first('g-recaptcha-response')); ?></strong>
                                                                </span>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="checkbox pad-btm text-left">
                                                        <input class="magic-checkbox" type="checkbox" name="checkbox_example_1" id="checkboxExample_1a" required>
                                                        <label for="checkboxExample_1a" class="text-sm"><?php echo e(__('By signing up you agree to our terms and conditions.')); ?></label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row align-items-center">
                                                <div class="col-12 text-right  mt-3">
                                                    <button type="submit" class="btn btn-styled btn-base-1 w-100 btn-md"><?php echo e(__('Create Account')); ?></button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center px-35 pb-3">
                                <p class="text-md">
                                    <?php echo e(__('Already have an account?')); ?>test<a href="<?php echo e(route('user.login')); ?>" class="strong-600"><?php echo e(__('Log In')); ?></a>
                                </p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script type="text/javascript">
        function autoFillSeller(){
            $('#email').val('seller@example.com');
            $('#password').val('123456');
        }
        function autoFillCustomer(){
            $('#email').val('customer@example.com');
            $('#password').val('123456');
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/puzzlege/public_html/resources/views/frontend/user_registration.blade.php ENDPATH**/ ?>