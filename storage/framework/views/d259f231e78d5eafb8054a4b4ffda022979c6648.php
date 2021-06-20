



<!-- FOOTER -->
<footer id="footer" class="footer">
    <div class="footer-top">
        <div class="container">
            <div class="row cols-xs-space cols-sm-space cols-md-space">
                <?php
                    $generalsetting = \App\GeneralSetting::first();
                ?>
                <div class="col-lg-5 col-xl-4 text-center text-md-left">
                    <div class="col">
                        <div class="d-inline-block d-md-block">
                            <form class="form-inline" method="POST" action="<?php echo e(route('subscribers.store')); ?>">
                                <?php echo csrf_field(); ?>
                                <div class="form-group mb-0">
                                    <input type="email" class="form-control" placeholder="<?php echo e(__('Your Email Address')); ?>" name="email" required>
                                </div>
                                <button type="submit" class="btn btn-base-1 btn-icon-left">
                                    <?php echo e(__('Subscribe')); ?>

                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 offset-xl-1 col-md-4">
                    <div class="col text-center text-md-left">
                        <ul class="footer-links contact-widget">
                            <li>
                               <span class="d-block opacity-9"><?php echo e(__('Address')); ?>:</span>
                               <span class="d-block"><?php echo e($generalsetting->address); ?></span>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4">
                    <div class="col text-center text-md-left">
                        <ul class="footer-links contact-widget">
                            <li>
                               <span class="d-block opacity-9"><?php echo e(__('Phone')); ?>:</span>
                               <span class="d-block"><?php echo e($generalsetting->phone); ?></span>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4 col-lg-2">
                    <div class="col text-center text-md-left">
                        <ul class="footer-links contact-widget">
                            <li>
                               <span class="d-block opacity-9"><?php echo e(__('Email')); ?>:</span>
                               <span class="d-block"><?php echo e($generalsetting->email); ?></span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div> 
        </div>
    </div>

    <div class="footer-bottom py-3 sct-color-3">
        <div class="container">
            <div class="row row-cols-xs-spaced flex flex-items-xs-middle">
                <div class="col-md-4">
                    <div class="copyright text-center text-md-left">
                        <ul class="copy-links no-margin">
                            <li>
                                © <?php echo e(date('Y')); ?> <?php echo e($generalsetting->site_name); ?>

                            </li>
                            <li>
                                <a href="<?php echo e(route('terms')); ?>"><?php echo e(__('Terms')); ?></a>
                            </li>
                            <li>
                                <a href="<?php echo e(route('privacypolicy')); ?>"><?php echo e(__('Privacy policy')); ?></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4">
                    <ul class="text-center my-3 my-md-0 social-nav model-2">
                        <?php if($generalsetting->facebook != null): ?>
                            <li>
                                <a href="<?php echo e($generalsetting->facebook); ?>" class="facebook" target="_blank" data-toggle="tooltip" data-original-title="Facebook">
                                    <i class="fa fa-facebook"></i>
                                </a>
                            </li>
                        <?php endif; ?>
                        <?php if($generalsetting->instagram != null): ?>
                            <li>
                                <a href="<?php echo e($generalsetting->instagram); ?>" class="instagram" target="_blank" data-toggle="tooltip" data-original-title="Instagram">
                                    <i class="fa fa-instagram"></i>
                                </a>
                            </li>
                        <?php endif; ?>
                        <?php if($generalsetting->twitter != null): ?>
                            <li>
                                <a href="<?php echo e($generalsetting->twitter); ?>" class="twitter" target="_blank" data-toggle="tooltip" data-original-title="Twitter">
                                    <i class="fa fa-twitter"></i>
                                </a>
                            </li>
                        <?php endif; ?>
                        <?php if($generalsetting->youtube != null): ?>
                            <li>
                                <a href="<?php echo e($generalsetting->youtube); ?>" class="youtube" target="_blank" data-toggle="tooltip" data-original-title="Youtube">
                                    <i class="fa fa-youtube"></i>
                                </a>
                            </li>
                        <?php endif; ?>
                        <?php if($generalsetting->google_plus != null): ?>
                            <li>
                                <a href="<?php echo e($generalsetting->google_plus); ?>" class="google-plus" target="_blank" data-toggle="tooltip" data-original-title="Google Plus">
                                    <i class="fa fa-google-plus"></i>
                                </a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
                <div class="col-md-4">
                    <div class="text-center text-md-right">
                        <ul class="inline-links">
                            <?php if(\App\BusinessSetting::where('type', 'paypal_payment')->first()->value == 1): ?>
                                <li>
                                    <img loading="lazy"  src="<?php echo e(asset('frontend/images/icons/cards/paypal.png')); ?>" height="20">
                                </li>
                            <?php endif; ?>
                            <?php if(\App\BusinessSetting::where('type', 'stripe_payment')->first()->value == 1): ?>
                                <li>
                                    <img loading="lazy"  src="<?php echo e(asset('frontend/images/icons/cards/stripe.png')); ?>" height="20">
                                </li>
                            <?php endif; ?>
                            <?php if(\App\BusinessSetting::where('type', 'sslcommerz_payment')->first()->value == 1): ?>
                                <li>
                                    <img loading="lazy"  src="<?php echo e(asset('frontend/images/icons/cards/sslcommerz.png')); ?>" height="20">
                                </li>
                            <?php endif; ?>
                            <?php if(\App\BusinessSetting::where('type', 'instamojo_payment')->first()->value == 1): ?>
                                <li>
                                    <img loading="lazy"  src="<?php echo e(asset('frontend/images/icons/cards/instamojo.png')); ?>" height="20">
                                </li>
                            <?php endif; ?>
                            <?php if(\App\BusinessSetting::where('type', 'razorpay')->first()->value == 1): ?>
                                <li>
                                    <img loading="lazy"  src="<?php echo e(asset('frontend/images/icons/cards/rozarpay.png')); ?>" height="20">
                                </li>
                            <?php endif; ?>
                            <?php if(\App\BusinessSetting::where('type', 'paystack')->first()->value == 1): ?>
                                <li>
                                    <img loading="lazy"  src="<?php echo e(asset('frontend/images/icons/cards/paystack.png')); ?>" height="20">
                                </li>
                            <?php endif; ?>
                            <?php if(\App\BusinessSetting::where('type', 'cash_payment')->first()->value == 1): ?>
                                <li>
                                    <img loading="lazy"  src="<?php echo e(asset('frontend/images/icons/cards/voguetras.png')); ?>" height="20">
                                </li>
                                <li>
                                    <img loading="lazy"  src="<?php echo e(asset('frontend/images/icons/cards/vogue.png')); ?>" height="20">
                                </li>
                                <li>
                                    <img loading="lazy"  src="<?php echo e(asset('frontend/images/icons/cards/cod.png')); ?>" height="20">
                                </li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<?php /**PATH C:\xampp\htdocs\Puzzle\resources\views/frontend/inc/footer.blade.php ENDPATH**/ ?>