

<?php $__env->startSection('meta_title'); ?><?php echo e($product->meta_title); ?><?php $__env->stopSection(); ?>

<?php $__env->startSection('meta_description'); ?><?php echo e($product->meta_description); ?><?php $__env->stopSection(); ?>

<?php $__env->startSection('meta_keywords'); ?><?php echo e($product->tags); ?><?php $__env->stopSection(); ?>

<?php $__env->startSection('meta'); ?>
    <!-- Schema.org markup for Google+ -->
    <meta itemprop="name" content="<?php echo e($product->meta_title); ?>">
    <meta itemprop="description" content="<?php echo e($product->meta_description); ?>">
    <meta itemprop="image" content="<?php echo e(asset($product->meta_img)); ?>">

    <!-- Twitter Card data -->
    <meta name="twitter:card" content="product">
    <meta name="twitter:site" content="@publisher_handle">
    <meta name="twitter:title" content="<?php echo e($product->meta_title); ?>">
    <meta name="twitter:description" content="<?php echo e($product->meta_description); ?>">
    <meta name="twitter:creator" content="@author_handle">
    <meta name="twitter:image" content="<?php echo e(asset($product->meta_img)); ?>">
    <meta name="twitter:data1" content="<?php echo e(single_price($product->unit_price)); ?>">
    <meta name="twitter:label1" content="Price">

    <!-- Open Graph data -->
    <meta property="og:title" content="<?php echo e($product->meta_title); ?>" />
    <meta property="og:type" content="product" />
    <meta property="og:url" content="<?php echo e(route('product', $product->slug)); ?>" />
    <meta property="og:image" content="<?php echo e(asset($product->meta_img)); ?>" />
    <meta property="og:description" content="<?php echo e($product->meta_description); ?>" />
    <meta property="og:site_name" content="<?php echo e(env('APP_NAME')); ?>" />
    <meta property="og:price:amount" content="<?php echo e(single_price($product->unit_price)); ?>" />
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <!-- SHOP GRID WRAPPER -->
    <section class="product-details-area">
        <div class="container">

            <div class="bg-white">

                <!-- Product gallery and Description -->
                <div class="row no-gutters cols-xs-space cols-sm-space cols-md-space">
                    <div class="col-lg-6">
                        <div class="product-gal sticky-top d-flex flex-row-reverse">
                            <?php if(is_array(json_decode($product->photos)) && count(json_decode($product->photos)) > 0): ?>
                                <div class="product-gal-img">
                                    <img loading="lazy"  class="xzoom img-fluid" src="<?php echo e(asset(json_decode($product->photos)[0])); ?>" xoriginal="<?php echo e(asset(json_decode($product->photos)[0])); ?>" />
                                </div>
                                <div class="product-gal-thumb">
                                    <div class="xzoom-thumbs">
                                        <?php $__currentLoopData = json_decode($product->photos); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $photo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <a href="<?php echo e(asset($photo)); ?>">
                                                <img loading="lazy"  class="xzoom-gallery" width="80" src="<?php echo e(asset($photo)); ?>"  <?php if($key == 0): ?> xpreview="<?php echo e(asset($photo)); ?>" <?php endif; ?>>
                                            </a>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <!-- Product description -->
                        <div class="product-description-wrapper">
                            <!-- Product title -->
                            <h2 class="product-title">
                                <?php echo e(__($product->name)); ?>

                            </h2>
                            <ul class="breadcrumb">
                                <li><a href="<?php echo e(route('home')); ?>"><?php echo e(__('Home')); ?></a></li>
                                <li><a href="<?php echo e(route('categories.all')); ?>"><?php echo e(__('All Categories')); ?></a></li>
                                <li><a href="<?php echo e(route('products.category', $product->category->slug)); ?>"><?php echo e($product->category->name); ?></a></li>
                                <li><a href="<?php echo e(route('products.subcategory', $product->subcategory->slug)); ?>"><?php echo e($product->subcategory->name); ?></a></li>
                            </ul>

                            <div class="row">
                                <div class="col-6">
                                    <!-- Rating stars 
                                    <div class="rating mb-1">
                                        <?php
                                            $total = 0;
                                            $total += $product->reviews->count();
                                        ?>
                                        <span class="star-rating">
                                            <?php echo e(renderStarRating($product->rating)); ?>

                                        </span>
                                        <span class="rating-count">(<?php echo e($total); ?> <?php echo e(__('customer reviews')); ?>)</span>
                                    </div>
                                    <div class="sold-by">
                                        <small class="mr-2"><?php echo e(__('Sold by')); ?>: </small>
                                        <?php if($product->added_by == 'seller' && \App\BusinessSetting::where('type', 'vendor_system_activation')->first()->value == 1): ?>
                                            <a href="<?php echo e(route('shop.visit', $product->user->shop->slug)); ?>"><?php echo e($product->user->shop->name); ?></a>
                                        <?php else: ?>
                                            <?php echo e(__('Inhouse product')); ?>

                                        <?php endif; ?>
                                    </div>-->
                                </div>
								<!--
                                <div class="col-6 text-right">
                                    <ul class="inline-links inline-links--style-1">
                                        <?php
                                            $qty = 5000;
                                            if(is_array(json_decode($product->variations, true)) && !empty(json_decode($product->variations, true))){
                                                foreach (json_decode($product->variations) as $key => $variation) {
                                                    $qty = 5000; //$variation->qty;
                                                }
                                            }
                                            else{
                                                $qty = 5000; //$product->current_stock;
                                            }
                                        ?>
                                        <?php if($qty > 0): ?>
                                            <li>
                                                <span class="badge badge-md badge-pill bg-green"><?php echo e(__('In stock')); ?></span>
                                            </li>
                                        <?php else: ?>
                                            <li>
                                                <span class="badge badge-md badge-pill bg-red"><?php echo e(__('Out of stock')); ?></span>
                                            </li>
                                        <?php endif; ?>
                                    </ul>
                                </div>
								-->
                            </div>
                                <div class="row no-gutters mt-3">
                                    <div class="col-2">
                                        <div class="product-description-label"><?php echo e(__('Code')); ?>: <?php echo e(($product->productcode)); ?></div>
                                    </div>
                                </div> 
                            <?php if(home_price($product->id) != home_discounted_price($product->id)): ?>

                                <div class="row no-gutters mt-4">
                                    <div class="col-12">
                                        <div class="product-description-label"><?php echo e(__('Price')); ?>:</div>
                                    </div>
                                    <div class="col-10">
                                        <div class="product-price-old">
                                            <del>
                                                <?php echo e(home_price($product->id)); ?>

                                                <span>/<?php echo e(__('unit'.$product->unit)); ?></span>
                                            </del>
                                        </div>
                                    </div>
                                </div>

                                <div class="row no-gutters mt-3">
                                    <div class="col-2">
                                        <div class="product-description-label mt-1"><?php echo e(__('Discount Price')); ?>:</div>
                                    </div>
                                    <div class="col-10">
                                        <div class="product-price">
                                            <strong>
                                                <?php echo e(home_discounted_price($product->id)); ?>

                                            </strong>
                                            <span class="piece">/<?php echo e(__('unit'.$product->unit)); ?></span>
                                        </div>
                                    </div>
                                </div>
                            <?php else: ?>
                                <div class="row no-gutters mt-3">
                                    <div class="col-2">
                                        <div class="product-description-label"><?php echo e(__('Price')); ?>:</div>
                                    </div>
                                    <div class="col-10">
                                        <div class="product-price">
                                            <strong>
                                                <?php echo e(home_discounted_price($product->id)); ?>

                                            </strong>
                                            <span class="piece">/<?php echo e(__('unit'.$product->unit)); ?></span> 
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>

                            <hr>

                            <form id="option-choice-form">
                                <?php echo csrf_field(); ?>
                                <input type="hidden" name="id" value="<?php echo e($product->id); ?>">

                                <?php $__currentLoopData = json_decode($product->choice_options); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $choice): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                <div class="row no-gutters">
                                    <div class="col-2">
                                        <div class="product-description-label mt-2 "><?php echo e($choice->title); ?>:</div>
                                    </div>
                                    <div class="col-10">
                                        <ul class="list-inline checkbox-alphanumeric checkbox-alphanumeric--style-1 mb-2">
                                            <?php $__currentLoopData = $choice->options; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <li>
                                                    <input type="radio" id="<?php echo e($choice->name); ?>-<?php echo e($option); ?>" name="<?php echo e($choice->name); ?>" value="<?php echo e($option); ?>" <?php if($key == 0): ?> checked <?php endif; ?>>
                                                    <label for="<?php echo e($choice->name); ?>-<?php echo e($option); ?>"><?php echo e($option); ?></label>
                                                </li>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </ul>
                                    </div>
                                </div>

                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                <?php if(count(json_decode($product->colors)) > 0): ?>
                                    <div class="row no-gutters">
                                        <div class="col-2">
                                            <div class="product-description-label mt-2"><?php echo e(__('Color')); ?>:</div>
                                        </div>
                                        <div class="col-10">
                                            <ul class="list-inline checkbox-color mb-1">
                                                <?php $__currentLoopData = json_decode($product->colors); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $color): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <li>
                                                        <input type="radio" id="<?php echo e($product->id); ?>-color-<?php echo e($key); ?>" name="color" value="<?php echo e($color); ?>" <?php if($key == 0): ?> checked <?php endif; ?>>
                                                        <label style="background: <?php echo e($color); ?>;" for="<?php echo e($product->id); ?>-color-<?php echo e($key); ?>" data-toggle="tooltip"></label>
                                                    </li>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </ul>
                                        </div>
                                    </div>

                                    <hr>
                                <?php endif; ?>

                                <!-- Quantity + Add to cart -->
                                <div class="row no-gutters">
                                    <div class="col-2">
                                        <div class="product-description-label mt-2"><?php echo e(__('Quantity')); ?>:</div>
                                    </div>
                                    <div class="col-10">
                                        <div class="product-quantity d-flex align-items-center">
                                            <div class="input-group input-group--style-2 pr-3" style="width: 160px;">
                                                <span class="input-group-btn">
                                                    <button class="btn btn-number" type="button" data-type="minus" data-field="quantity" disabled="disabled">
                                                        <i class="la la-minus"></i>
                                                    </button>
                                                </span>
                                                <input type="text" name="quantity" class="form-control input-number text-center" placeholder="1" value="1" min="1" max="10">
                                                <span class="input-group-btn">
                                                    <button class="btn btn-number" type="button" data-type="plus" data-field="quantity">
                                                        <i class="la la-plus"></i>
                                                    </button>
                                                </span>
                                            </div>
                                            <!--<div class="avialable-amount">(<span id="available-quantity"><?php echo e($qty); ?></span> <?php echo e(__('available')); ?>)</div>-->
                                        </div>
                                    </div>
                                </div>

                                <hr>

                                <div class="row no-gutters pb-3 d-none" id="chosen_price_div">
                                    <div class="col-2">
                                        <div class="product-description-label"><?php echo e(__('Total Price')); ?>:</div>
                                    </div>
                                    <div class="col-10">
                                        <div class="product-price">
                                            <strong id="chosen_price">

                                            </strong>
                                        </div>
                                    </div>
                                </div>

                            </form>

                            <div class="d-table width-100 mt-3">
                                <div class="d-table-cell">
                                    <!-- Buy Now button -->
                                    <?php if($qty > 0): ?>
                                    <!--
                                        <button type="button" class="btn btn-styled btn-base-1 btn-icon-left strong-700 hov-bounce hov-shaddow buy-now" onclick="buyNow()">
                                            <i class="la la-shopping-cart"></i> <?php echo e(__('Buy Now')); ?>

                                        </button>
                                    -->
                                        <button type="button" class="btn btn-styled btn-alt-base-1 c-white btn-icon-left strong-700 hov-bounce hov-shaddow ml-2 add-to-cart" onclick="addToCart()">
                                            <i class="la la-shopping-cart"></i>
                                            <span class="d-none d-md-inline-block"> <?php echo e(__('Add to cart')); ?></span>
                                        </button>
                                        <button type="button" class="btn btn-styled strong-700" style="background: #4f7ffe; color: white;" onclick="addToWishList(<?php echo e($product->id); ?>)"><i class="la la-heart"></i> 
                                            <?php echo e(__('Add to wishlist')); ?>

                                        </button> 
                                    <?php else: ?>
                                        <button type="button" class="btn btn-styled btn-base-1 btn-icon-left strong-700 hov-bounce hov-shaddow">
                                            <i class="la la-cart-arrow-down"></i> <?php echo e(__('Out of Stock')); ?>

                                        </button>
                                    <?php endif; ?>
                                </div>
                            </div>


                            <hr class="mt-3 mb-0">

                            <div class="d-table width-100 mt-2">
                                <div class="d-table-cell">
                                    <!-- Add to wishlist button -->
                                    <!-- Add to compare button -->
                                    <!--<button type="button" class="btn btn-link btn-icon-left strong-700" onclick="addToCompare(<?php echo e($product->id); ?>)">
                                        <?php echo e(__('Add to compare')); ?>

                                    </button>-->
                                </div>
                            </div>

                            <hr class="mt-2">

                            <div class="row no-gutters mt-3">
                                <div class="col-2">
                                    <div class="product-description-label alpha-6"><?php echo e(__('Description')); ?>:</div>
                                </div>
                                <div class="col-10">
                                                <?php echo $product->description; ?>
                                </div>
                            </div>
                            <div class="row no-gutters mt-3">
                                <div class="col-2">
                                    <div class="product-description-label alpha-6"><?php echo e(__('Payment')); ?>:</div>
                                </div>
                                <div class="col-10">
                                    <ul class="inline-links">
                                        <li>
                                            <img loading="lazy"  src="<?php echo e(asset('frontend/images/icons/cards/visa.png')); ?>" width="30" class="">
                                        </li>
                                        <li>
                                            <img loading="lazy"  src="<?php echo e(asset('frontend/images/icons/cards/mastercard.png')); ?>" width="30" class="">
                                        </li>
                                        <li>
                                            <img loading="lazy"  src="<?php echo e(asset('frontend/images/icons/cards/maestro.png')); ?>" width="30" class="">
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            
                            <hr class="mt-4">
                            <div class="row no-gutters mt-4">
                                <div class="col-2">
                                    <div class="product-description-label mt-2"><?php echo e(__('Share')); ?>:</div>
                                </div>
                                <div class="col-10">
                                    <div id="share"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="gry-bg">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 d-none d-xl-block">
                    <div class="seller-info-box mb-3">
                        <div class="row no-gutters align-items-center">
                            <?php if($product->added_by == 'seller'): ?>
                                <div class="col">
                                    <a href="<?php echo e(route('shop.visit', $product->user->shop->slug)); ?>" class="d-block store-btn"><?php echo e(__('Visit Store')); ?></a>
                                </div>
                                <div class="col">
                                    <ul class="social-media social-media--style-1-v4 text-center">
                                        <li>
                                            <a href="<?php echo e($product->user->shop->facebook); ?>" class="facebook" target="_blank" data-toggle="tooltip" data-original-title="Facebook">
                                                <i class="fa fa-facebook"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="<?php echo e($product->user->shop->google); ?>" class="google" target="_blank" data-toggle="tooltip" data-original-title="Google">
                                                <i class="fa fa-google"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="<?php echo e($product->user->shop->twitter); ?>" class="twitter" target="_blank" data-toggle="tooltip" data-original-title="Twitter">
                                                <i class="fa fa-twitter"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="<?php echo e($product->user->shop->youtube); ?>" class="youtube" target="_blank" data-toggle="tooltip" data-original-title="Youtube">
                                                <i class="fa fa-youtube"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="seller-top-products-box bg-white sidebar-box mb-3">
                        <div class="box-title">
                            <?php echo e(__('Top Selling Products From This Seller')); ?>

                        </div>
                        <div class="box-content">
                            <?php $__currentLoopData = filter_products(\App\Product::where('user_id', $product->user_id)->orderBy('num_of_sale', 'desc'))->limit(4)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $top_product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="mb-3 product-box-3">
                                <div class="clearfix">
                                    <div class="product-image float-left">
                                        <a href="<?php echo e(route('product', $top_product->slug)); ?>" style="background-image:url('<?php echo e(asset($top_product->thumbnail_img)); ?>');"></a>
                                    </div>
                                    <div class="product-details float-left">
                                        <h4 class="title text-truncate">
                                            <a href="<?php echo e(route('product', $top_product->slug)); ?>" class="d-block"><?php echo e($top_product->name); ?></a>
                                        </h4>
                                        <div class="star-rating star-rating-sm mt-1">
                                            <?php echo e(renderStarRating($top_product->rating)); ?>

                                        </div>
                                        <div class="price-box">
                                            <!-- <?php if(home_base_price($top_product->id) != home_discounted_base_price($top_product->id)): ?>
                                                <del class="old-product-price strong-400"><?php echo e(home_base_price($top_product->id)); ?></del>
                                            <?php endif; ?> -->
                                            <span class="product-price strong-600"><?php echo e(home_discounted_base_price($top_product->id)); ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>
                <div class="col-xl-9">
                    <div class="my-4 bg-white p-3">
                        <div class="section-title-1">
                            <h3 class="heading-5 strong-700 mb-0">
                                <span class="mr-4"><?php echo e(__('Related products')); ?></span>
                            </h3>
                        </div>
                        <div class="caorusel-box">
                            <div class="slick-carousel" data-slick-items="3" data-slick-xl-items="2" data-slick-lg-items="3"  data-slick-md-items="2" data-slick-sm-items="1" data-slick-xs-items="1"  data-slick-rows="2">
                                <?php $__currentLoopData = filter_products(\App\Product::where('subcategory_id', $product->subcategory_id)->where('id', '!=', $product->id))->limit(10)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $related_product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="p-2">
                                    <div class="row no-gutters product-box-2 align-items-center">
                                        <div class="col-4">
                                            <div class="position-relative overflow-hidden h-100">
                                                <a href="<?php echo e(route('product', $related_product->slug)); ?>" class="d-block product-image h-100" style="background-image:url('<?php echo e(asset($related_product->thumbnail_img)); ?>');">
                                                </a>
                                                <div class="product-btns">
                                                    <button class="btn add-wishlist" title="Add to Wishlist" onclick="addToWishList(<?php echo e($related_product->id); ?>)">
                                                        <i class="la la-heart-o"></i>
                                                    </button>
                                                    <button class="btn add-compare" title="Add to Compare" onclick="addToCompare(<?php echo e($related_product->id); ?>)">
                                                        <i class="la la-refresh"></i>
                                                    </button>
                                                    <button class="btn quick-view" title="Quick view" onclick="showAddToCartModal(<?php echo e($related_product->id); ?>)">
                                                        <i class="la la-eye"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-8 border-left">
                                            <div class="p-3">
                                                <h2 class="product-title mb-0 p-0 text-truncate">
                                                    <a href="<?php echo e(route('product', $related_product->slug)); ?>"><?php echo e(__($related_product->name)); ?></a>
                                                </h2>
                                                <div class="star-rating star-rating-sm mb-2">
                                                    <?php echo e(renderStarRating($related_product->rating)); ?>

                                                </div>
                                                <div class="clearfix">
                                                    <div class="price-box float-left">
                                                        <?php if(home_base_price($related_product->id) != home_discounted_base_price($related_product->id)): ?>
                                                            <del class="old-product-price strong-400"><?php echo e(home_base_price($related_product->id)); ?></del>
                                                        <?php endif; ?>
                                                        <span class="product-price strong-600"><?php echo e(home_discounted_base_price($related_product->id)); ?></span>
                                                    </div>
                                                    <div class="float-right">
                                                        <button class="add-to-cart btn" title="Add to Cart" onclick="showAddToCartModal(<?php echo e($related_product->id); ?>)">
                                                            <i class="la la-shopping-cart"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
        $(document).ready(function() {
    		$('#share').share({
    			networks: ['facebook','twitter'],
    			theme: 'square'
    		});
            getVariantPrice();
    	});

    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/solage/public_html/puzzle.sola.ge/resources/views/frontend/product_details.blade.php ENDPATH**/ ?>