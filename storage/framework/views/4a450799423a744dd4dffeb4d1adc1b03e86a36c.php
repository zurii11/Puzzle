<?php $__env->startSection('content'); ?>

	    <section class="mb-3">
            <div class="row caoruselpaddingcat">
			   <div class="col-xl-3 d-none d-xl-block">
                    <div class="bg-white sidebar-box mb-3">
                        <div class="box-title text-center">
                            <?php echo e(__('Categories')); ?>

                        </div>
                        <div class="box-content">
                            <div class="category-accordion">
                                <?php $__currentLoopData = \App\Category::orderby('sortnum', 'DESC')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="single-category">
										<a href="<?php echo url('/subcategory/');  echo '/'; echo $category->id; ?>">
											<button class="btn w-100 category-name collapsed" type="button" data-toggle="collapse" data-target="#category-<?php echo e($key); ?>" aria-expanded="true">
												<?php echo e(__($category->name)); ?> 
											</button>
										</a>

                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div> 
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="row gutters-5">
					
                        <?php $__currentLoopData = \App\SubCategory::where('category_id', $category_slug)->orderby('sortnum', 'ASC')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php 
                        $background_colors = array('itemhovercolor1', 'itemhovercolor2', 'itemhovercolor3', 'itemhovercolor4'); 
                        $rand_background = $background_colors[array_rand($background_colors)];
                        ?> 
                            <div class="mb-2 col-lg-2 col-md-2 col-6 col-sm-6 col-xs-2">
                                <a href="<?php echo e(route('products.subcategory', $category->slug)); ?>" class="bg-white itemhover <?php echo $rand_background; ?> d-block c-base-2 box-2 icon-anim">
                                    <div class="row align-items-center no-gutters">
                                        <div class="col-12 text-center">
                                            <img loading="lazy" data-alt-src="<?php echo e(asset($category->bannerhover)); ?>" src="<?php echo e(asset($category->banner)); ?>" alt="" class="categoryimage" style="border-radius: 10px;">
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/puzzle/public_html/resources/views/frontend/subcategory.blade.php ENDPATH**/ ?>