<?php $__env->startSection('content'); ?>
	    <section class="mb-3" style="margin-top: 15px;">
            <div class="row caoruselpaddingcat">
                <div class="col-lg-12">
                    <div class="row gutters-5"> 
                        <?php $__currentLoopData = \App\Category::orderby('sortnum', 'DESC')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                        <?php 
                        $background_colors = array('itemhovercolor1', 'itemhovercolor2', 'itemhovercolor3', 'itemhovercolor4');
                        $rand_background = $background_colors[array_rand($background_colors)];
                        ?> 
                            <div class="mb-2 col-lg-2 col-6 col-sm-2 col-xs-2">
                                <a href="<?php echo e(route('subcategory', $category->id)); ?>" class="bg-white d-block c-base-2 box-2 icon-anim">
                                    <div class="row align-items-center no-gutters itemhover <?php echo $rand_background; ?>">
                                        <div class="col-12 text-center">
                                            <!-- data-alt-src="<?php echo e(asset($category->bannerhover)); ?>" -->
                                            <img loading="lazy"  src="<?php echo e(asset($category->banner)); ?>" alt="" class="categoryimage xyzhover" style="border-radius: 10px;">
                                        </div>
                                        <div class="info col-12">
                                            <div class="name text-truncate pl-3 pr-3 pb-3" style="text-align: center;"><?php echo e($category->name); ?></div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
    </section>
    
    <section class="mb-3 py-4">
        <div class="container">
            <div class="row gutters-10">
                <div class="col-lg-6">
                    <div class="section-title-1 clearfix">
                        <h3 class="heading-5 strong-700 mb-0 float-left">
                            <span class="mr-4"><?php echo e(__('Top Catogories')); ?></span>
                        </h3>
                    </div>
                    <div class="row gutters-5"> 
                        <?php $__currentLoopData = \App\Category::where('top', 1)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="mb-3 col-6">
                                <a href="<?php echo e(route('products.category', $category->slug)); ?>" class="bg-white border d-block c-base-2 box-2 icon-anim pl-2">
                                    <div class="row align-items-center no-gutters">
                                        <div class="col-3 text-center">
                                            <img loading="lazy"  src="<?php echo e(asset($category->banner)); ?>" alt="" class="img-fluid img">
                                        </div>
                                        <div class="info col-7">
                                            <div class="name text-truncate pl-3 py-4"><?php echo e(__($category->name)); ?></div>
                                        </div>
                                        <div class="col-2">
                                            <i class="la la-angle-right c-base-1"></i>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="section-title-1 clearfix">
                        <h3 class="heading-5 strong-700 mb-0 float-left">
                            <span class="mr-4"><?php echo e(__('Top Brands')); ?></span>
                        </h3>
                    </div>
                    <div class="row">
                        <?php $__currentLoopData = \App\Brand::where('top', 1)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="mb-3 col-6">
                                <a href="<?php echo e(route('products.brand', $brand->slug)); ?>" class="bg-white border d-block c-base-2 box-2 icon-anim pl-2">
                                    <div class="row align-items-center no-gutters">
                                        <div class="col-3 text-center">
                                            <img loading="lazy"  src="<?php echo e(asset($brand->logo)); ?>" alt="" class="img-fluid img">
                                        </div>
                                        <div class="info col-7">
                                            <div class="name text-truncate pl-3 py-4"><?php echo e(__($brand->name)); ?></div>
                                        </div>
                                        <div class="col-2">
                                            <i class="la la-angle-right c-base-1"></i>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>

    </section>
	<section class="slice-sm footer-top-bar bg-white">
    <div class="container sct-inner">
        <div class="row no-gutters">
            <div class="col-lg-3 col-md-6">
                <div class="footer-top-box text-center">
                    <a href="<?php echo e(route('sellerpolicy')); ?>">
                        <i class="la la-file-text"></i>
                        <h4 class="heading-5"><?php echo e(__('Seller Policy')); ?></h4>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="footer-top-box text-center">
                    <a href="<?php echo e(route('returnpolicy')); ?>">
                        <i class="la la-mail-reply"></i>
                        <h4 class="heading-5"><?php echo e(__('Return Policy')); ?></h4>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="footer-top-box text-center">
                    <a href="<?php echo e(route('supportpolicy')); ?>">
                        <i class="la la-support"></i>
                        <h4 class="heading-5"><?php echo e(__('Support Policy')); ?></h4>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="footer-top-box text-center">
                    <a href="<?php echo e(route('profile')); ?>">
                        <i class="la la-dashboard"></i>
                        <h4 class="heading-5"><?php echo e(__('My Profile')); ?></h4>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Puzzle\resources\views/frontend/index.blade.php ENDPATH**/ ?>