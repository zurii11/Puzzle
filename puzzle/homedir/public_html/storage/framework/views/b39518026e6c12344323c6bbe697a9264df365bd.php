

<?php $__env->startSection('content'); ?>

<h3 class="text-center"><?php echo e(__('Maintenance Mode')); ?></h3>
<div class="row">
    <div class="col-lg-4">
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title text-center"><?php echo e(__('Maintenance Mode Activation')); ?></h3>
            </div>
            <div class="panel-body text-center">
                <label class="switch">
                    <input type="checkbox" onchange="updateSettings(this, 'maintenance_mode')" <?php if(\App\BusinessSetting::where('type', 'maintenance_mode')->first()->value == 1) echo "checked";?>>
                    <span class="slider round"></span>
                </label>
            </div>
        </div>
    </div>
</div>

<h3 class="text-center"><?php echo e(__('Business Related')); ?></h3>
<div class="row">
    <div class="col-lg-4">
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title text-center"><?php echo e(__('Vendor System Activation')); ?></h3>
            </div>
            <div class="panel-body text-center">
                <label class="switch">
                    <input type="checkbox" onchange="updateSettings(this, 'vendor_system_activation')" <?php if(\App\BusinessSetting::where('type', 'vendor_system_activation')->first()->value == 1) echo "checked";?>>
                    <span class="slider round"></span>
                </label>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title text-center"><?php echo e(__('Wallet System Activation')); ?></h3>
            </div>
            <div class="panel-body text-center">
                <label class="switch">
                    <input type="checkbox" onchange="updateSettings(this, 'wallet_system')" <?php if(\App\BusinessSetting::where('type', 'wallet_system')->first()->value == 1) echo "checked";?>>
                    <span class="slider round"></span>
                </label>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title text-center"><?php echo e(__('Coupon System Activation')); ?></h3>
            </div>
            <div class="panel-body text-center">
                <label class="switch">
                    <input type="checkbox" onchange="updateSettings(this, 'coupon_system')" <?php if(\App\BusinessSetting::where('type', 'coupon_system')->first()->value == 1) echo "checked";?>>
                    <span class="slider round"></span>
                </label>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-4">
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title text-center"><?php echo e(__('Pickup Point Activation')); ?></h3>
            </div>
            <div class="panel-body text-center">
                <label class="switch">
                    <input type="checkbox" onchange="updateSettings(this, 'pickup_point')" <?php if(\App\BusinessSetting::where('type', 'pickup_point')->first()->value == 1) echo "checked";?>>
                    <span class="slider round"></span>
                </label>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title text-center"><?php echo e(__('Email Verification')); ?></h3>
            </div>
            <div class="panel-body text-center">
                <label class="switch">
                    <input type="checkbox" onchange="updateSettings(this, 'email_verification')" <?php if(\App\BusinessSetting::where('type', 'email_verification')->first()->value == 1) echo "checked";?>>
                    <span class="slider round"></span>
                </label>
                <div class="alert" style="color: #004085;background-color: #cce5ff;border-color: #b8daff;margin-bottom:0;margin-top:10px;">
                    You need to configure SMTP correctly to enable this feature. <a href="<?php echo e(route('smtp_settings.index')); ?>">Configure Now</a>
                </div>
            </div>
        </div>
    </div>
</div>


<h3 class="text-center"><?php echo e(__('Payment Related')); ?></h3>
<div class="row">
    <div class="col-lg-4">
        <div class="panel">
            <div class="panel-heading text-center bord-btm">
                <h3 class="panel-title"><?php echo e(__('Paypal Payment Activation')); ?></h3>
            </div>
            <div class="panel-body">
                <div class="clearfix">
                    <img loading="lazy"  class="pull-left" src="<?php echo e(asset('frontend/images/icons/cards/paypal.png')); ?>" height="30">
                    <label class="switch pull-right">
                        <input type="checkbox" onchange="updateSettings(this, 'paypal_payment')" <?php if(\App\BusinessSetting::where('type', 'paypal_payment')->first()->value == 1) echo "checked";?>>
                        <span class="slider round"></span>
                    </label>
                </div>
                <div class="alert text-center" style="color: #004085;background-color: #cce5ff;border-color: #b8daff;margin-bottom:0;margin-top:10px;">
                    You need to configure Paypal correctly to enable this feature. <a href="<?php echo e(route('payment_method.index')); ?>">Configure Now</a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title text-center"><?php echo e(__('Stripe Payment Activation')); ?></h3>
            </div>
            <div class="panel-body text-center">
                <div class="clearfix">
                    <img loading="lazy"  class="pull-left" src="<?php echo e(asset('frontend/images/icons/cards/stripe.png')); ?>" height="30">
                    <label class="switch pull-right">
                        <input type="checkbox" onchange="updateSettings(this, 'stripe_payment')" <?php if(\App\BusinessSetting::where('type', 'stripe_payment')->first()->value == 1) echo "checked";?>>
                        <span class="slider round"></span>
                    </label>
                </div>
                <div class="alert" style="color: #004085;background-color: #cce5ff;border-color: #b8daff;margin-bottom:0;margin-top:10px;">
                    You need to configure Stripe correctly to enable this feature. <a href="<?php echo e(route('payment_method.index')); ?>">Configure Now</a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title text-center"><?php echo e(__('SSlCommerz Activation')); ?></h3>
            </div>
            <div class="panel-body text-center">
                <div class="clearfix">
                    <img loading="lazy"  class="pull-left" src="<?php echo e(asset('frontend/images/icons/cards/sslcommerz.png')); ?>" height="30">
                    <label class="switch pull-right">
                        <input type="checkbox" onchange="updateSettings(this, 'sslcommerz_payment')" <?php if(\App\BusinessSetting::where('type', 'sslcommerz_payment')->first()->value == 1) echo "checked";?>>
                        <span class="slider round"></span>
                    </label>
                </div>
                <div class="alert" style="color: #004085;background-color: #cce5ff;border-color: #b8daff;margin-bottom:0;margin-top:10px;">
                    You need to configure SSlCommerz correctly to enable this feature. <a href="<?php echo e(route('payment_method.index')); ?>">Configure Now</a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-4">
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title text-center"><?php echo e(__('Instamojo Payment Activation')); ?></h3>
            </div>
            <div class="panel-body text-center">
                <div class="clearfix">
                    <img loading="lazy"  class="pull-left" src="<?php echo e(asset('frontend/images/icons/cards/instamojo.png')); ?>" height="30">
                    <label class="switch pull-right">
                        <input type="checkbox" onchange="updateSettings(this, 'instamojo_payment')" <?php if(\App\BusinessSetting::where('type', 'instamojo_payment')->first()->value == 1) echo "checked";?>>
                        <span class="slider round"></span>
                    </label>
                </div>
                <div class="alert" style="color: #004085;background-color: #cce5ff;border-color: #b8daff;margin-bottom:0;margin-top:10px;">
                    You need to configure Instamojo Payment correctly to enable this feature. <a href="<?php echo e(route('payment_method.index')); ?>">Configure Now</a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title text-center"><?php echo e(__('Razor Pay Activation')); ?></h3>
            </div>
            <div class="panel-body text-center">
                <div class="clearfix">
                    <img loading="lazy"  class="pull-left" src="<?php echo e(asset('frontend/images/icons/cards/rozarpay.png')); ?>" height="30">
                    <label class="switch pull-right">
                        <input type="checkbox" onchange="updateSettings(this, 'razorpay')" <?php if(\App\BusinessSetting::where('type', 'razorpay')->first()->value == 1) echo "checked";?>>
                        <span class="slider round"></span>
                    </label>
                </div>
                <div class="alert" style="color: #004085;background-color: #cce5ff;border-color: #b8daff;margin-bottom:0;margin-top:10px;">
                    You need to configure Razor correctly to enable this feature. <a href="<?php echo e(route('payment_method.index')); ?>">Configure Now</a>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title text-center"><?php echo e(__('PayStack Activation')); ?></h3>
            </div>
            <div class="panel-body text-center">
                <div class="clearfix">
                    <img loading="lazy"  class="pull-left" src="<?php echo e(asset('frontend/images/icons/cards/paystack.png')); ?>" height="30">
                    <label class="switch pull-right">
                        <input type="checkbox" onchange="updateSettings(this, 'paystack')" <?php if(\App\BusinessSetting::where('type', 'paystack')->first()->value == 1) echo "checked";?>>
                        <span class="slider round"></span>
                    </label>
                </div>
                <div class="alert" style="color: #004085;background-color: #cce5ff;border-color: #b8daff;margin-bottom:0;margin-top:10px;">
                    You need to configure PayStack correctly to enable this feature. <a href="<?php echo e(route('payment_method.index')); ?>">Configure Now</a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-4">
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title text-center"><?php echo e(__('VoguePay Activation')); ?></h3>
            </div>
            <div class="panel-body text-center">
                <div class="clearfix">
                    <img loading="lazy"  class="pull-left" src="<?php echo e(asset('frontend/images/icons/cards/vogue.png')); ?>" height="30">
                    <label class="switch pull-right">
                        <input type="checkbox" onchange="updateSettings(this, 'voguepay')" <?php if(\App\BusinessSetting::where('type', 'voguepay')->first()->value == 1) echo "checked";?>>
                        <span class="slider round"></span>
                    </label>
                </div>
                <div class="alert" style="color: #004085;background-color: #cce5ff;border-color: #b8daff;margin-bottom:0;margin-top:10px;">
                    You need to configure VoguePay correctly to enable this feature. <a href="<?php echo e(route('payment_method.index')); ?>">Configure Now</a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title text-center"><?php echo e(__('Cash Payment Activation')); ?></h3>
            </div>
            <div class="panel-body text-center">
                <div class="clearfix">
                    <img loading="lazy"  class="pull-left" src="<?php echo e(asset('frontend/images/icons/cards/cod.png')); ?>" height="30">
                    <label class="switch pull-right">
                        <input type="checkbox" onchange="updateSettings(this, 'cash_payment')" <?php if(\App\BusinessSetting::where('type', 'cash_payment')->first()->value == 1) echo "checked";?>>
                        <span class="slider round"></span>
                    </label>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <h3 class="text-center"><?php echo e(__('Social Media Login')); ?></h3>
    <div class="col-lg-4">
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title text-center"><?php echo e(__('Facebook login')); ?></h3>
            </div>
            <div class="panel-body text-center">
                <label class="switch">
                    <input type="checkbox" onchange="updateSettings(this, 'facebook_login')" <?php if(\App\BusinessSetting::where('type', 'facebook_login')->first()->value == 1) echo "checked";?>>
                    <span class="slider round"></span>
                </label>
                <div class="alert" style="color: #004085;background-color: #cce5ff;border-color: #b8daff;margin-bottom:0;margin-top:10px;">
                    You need to configure Facebook Client correctly to enable this feature. <a href="<?php echo e(route('social_login.index')); ?>">Configure Now</a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title text-center"><?php echo e(__('Google login')); ?></h3>
            </div>
            <div class="panel-body text-center">
                <label class="switch">
                    <input type="checkbox" onchange="updateSettings(this, 'google_login')" <?php if(\App\BusinessSetting::where('type', 'google_login')->first()->value == 1) echo "checked";?>>
                    <span class="slider round"></span>
                </label>
                <div class="alert" style="color: #004085;background-color: #cce5ff;border-color: #b8daff;margin-bottom:0;margin-top:10px;">
                    You need to configure Google Client correctly to enable this feature. <a href="<?php echo e(route('social_login.index')); ?>">Configure Now</a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title text-center"><?php echo e(__('Twitter login')); ?></h3>
            </div>
            <div class="panel-body text-center">
                <label class="switch">
                    <input type="checkbox" onchange="updateSettings(this, 'twitter_login')" <?php if(\App\BusinessSetting::where('type', 'twitter_login')->first()->value == 1) echo "checked";?>>
                    <span class="slider round"></span>
                </label>
                <div class="alert" style="color: #004085;background-color: #cce5ff;border-color: #b8daff;margin-bottom:0;margin-top:10px;">
                    You need to configure Twitter Client correctly to enable this feature. <a href="<?php echo e(route('social_login.index')); ?>">Configure Now</a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script type="text/javascript">
        function updateSettings(el, type){
            if($(el).is(':checked')){
                var value = 1;
            }
            else{
                var value = 0;
            }
            $.post('<?php echo e(route('business_settings.update.activation')); ?>', {_token:'<?php echo e(csrf_token()); ?>', type:type, value:value}, function(data){
                if(data == '1'){
                    showAlert('success', 'Settings updated successfully');
                }
                else{
                    showAlert('danger', 'Something went wrong');
                }
            });
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/solage/public_html/puzzle.sola.ge/resources/views/business_settings/activation.blade.php ENDPATH**/ ?>