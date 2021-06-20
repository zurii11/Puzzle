<?php if(isset($subsubcategory_id)): ?>
    <?php
        $meta_title = \App\SubSubCategory::find($subsubcategory_id)->meta_title;
        $meta_description = \App\SubSubCategory::find($subsubcategory_id)->meta_description;
    ?>
<?php elseif(isset($subcategory_id)): ?>
    <?php
        $meta_title = \App\SubCategory::find($subcategory_id)->meta_title;
        $meta_description = \App\SubCategory::find($subcategory_id)->meta_description;
    ?>
<?php elseif(isset($category_id)): ?>
    <?php
        $meta_title = \App\Category::find($category_id)->meta_title;
        $meta_description = \App\Category::find($category_id)->meta_description;
    ?>
<?php elseif(isset($brand_id)): ?>
    <?php
        $meta_title = \App\Brand::find($brand_id)->meta_title;
        $meta_description = \App\Brand::find($brand_id)->meta_description;
    ?>
<?php else: ?>
    <?php
        $meta_title = env('APP_NAME');
        $meta_description = \App\SeoSetting::first()->description;
    ?>
<?php endif; ?>

<?php $__env->startSection('meta_title'); ?><?php echo e($meta_title); ?><?php $__env->stopSection(); ?>
<?php $__env->startSection('meta_description'); ?><?php echo e($meta_description); ?><?php $__env->stopSection(); ?>

<?php $__env->startSection('meta'); ?>
    <!-- Schema.org markup for Google+ -->
    <meta itemprop="name" content="<?php echo e($meta_title); ?>">
    <meta itemprop="description" content="<?php echo e($meta_description); ?>">

    <!-- Twitter Card data -->
    <meta name="twitter:title" content="<?php echo e($meta_title); ?>">
    <meta name="twitter:description" content="<?php echo e($meta_description); ?>">

    <!-- Open Graph data -->
    <meta property="og:title" content="<?php echo e($meta_title); ?>" />
    <meta property="og:description" content="<?php echo e($meta_description); ?>" />
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col">
                    <ul class="breadcrumb">
                        <li><a href="<?php echo e(route('home')); ?>"><?php echo e(__('Home')); ?></a></li>
                        <li><a href="<?php echo e(route('products')); ?>"><?php echo e(__('All Categories')); ?></a></li>
                        <?php if(isset($category_id)): ?>
                            <li class="active"><a href="<?php echo e(route('products.category', \App\Category::find($category_id)->slug)); ?>"><?php echo e(\App\Category::find($category_id)->name); ?></a></li>
                        <?php endif; ?>
                        <?php if(isset($subcategory_id)): ?>
                            <li ><a href="<?php echo e(route('products.category', \App\SubCategory::find($subcategory_id)->category->slug)); ?>"><?php echo e(\App\SubCategory::find($subcategory_id)->category->name); ?></a></li>
                            <li class="active"><a href="<?php echo e(route('products.subcategory', \App\SubCategory::find($subcategory_id)->slug)); ?>"><?php echo e(\App\SubCategory::find($subcategory_id)->name); ?></a></li>
                        <?php endif; ?>
                        <?php if(isset($subsubcategory_id)): ?>
                            <li ><a href="<?php echo e(route('products.category', \App\SubSubCategory::find($subsubcategory_id)->subcategory->category->slug)); ?>"><?php echo e(\App\SubSubCategory::find($subsubcategory_id)->subcategory->category->name); ?></a></li>
                            <li ><a href="<?php echo e(route('products.subcategory', \App\SubsubCategory::find($subsubcategory_id)->subcategory->slug)); ?>"><?php echo e(\App\SubsubCategory::find($subsubcategory_id)->subcategory->name); ?></a></li>
                            <li class="active"><a href="<?php echo e(route('products.subsubcategory', \App\SubSubCategory::find($subsubcategory_id)->slug)); ?>"><?php echo e(\App\SubSubCategory::find($subsubcategory_id)->name); ?></a></li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>


    <section class="gry-bg py-4">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 d-none d-xl-block">

                    <div class="bg-white sidebar-box mb-3">
                        <div class="box-title text-center">
                            <?php echo e(__('Categories')); ?>

                        </div>
                        <div class="box-content">
                            <div class="category-accordion">
                                <?php $__currentLoopData = \App\Category::orderby('sortnum', 'DESC')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="single-category">
                                        <button class="btn w-100 category-name collapsed" type="button" data-toggle="collapse" data-target="#category-<?php echo e($key); ?>" aria-expanded="true">
                                            <?php echo e(__($category->name)); ?>

                                        </button>

                                        <div id="category-<?php echo e($key); ?>" class="collapse">
                                            <?php $__currentLoopData = $category->subcategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key2 => $subcategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <div class="single-sub-category">
												    <a href="<?php echo e(route('products.subcategory', $subcategory->slug)); ?>">
                                                    <button class="btn w-100 sub-category-name" type="button" data-toggle="collapse" aria-expanded="true">
                                                        <?php echo e(__($subcategory->name)); ?>

                                                    </button>
													</a>
                                                </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white sidebar-box mb-3" style="display:none;">  
                        <div class="box-title text-center">
                            <?php echo e(__('Sort by')); ?>

                        </div> 
                        <div class="box-content">
                            <div class="range-slider-wrapper mt-3">

                                <!-- Range slider values -->
                                <div class="row">
                                    <div class="col-6" style="display:none;">
                                        <span class="range-slider-value value-low"
                                            <?php if(isset($min_price)): ?>
                                                data-range-value-low="<?php echo e($min_price); ?>"
                                            <?php elseif($products->min('unit_price') > 0): ?>
                                                data-range-value-low="<?php echo e($products->min('unit_price')); ?>"
                                            <?php else: ?>
                                                data-range-value-low="0"
                                            <?php endif; ?>
                                            id="input-slider-range-value-low">
                                    </div>

                                    <div class="col-6 text-right" style="display:none;">
                                        <span class="range-slider-value value-high"
                                            <?php if(isset($max_price)): ?>
                                                data-range-value-high="<?php echo e($max_price); ?>"
                                            <?php elseif($products->max('unit_price') > 0): ?>
                                                data-range-value-high="<?php echo e($products->max('unit_price')); ?>"
                                            <?php else: ?>
                                                data-range-value-high="0"
                                            <?php endif; ?>
                                            id="input-slider-range-value-high">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
                <div class="col-xl-9">
                    <div class="row">
                        <div class="col-xl-9">
                        </div>
                        <div class="col-xl-3">
                        <div class="sort-by-box px-1"> 
                            <div class="form-group">
                                <select class="form-control sortSelect" data-minimum-results-for-search="Infinity" name="sort_by" onchange="filter()">
                                    <!--<option value="1" <?php if(isset($sort_by)): ?> <?php if($sort_by == '1'): ?> selected <?php endif; ?> <?php endif; ?>><?php echo e(__('Newest')); ?></option>
                                    <option value="2" <?php if(isset($sort_by)): ?> <?php if($sort_by == '2'): ?> selected <?php endif; ?> <?php endif; ?>><?php echo e(__('Oldest')); ?></option>-->
                                    <option value="3" <?php if(isset($sort_by)): ?> <?php if($sort_by == '3'): ?> selected <?php endif; ?> <?php endif; ?>><?php echo e(__('Price low to high')); ?></option>
                                    <option value="4" <?php if(isset($sort_by)): ?> <?php if($sort_by == '4'): ?> selected <?php endif; ?> <?php endif; ?>><?php echo e(__('Price high to low')); ?></option>
                                </select>
                            </div>
                        </div>
                        </div>
                    </div>
                    <!-- <div class="bg-white"> -->
                        <!-- 
                        <div class="brands-bar row no-gutters pb-3 bg-white p-3">
                            <div class="col-11">
                                <div class="brands-collapse-box" id="brands-collapse-box">
                                    <ul class="inline-links">
                                        <?php
                                            $brands = array();
                                        ?>
                                        <?php if(isset($subsubcategory_id)): ?>
                                            <?php
                                                foreach (json_decode(\App\SubSubCategory::find($subsubcategory_id)->brands) as $brand) {
                                                    if(!in_array($brand, $brands)){
                                                        array_push($brands, $brand);
                                                    }
                                                }
                                            ?>
                                        <?php elseif(isset($subcategory_id)): ?>
                                            <?php $__currentLoopData = \App\SubCategory::find($subcategory_id)->subsubcategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $subsubcategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php
                                                    foreach (json_decode($subsubcategory->brands) as $brand) {
                                                        if(!in_array($brand, $brands)){
                                                            array_push($brands, $brand);
                                                        }
                                                    }
                                                ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php elseif(isset($category_id)): ?>
                                            <?php $__currentLoopData = \App\Category::find($category_id)->subcategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $subcategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php $__currentLoopData = $subcategory->subsubcategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $subsubcategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php
                                                        foreach (json_decode($subsubcategory->brands) as $brand) {
                                                            if(!in_array($brand, $brands)){
                                                                array_push($brands, $brand);
                                                            }
                                                        }
                                                    ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php else: ?>
                                            <?php
                                                foreach (\App\Brand::all() as $key => $brand){
                                                    if(!in_array($brand->id, $brands)){
                                                        array_push($brands, $brand->id);
                                                    }
                                                }
                                            ?>
                                        <?php endif; ?>

                                        <?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $id): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if(\App\Brand::find($id) != null): ?>
                                                <li><a href="<?php echo e(route('products.brand', \App\Brand::find($id)->slug)); ?>"><img loading="lazy"  src="<?php echo e(asset(\App\Brand::find($id)->logo)); ?>" alt="" class="img-fluid"></a></li>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-1">
                                <button type="button" name="button" onclick="morebrands(this)" class="more-brands-btn">
                                    <i class="fa fa-plus"></i>
                                    <span class="d-none d-md-inline-block"><?php echo e(__('More')); ?></span>
                                </button>
                            </div>
                        </div>
                        -->
                        <form class="" id="search-form" action="<?php echo e(route('search')); ?>" method="GET">
                            <?php if(isset($category_id)): ?>
                                <input type="hidden" name="category" value="<?php echo e(\App\Category::find($category_id)->slug); ?>">
                            <?php endif; ?>
                            <?php if(isset($subcategory_id)): ?>
                                <input type="hidden" name="subcategory" value="<?php echo e(\App\SubCategory::find($subcategory_id)->slug); ?>">
                            <?php endif; ?>
                            <?php if(isset($subsubcategory_id)): ?>
                                <input type="hidden" name="subsubcategory" value="<?php echo e(\App\SubSubCategory::find($subsubcategory_id)->slug); ?>">
                            <?php endif; ?>
                             <!--
                            <div class="sort-by-bar row no-gutters bg-white mb-3 px-3">
                                <div class="col-lg-4 col-md-5">
                                    <div class="sort-by-box">
                                        <div class="form-group">
                                            <label><?php echo e(__('Search')); ?></label>
                                            <div class="search-widget">
                                                <input class="form-control input-lg" type="text" name="q" placeholder="<?php echo e(__('Search products')); ?>" <?php if(isset($query)): ?> value="<?php echo e($query); ?>" <?php endif; ?>>
                                                <button type="submit" class="btn-inner">
                                                    <i class="fa fa-search"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-7 offset-lg-1">
                                    <div class="row no-gutters">
                                        <div class="col-4">
                                            <div class="sort-by-box px-1">
                                                <div class="form-group">
                                                    <label><?php echo e(__('Sort by')); ?></label>
                                                    <select class="form-control sortSelect" data-minimum-results-for-search="Infinity" name="sort_by" onchange="filter()">
                                                        <option value="1" <?php if(isset($sort_by)): ?> <?php if($sort_by == '1'): ?> selected <?php endif; ?> <?php endif; ?>><?php echo e(__('Newest')); ?></option>
                                                        <option value="2" <?php if(isset($sort_by)): ?> <?php if($sort_by == '2'): ?> selected <?php endif; ?> <?php endif; ?>><?php echo e(__('Oldest')); ?></option>
                                                        <option value="3" <?php if(isset($sort_by)): ?> <?php if($sort_by == '3'): ?> selected <?php endif; ?> <?php endif; ?>><?php echo e(__('Price low to high')); ?></option>
                                                        <option value="4" <?php if(isset($sort_by)): ?> <?php if($sort_by == '4'): ?> selected <?php endif; ?> <?php endif; ?>><?php echo e(__('Price high to low')); ?></option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="sort-by-box px-1">
                                                <div class="form-group">
                                                    <label><?php echo e(__('Brands')); ?></label>
                                                    <select class="form-control sortSelect" data-placeholder="<?php echo e(__('All Brands')); ?>" name="brand" onchange="filter()">
                                                        <option value=""><?php echo e(__('All Brands')); ?></option>
                                                        <?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $id): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <?php if(\App\Brand::find($id) != null): ?>
                                                                <option value="<?php echo e(\App\Brand::find($id)->slug); ?>" <?php if(isset($brand_id)): ?> <?php if($brand_id == $id): ?> selected <?php endif; ?> <?php endif; ?>><?php echo e(\App\Brand::find($id)->name); ?></option>
                                                            <?php endif; ?>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="sort-by-box px-1">
                                                <div class="form-group">
                                                    <label><?php echo e(__('Sellers')); ?></label>
                                                    <select class="form-control sortSelect" data-placeholder="<?php echo e(__('All Sellers')); ?>" name="seller_id" onchange="filter()">
                                                        <option value=""><?php echo e(__('All Sellers')); ?></option>
                                                        <?php $__currentLoopData = \App\Seller::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $seller): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <?php if($seller->user != null && $seller->user->shop != null): ?>
                                                                <option value="<?php echo e($seller->id); ?>" <?php if(isset($seller_id)): ?> <?php if($seller_id == $seller->id): ?> selected <?php endif; ?> <?php endif; ?>><?php echo e($seller->user->shop->name); ?></option>
                                                            <?php endif; ?>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                            <input type="hidden" name="min_price" value="">
                            <input type="hidden" name="max_price" value="">
                        </form>
                                            
                        <!-- <hr class=""> -->
                        <div class="products-box-bar p-3 bg-white">
                            <div class="row sm-no-gutters gutters-5">
                                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="col-xxl-3 col-xl-4 col-lg-3 col-md-4 col-6">
                                        <div class="product-box-2 bg-white alt-box my-2">
                                            <div class="position-relative overflow-hidden">
                                                <a href="<?php echo e(route('product', $product->slug)); ?>" class="d-block product-image h-100" style="background-image:url('<?php echo e(asset($product->thumbnail_img)); ?>');" tabindex="0">
                                                </a>
                                                <div class="product-btns clearfix">
                                                    <button class="btn add-wishlist" title="Add to Wishlist" onclick="addToWishList(<?php echo e($product->id); ?>)" tabindex="0">
                                                        <i class="la la-heart-o"></i>
                                                    </button>
                                                    <button class="btn add-compare" title="Add to Compare" onclick="addToCompare(<?php echo e($product->id); ?>)" tabindex="0">
                                                        <i class="la la-refresh"></i>
                                                    </button>
                                                    <button class="btn quick-view" title="Quick view" onclick="showAddToCartModal(<?php echo e($product->id); ?>)" tabindex="0">
                                                        <i class="la la-eye"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="p-3 border-top" style="text-align: center;">
                                                <h2 class="product-title p-0 text-truncate">
                                                    <a href="<?php echo e(route('product', $product->slug)); ?>" tabindex="0"><?php echo e(__($product->name)); ?></a>
                                                </h2>
                                                <!--
                                                    <div class="star-rating mb-1">
                                                        <?php echo e(renderStarRating($product->rating)); ?>

                                                    </div>
                                                -->
                                                <div class="clearfix">
                                                    <div class="price-box float-left" style="width:100%;">
                                                        <?php if(home_base_price($product->id) != home_discounted_base_price($product->id)): ?>
                                                            <del class="old-product-price strong-400"><?php echo e(home_base_price($product->id)); ?></del>
                                                        <?php endif; ?>
                                                        <span class="product-price strong-600"><?php echo e(home_discounted_base_price($product->id)); ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- <div class="product-card-1 mb-2">
                                            <figure class="product-image-container">
                                                <a href="<?php echo e(route('product', $product->slug)); ?>" class="product-image d-block" style="background-image:url('<?php echo e(asset($product->thumbnail_img)); ?>');">
                                                </a>
                                                <button class="btn-quickview" onclick="showAddToCartModal(<?php echo e($product->id); ?>)"><i class="la la-eye"></i></button>
                                                <?php if(strtotime($product->created_at) > strtotime('-10 day')): ?>
                                                    <span class="product-label label-hot"><?php echo e(__('New')); ?></span>
                                                <?php endif; ?>
                                            </figure>
                                            <div class="product-details text-center">
                                                <h2 class="product-title text-truncate mb-0">
                                                    <a href="<?php echo e(route('product', $product->slug)); ?>"><?php echo e(__($product->name)); ?></a>
                                                </h2>
                                                <div class="star-rating star-rating-sm mt-1 mb-2">
                                                    <?php echo e(renderStarRating($product->rating)); ?>

                                                </div>
                                                <div class="price-box">
                                                    <?php if(home_base_price($product->id) != home_discounted_base_price($product->id)): ?>
                                                        <span class="old-product-price strong-300"><?php echo e(home_base_price($product->id)); ?></span>
                                                    <?php endif; ?>
                                                    <span class="product-price strong-300"><strong><?php echo e(home_discounted_base_price($product->id)); ?></strong></span>
                                                </div>

                                                <div class="product-card-1-action">
                                                    <button class="paction add-wishlist" title="Add to Wishlist" onclick="addToWishList(<?php echo e($product->id); ?>)">
                                                        <i class="la la-heart-o"></i>
                                                    </button>

                                                    <button type="button" class="paction add-cart btn btn-base-1 btn-circle btn-icon-left" onclick="showAddToCartModal(<?php echo e($product->id); ?>)">
                                                        <i class="fa la la-shopping-cart mr-0 mr-sm-2"></i><span class="d-none d-sm-inline-block"><?php echo e(__('Add to cart')); ?></span>
                                                    </button>

                                                    <button class="paction add-compare" title="Add to Compare" onclick="addToCompare(<?php echo e($product->id); ?>)">
                                                        <i class="la la-refresh"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div> -->
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                        <div class="products-pagination bg-white p-3">
                            <nav aria-label="Center aligned pagination">
                                <ul class="pagination justify-content-center">
                                    <?php echo e($products->links()); ?>

                                </ul>
                            </nav>
                        </div>

                    <!-- </div> -->
                </div>
            </div>
        </div>
    </section>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script type="text/javascript">
        function filter(){
            $('#search-form').submit();
        }
        function rangefilter(arg){
            $('input[name=min_price]').val(arg[0]);
            $('input[name=max_price]').val(arg[1]);
            filter();
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Puzzle\resources\views/frontend/product_listing.blade.php ENDPATH**/ ?>