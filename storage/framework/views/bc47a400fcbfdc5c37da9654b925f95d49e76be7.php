<div class="card regmodelreg">
				<span class="exitmodel"><i class="fa fa-times" aria-hidden="true"></i></span>
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
														<select id="profile_type" name="profile_type" class="form-control" style="height: 47px; color: #b1b1b1;">
																<option value="1"><?php echo e(__('Physical person')); ?></option>
																<option value="2"><?php echo e(__('Legal entity')); ?></option>
														</select>
													</div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <div class="input-group input-group--style-1">
                                                            <input id="regname" type="text" class="form-control<?php echo e($errors->has('name') ? ' is-invalid' : ''); ?>" placeholder="<?php echo e(__('Name Surname')); ?>" name="name">
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
                                                            <input id="regtypeid" type="text" class="form-control<?php echo e($errors->has('usertype_id') ? ' is-invalid' : ''); ?>" placeholder="<?php echo e(__('Personal Id')); ?>" name="usertype_id">
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
                                                            <input type="text" class="form-control<?php echo e($errors->has('phone') ? ' is-invalid' : ''); ?>" placeholder="<?php echo e(__('phone')); ?>" name="phone">
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
													  <select id="filter_region" name="region" class="form-control" style="height: 47px; color: #b1b1b1;">
														    <option value=""><?php echo e(__('region')); ?></option>
															<option value="adjara"><?php echo e(__('adjara')); ?></option>
															<option value="guria"><?php echo e(__('guria')); ?></option>
															<option value="tbilisi"><?php echo e(__('tbilisi')); ?></option>
															<option value="imereti"><?php echo e(__('imereti')); ?></option>
															<option value="samegrelo"><?php echo e(__('samegrelo')); ?></option>
															<option value="qvemokartli"><?php echo e(__('qvemokartli')); ?></option>
														</select>
														<?php
															if(Session::has('locale')){
																$locale = Session::get('locale', Config::get('app.locale'));
															}
															else{
																$locale = 'en';
															}
														?>
														<input type="hidden" id="language" value="<?php echo e($locale); ?>">
													</div>
                                                </div>
                                                <div class="col-6">
													<div class="form-group">
													  <select id="filter_city" name="city" class="form-control" style="height: 47px; color: #b1b1b1;">
														    <option value=""><?php echo e(__('City')); ?></option>
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
                                    <?php echo e(__('Already have account ?')); ?><a id="loginback" href="#" class="strong-600"><?php echo e(__('Log In')); ?></a>
                                </p>
                            </div>
                        </div>
<div class="card regmodel">
				<span class="exitmodel"><i class="fa fa-times" aria-hidden="true"></i></span>
                            <div class="text-center px-35 pt-5">
                                <h3 class="heading heading-4 strong-500">
                                    <?php echo e(__('Login to your account.')); ?>

                                </h3>
                            </div>
                            <div class="px-5 py-3 py-lg-5">
                                <div class="row align-items-center">
                                    <div class="col-12 col-lg">
                                        <form class="form-default" role="form" action="<?php echo e(route('login')); ?>" method="POST">
                                            <?php echo csrf_field(); ?>
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <!-- <label><?php echo e(__('email')); ?></label> -->
                                                        <div class="input-group input-group--style-1">
                                                            <input type="email" class="form-control form-control-sm <?php echo e($errors->has('email') ? ' is-invalid' : ''); ?>" value="<?php echo e(old('email')); ?>" placeholder="<?php echo e(__('Email')); ?>" name="email" id="email">
                                                            <span class="input-group-addon">
                                                                <i class="text-md la la-user"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <!-- <label><?php echo e(__('password')); ?></label> -->
                                                        <div class="input-group input-group--style-1">
                                                            <input type="password" class="form-control <?php echo e($errors->has('password') ? ' is-invalid' : ''); ?>" placeholder="<?php echo e(__('Password')); ?>" name="password" id="password">
                                                            <span class="input-group-addon">
                                                                <i class="text-md la la-lock"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <div class="checkbox pad-btm text-left">
                                                            <input id="demo-form-checkbox" class="magic-checkbox" type="checkbox" name="remember" id="remember" <?php echo e(old('remember') ? 'checked' : ''); ?>>
                                                            <label for="demo-form-checkbox" class="text-sm">
                                                                <?php echo e(__('Remember Me')); ?>

                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php if(env('MAIL_USERNAME') != null && env('MAIL_PASSWORD') != null): ?>
                                                    <div class="col-6 text-right">
                                                        <a href="<?php echo e(route('password.request')); ?>" class="link link-xs link--style-3"><?php echo e(__('Forgot password?')); ?></a>
                                                    </div>
                                                <?php endif; ?>
                                            </div>

                                            <div class="row">
                                                <div class="col text-center">
                                                    <button type="submit" class="btn btn-styled btn-base-1 btn-md w-100"><?php echo e(__('Login')); ?></button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center px-35 pb-3">
                                <p class="text-md">
                                    <?php echo e(__('Need an account?')); ?> <a href="#" id="registration" class="strong-600"><?php echo e(__('Register Now')); ?></a>
                                </p>
                            </div>
								
                        </div>
<div class="header bg-white">
    <!-- Top Bar -->
    <div class="top-navbar">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col">
                    <ul class="inline-links d-lg-inline-block d-flex justify-content-between">
                        <li class="dropdown" id="lang-change">
                            <?php
                                if(Session::has('locale')){
                                    $locale = Session::get('locale', Config::get('app.locale'));
                                }
                                else{
                                    $locale = 'en';
                                }
                            ?>
                            <a href="" class="dropdown-toggle top-bar-item" data-toggle="dropdown">
                                <img loading="lazy"  src="<?php echo e(asset('frontend/images/icons/flags/'.$locale.'.png')); ?>" class="flag"><span class="language"><?php echo e(\App\Language::where('code', $locale)->first()->name); ?></span>
                            </a>
                            <ul class="dropdown-menu">
                                <?php $__currentLoopData = \App\Language::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li class="dropdown-item <?php if($locale == $language): ?> active <?php endif; ?>">
                                        <a href="#" data-flag="<?php echo e($language->code); ?>"><img loading="lazy"  src="<?php echo e(asset('frontend/images/icons/flags/'.$language->code.'.png')); ?>" class="flag"><span class="language"><?php echo e($language->name); ?></span></a>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </li>
                        <li>
                            <a href="<?php echo e(route('home')); ?>" class="top-bar-item"><?php echo e(__('Home')); ?></a>
                        </li>
                    </ul>
                </div>

                <div class="col-5 text-right d-none d-lg-block">
                    <ul class="inline-links">
                        <li>
                            <a href="<?php echo e(route('contact')); ?>" class="top-bar-item"><?php echo e(__('Contact')); ?></a>
                        </li>
                        <?php if(auth()->guard()->check()): ?>
                        <li>
                            <a href="<?php echo e(route('dashboard')); ?>" class="top-bar-item"><?php echo e(__('My Profile')); ?></a>
                        </li>
                        <li>
                            <a href="<?php echo e(route('logout')); ?>" class="top-bar-item"><?php echo e(__('Logout')); ?></a>
                        </li>
                        <?php else: ?>
                        <li>
                            <a id="login" href="#" class="top-bar-item"><?php echo e(__('Login')); ?></a>
                        </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- END Top Bar -->

    <!-- mobile menu -->
    <div class="mobile-side-menu d-lg-none">
        <div class="side-menu-overlay opacity-0" onclick="sideMenuClose()"></div>
        <div class="side-menu-wrap opacity-0">
            <div class="side-menu closed">
                <div class="side-menu-header ">
                    <div class="side-menu-close" onclick="sideMenuClose()">
                        <i class="la la-close"></i>
                    </div>

                    <?php if(auth()->guard()->check()): ?>
                        <div class="widget-profile-box px-3 py-4 d-flex align-items-center">
                                <div class="image " style="background-image:url('<?php echo e(Auth::user()->avatar_original); ?>')"></div>
                                <div class="name"><?php echo e(Auth::user()->name); ?></div>
                        </div>
                        <div class="side-login px-3 pb-3">
                            <a href="<?php echo e(route('logout')); ?>"><?php echo e(__('Sign Out')); ?></a>
                        </div>
                    <?php else: ?>
                        <div class="widget-profile-box px-3 py-4 d-flex align-items-center">
                                <div class="image " style="background-image:url('<?php echo e(asset('frontend/images/icons/user-placeholder.jpg')); ?>')"></div>
                        </div>
                        <div class="side-login px-3 pb-3">
                            <a href="<?php echo e(route('user.login')); ?>"><?php echo e(__('Sign In')); ?></a>
                            <a href="<?php echo e(route('user.registration')); ?>"><?php echo e(__('Registration')); ?></a>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="side-menu-list px-3">
                    <ul class="side-user-menu">
                        <li>
                            <a href="<?php echo e(route('home')); ?>">
                                <i class="la la-home"></i>
                                <span><?php echo e(__('Home')); ?></span>
                            </a>
                        </li>

                        <li>
                            <a href="<?php echo e(route('dashboard')); ?>">
                                <i class="la la-dashboard"></i>
                                <span><?php echo e(__('Dashboard')); ?></span>
                            </a>
                        </li>

                        <li>
                            <a href="<?php echo e(route('cart')); ?>">
                                <i class="la la-shopping-cart"></i>
                                <span><?php echo e(__('Cart')); ?></span>
                                <?php if(Auth::check()): ?>
                                    <?php if(count($cart = App\Carts::where('user_id', Auth::user()->id)->get()) > 0): ?>
                                        <span class="badge" id="cart_items_sidenav"><?php echo e(count($cart)); ?></span>
                                    <?php else: ?>
                                        <span class="badge" id="cart_items_sidenav">0</span>
                                    <?php endif; ?>
                                <?php else: ?>
                                    <?php if(Session::has('cart')): ?>
                                        <span class="badge" id="cart_items_sidenav"><?php echo e(count(Session::get('cart'))); ?></span>
                                    <?php else: ?>
                                        <span class="badge" id="cart_items_sidenav">0</span>
                                    <?php endif; ?>
                                <?php endif; ?>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo e(route('wishlists.index')); ?>">
                                <i class="la la-heart-o"></i>
                                <span><?php echo e(__('Wishlist')); ?></span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo e(route('profile')); ?>">
                                <i class="la la-user"></i>
                                <span><?php echo e(__('Manage Profile')); ?></span>
                            </a>
                        </li>
					</ul>
                    <?php if(Auth::check() && Auth::user()->user_type == 'seller'): ?>
                        <div class="sidebar-widget-title py-0">
                            <span><?php echo e(__('Shop Options')); ?></span>
                        </div>
                        <ul class="side-seller-menu">
                            <li>
                                <a href="<?php echo e(route('seller.products')); ?>">
                                    <i class="la la-diamond"></i>
                                    <span><?php echo e(__('Products')); ?></span>
                                </a>
                            </li>

                            <li>
                                <a href="<?php echo e(route('orders.index')); ?>">
                                    <i class="la la-file-text"></i>
                                    <span><?php echo e(__('Orders')); ?></span>
                                </a>
                            </li>

                            <li>
                                <a href="<?php echo e(route('shops.index')); ?>">
                                    <i class="la la-cog"></i>
                                    <span><?php echo e(__('Shop Setting')); ?></span>
                                </a>
                            </li>

                            <li>
                                <a href="<?php echo e(route('payments.index')); ?>">
                                    <i class="la la-cc-mastercard"></i>
                                    <span><?php echo e(__('Payment History')); ?></span>
                                </a>
                            </li>
                        </ul>
                        <div class="sidebar-widget-title py-0">
                            <span><?php echo e(__('Earnings')); ?></span>
                        </div>
                        <div class="widget-balance py-3">
                            <div class="text-center">
                                <div class="heading-4 strong-700 mb-4">
                                    <?php
                                        $orderDetails = \App\OrderDetail::where('seller_id', Auth::user()->id)->where('created_at', '>=', date('-30d'))->get();
                                        $total = 0;
                                        foreach ($orderDetails as $key => $orderDetail) {
                                            if($orderDetail->order->payment_status == 'paid'){
                                                $total += $orderDetail->price;
                                            }
                                        }
                                    ?>
                                    <small class="d-block text-sm alpha-5 mb-2"><?php echo e(__('Your earnings (current month)')); ?></small>
                                    <span class="p-2 bg-base-1 rounded"><?php echo e(single_price($total)); ?></span>
                                </div>
                                <table class="text-left mb-0 table w-75 m-auto">
                                    <tbody>
                                        <tr>
                                            <?php
                                                $orderDetails = \App\OrderDetail::where('seller_id', Auth::user()->id)->get();
                                                $total = 0;
                                                foreach ($orderDetails as $key => $orderDetail) {
                                                    if($orderDetail->order->payment_status == 'paid'){
                                                        $total += $orderDetail->price;
                                                    }
                                                }
                                            ?>
                                            <td class="p-1 text-sm">
                                                <?php echo e(__('Total earnings')); ?>:
                                            </td>
                                            <td class="p-1">
                                                <?php echo e(single_price($total)); ?>

                                            </td>
                                        </tr>
                                        <tr>
                                            <?php
                                                $orderDetails = \App\OrderDetail::where('seller_id', Auth::user()->id)->where('created_at', '>=', date('-60d'))->where('created_at', '<=', date('-30d'))->get();
                                                $total = 0;
                                                foreach ($orderDetails as $key => $orderDetail) {
                                                    if($orderDetail->order->payment_status == 'paid'){
                                                        $total += $orderDetail->price;
                                                    }
                                                }
                                            ?>
                                            <td class="p-1 text-sm">
                                                <?php echo e(__('Last Month earnings')); ?>:
                                            </td>
                                            <td class="p-1">
                                                <?php echo e(single_price($total)); ?>

                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    <?php endif; ?>
                    <div class="sidebar-widget-title py-0">
                        <span>Categories</span>
                    </div>
                    <ul class="side-seller-menu">
                        <?php $__currentLoopData = \App\Category::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li>
                            <a href="<?php echo e(route('products.category', $category->slug)); ?>" class="text-truncate">
                                <img loading="lazy"  class="cat-image" src="<?php echo e(asset($category->icon)); ?>" width="13">
                                <span><?php echo e(__($category->name)); ?></span>
                            </a>
                        </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- end mobile menu -->

    <div class="position-relative logo-bar-area">
        <div class="">
            <div class="container">
                <div class="row no-gutters align-items-center">
                    <div class="col-lg-3 col-8">
                        <div class="d-flex">
                            <div class="d-block d-lg-none mobile-menu-icon-box">
                                <!-- Navbar toggler  -->
                                <a href="" onclick="sideMenuOpen(this)">
                                    <div class="hamburger-icon">
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                    </div>
                                </a>
                            </div>

                            <!-- Brand/Logo -->
                            <a class="navbar-brand w-100" href="<?php echo e(route('home')); ?>">
                                <?php
                                    $generalsetting = \App\GeneralSetting::first();
                                ?>
                                <?php if($generalsetting->logo != null): ?>
                                    <img loading="lazy"  src="<?php echo e(asset($generalsetting->logo)); ?>" class="" alt="active shop">
                                <?php else: ?>
                                    <img loading="lazy"  src="<?php echo e(asset('frontend/images/logo/logo.png')); ?>" class="" alt="active shop">
                                <?php endif; ?>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-6 col-4 position-static d-none d-lg-block">
						<div class="home-slide">
							<div class="home-slide">
								<div class="slick-carousel" data-slick-arrows="true" data-slick-dots="true" data-slick-autoplay="true" style="height: 155px;">
									<?php $__currentLoopData = \App\Slider::where('published', 1)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $slider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<a href="https://easyway.ge/" target="_blank">
										<div class="" >
											<img loading="lazy"  class="d-block w-100 h-100" src="<?php echo e(asset($slider->photo)); ?>" alt="Slider Image">
										</div>
										</a>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								</div>
							</div>
						</div>
                        <div class="d-flex w-100" style="margin-bottom: 15px;">
                            <div class="search-box flex-grow-1 px-4">
                                <form action="<?php echo e(route('search')); ?>" method="GET">
                                    <div class="d-flex position-relative">
                                        <div class="d-lg-none search-box-back">
                                            <button class="" type="button"><i class="la la-long-arrow-left"></i></button>
                                        </div>
                                        <div class="w-100">
                                            <input type="text" aria-label="Search" id="search" name="q" class="w-100" placeholder="<?php echo e(__('Search')); ?>" autocomplete="off">
                                        </div>
                                        <button class="d-none d-lg-block" type="submit">
                                            <i class="la la-search la-flip-horizontal"></i>
                                        </button>
                                        <div class="typed-search-box d-none">
                                            <div class="search-preloader">
                                                <div class="loader"><div></div><div></div><div></div></div>
                                            </div>
                                            <div class="search-nothing d-none">

                                            </div>
                                            <div id="search-content">

                                            </div>
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>
					</div>
                    <div class="col-lg-3 col-4 position-static">
                        <div class="w-100 d-sm-block d-lg-none d-xl-none" style="margin-bottom: 15px;">
                            <div class="search-box flex-grow-1 px-4">
                                <form action="<?php echo e(route('search')); ?>" method="GET">
                                    <div class="d-flex position-relative">
                                        <div class="d-lg-none search-box-back">
                                            <button class="" type="button"><i class="la la-long-arrow-left"></i></button>
                                        </div>
                                        <div class="w-100">
                                            <input type="text" aria-label="Search" id="search" name="q" class="w-100" placeholder="<?php echo e(__('Search')); ?>" autocomplete="off">
                                        </div>
                                        <button class="d-none d-lg-block" type="submit">
                                            <i class="la la-search la-flip-horizontal"></i>
                                        </button>
                                        <div class="typed-search-box d-none">
                                            <div class="search-preloader">
                                                <div class="loader"><div></div><div></div><div></div></div>
                                            </div>
                                            <div class="search-nothing d-none">

                                            </div>
                                            <div id="search-content">

                                            </div>
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>
                        <div class="d-flex w-100">
                            <div class="logo-bar-icons d-inline-block ml-auto">
                                <div class="d-inline-block d-lg-none">
                                    <div class="nav-search-box">
                                        <a href="#" class="nav-box-link">
                                            <i class="la la-search la-flip-horizontal d-inline-block nav-box-icon"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="d-inline-block" data-hover="dropdown">
                                    <div class="nav-cart-box dropdown" id="cart_items">
                                        <a href="" class="nav-box-link" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fa fa-shopping-bag d-inline-block nav-box-icon"></i> 
                                            <span class="nav-box-text d-none d-xl-inline-block"><?php echo e(__('Cart')); ?></span>
                                            <?php if(Auth::check()): ?>
                                                <?php if(count($cart = App\Carts::where('user_id', Auth::user()->id)->get()) > 0): ?>
                                                    <span class="nav-box-number"><?php echo e(count($cart)); ?></span>
                                                <?php else: ?>
                                                    <span class="nav-box-number">0</span>
                                                <?php endif; ?>
                                            <?php else: ?>
                                                <?php if(Session::has('cart')): ?>
                                                    <span class="nav-box-number"><?php echo e(count(Session::get('cart'))); ?></span>
                                                <?php else: ?>
                                                    <span class="nav-box-number">0</span>
                                                <?php endif; ?>
                                            <?php endif; ?>
                                        </a>
                                        <ul class="dropdown-menu dropdown-menu-right px-0">
                                            <li>
                                                <div class="dropdown-cart px-0">
                                                    <?php if(Auth::check()): ?>
                                                        <?php if(count($cart = App\Carts::where('user_id', Auth::user()->id)->get()) > 0): ?>
                                                            <div class="dc-header">
                                                                <h3 class="heading heading-6 strong-700"><?php echo e(__('Cart Items')); ?></h3>
                                                            </div>
                                                            <div class="dropdown-cart-items c-scrollbar">
                                                                <?php
                                                                    $total = 0
                                                                ?>
                                                                <?php $__currentLoopData = $cart; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cartItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <?php
                                                                        $product = \App\Product::find($cartItem['product_id']);
                                                                        $total = $total + $cartItem['price']*$cartItem['quantity'];
                                                                        $key = $cartItem['id'];
                                                                    ?>
                                                                    <div class="dc-item">
                                                                        <div class="d-flex align-items-center">
                                                                            <div class="dc-image">
                                                                                <a href="<?php echo e(route('product', $product->slug)); ?>">
                                                                                    <img loading="lazy"  src="<?php echo e(asset($product->thumbnail_img)); ?>" class="img-fluid" alt="">
                                                                                </a>
                                                                            </div>
                                                                            <div class="dc-content">
                                                                                <span class="d-block dc-product-name text-capitalize strong-600 mb-1">
                                                                                    <a href="<?php echo e(route('product', $product->slug)); ?>">
                                                                                        <?php echo e(__($product->name)); ?>

                                                                                    </a>
                                                                                </span>

                                                                                <span class="dc-quantity">x<?php echo e($cartItem['quantity']); ?></span>
                                                                                <span class="dc-price"><?php echo e(single_price($cartItem['price']*$cartItem['quantity'])); ?></span>
                                                                            </div>
                                                                            <div class="dc-actions">
                                                                                <button onclick="removeFromCart(<?php echo e($key); ?>)">
                                                                                    <i class="la la-close"></i>
                                                                                </button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            </div>
                                                            <div class="dc-item py-3">
                                                                <span class="subtotal-text"><?php echo e(__('Subtotal')); ?></span>
                                                                <span class="subtotal-amount"><?php echo e(single_price($total)); ?></span>
                                                            </div>
                                                            <div class="py-2 text-center dc-btn">
                                                                <ul class="inline-links inline-links--style-3">
                                                                    <li class="px-1">
                                                                        <a href="<?php echo e(route('cart')); ?>" class="link link--style-1 text-capitalize btn btn-base-1 px-3 py-1">
                                                                            <i class="la la-shopping-cart"></i> <?php echo e(__('View cart')); ?>

                                                                        </a>
                                                                    </li>
                                                                    <li class="px-1">
                                                                        <a href="<?php echo e(route('checkout.shipping_info')); ?>" class="link link--style-1 text-capitalize btn btn-base-1 px-3 py-1 light-text">
                                                                            <i class="la la-mail-forward"></i> <?php echo e(__('Checkout')); ?>

                                                                            </a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        <?php else: ?>
                                                            <div class="dc-header">
                                                                <h3 class="heading heading-6 strong-700"><?php echo e(__('Your Cart is empty')); ?></h3>
                                                            </div>
                                                        <?php endif; ?>
                                                    <?php else: ?>
                                                        <?php if(Session::has('cart')): ?>
                                                            <?php if(count($cart = Session::get('cart')) > 0): ?>
                                                                <div class="dc-header">
                                                                    <h3 class="heading heading-6 strong-700"><?php echo e(__('Cart Items')); ?></h3>
                                                                </div>
                                                                <div class="dropdown-cart-items c-scrollbar">
                                                                    <?php
                                                                        $total = 0;
                                                                    ?>
                                                                    <?php $__currentLoopData = $cart; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $cartItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                        <?php
                                                                            $product = \App\Product::find($cartItem['id']);
                                                                            $total = $total + $cartItem['price']*$cartItem['quantity'];
                                                                        ?>
                                                                        <div class="dc-item">
                                                                            <div class="d-flex align-items-center">
                                                                                <div class="dc-image">
                                                                                    <a href="<?php echo e(route('product', $product->slug)); ?>">
                                                                                        <img loading="lazy"  src="<?php echo e(asset($product->thumbnail_img)); ?>" class="img-fluid" alt="">
                                                                                    </a>
                                                                                </div>
                                                                                <div class="dc-content">
                                                                                    <span class="d-block dc-product-name text-capitalize strong-600 mb-1">
                                                                                        <a href="<?php echo e(route('product', $product->slug)); ?>">
                                                                                            <?php echo e(__($product->name)); ?>

                                                                                        </a>
                                                                                    </span>

                                                                                    <span class="dc-quantity">x<?php echo e($cartItem['quantity']); ?></span>
                                                                                    <span class="dc-price"><?php echo e(single_price($cartItem['price']*$cartItem['quantity'])); ?></span>
                                                                                </div>
                                                                                <div class="dc-actions">
                                                                                    <button onclick="removeFromCart(<?php echo e($key); ?>)">
                                                                                        <i class="la la-close"></i>
                                                                                    </button>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                </div>
                                                                <div class="dc-item py-3">
                                                                    <span class="subtotal-text"><?php echo e(__('Subtotal')); ?></span>
                                                                    <span class="subtotal-amount"><?php echo e(single_price($total)); ?></span>
                                                                </div>
                                                                <div class="py-2 text-center dc-btn">
                                                                    <ul class="inline-links inline-links--style-3">
                                                                        <li class="px-1">
                                                                            <a href="<?php echo e(route('cart')); ?>" class="link link--style-1 text-capitalize btn btn-base-1 px-3 py-1">
                                                                                <i class="la la-shopping-cart"></i> <?php echo e(__('View cart')); ?>

                                                                            </a>
                                                                        </li>
                                                                        <?php if(Auth::check()): ?>
                                                                        <li class="px-1">
                                                                            <a href="<?php echo e(route('checkout.shipping_info')); ?>" class="link link--style-1 text-capitalize btn btn-base-1 px-3 py-1 light-text">
                                                                                <i class="la la-mail-forward"></i> <?php echo e(__('Checkout')); ?>

                                                                            </a>
                                                                        </li>
                                                                        <?php endif; ?>
                                                                    </ul>
                                                                </div>
                                                            <?php else: ?>
                                                                <div class="dc-header">
                                                                    <h3 class="heading heading-6 strong-700"><?php echo e(__('Your Cart is empty')); ?></h3>
                                                                </div>
                                                            <?php endif; ?>
                                                        <?php else: ?>
                                                            <div class="dc-header">
                                                                <h3 class="heading heading-6 strong-700"><?php echo e(__('Your Cart is empty')); ?></h3>
                                                            </div>
                                                        <?php endif; ?>
                                                    <?php endif; ?>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="hover-category-menu" id="hover-category-menu">
            <div class="container">
                <div class="row no-gutters position-relative">
                    <div class="col-lg-3 position-static">
                        <div class="category-sidebar" id="category-sidebar">
                            <div class="all-category">
                                <span><?php echo e(__('CATEGORIES')); ?></span>
                                <a href="<?php echo e(route('categories.all')); ?>" class="d-inline-block">See All ></a>
                            </div>
                            <ul class="categories">
                                <?php $__currentLoopData = \App\Category::all()->take(11); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php
                                        $brands = array();
                                    ?>
                                    <li>
                                        <a href="<?php echo e(route('products.category', $category->slug)); ?>">
                                            <img loading="lazy"  class="cat-image" src="<?php echo e(asset($category->icon)); ?>" width="30">
                                            <span class="cat-name"><?php echo e(__($category->name)); ?></span>
                                        </a>
                                        <?php if(count($category->subcategories)>0): ?>
                                            <div class="sub-cat-menu c-scrollbar">
                                                <div class="sub-cat-main row no-gutters">
                                                    <div class="col-9">
                                                        <div class="sub-cat-content">
                                                            <div class="sub-cat-list">
                                                                <div class="card-columns">
                                                                    <?php $__currentLoopData = $category->subcategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subcategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                        <div class="card">
                                                                            <ul class="sub-cat-items">
                                                                                <li class="sub-cat-name"><a href="<?php echo e(route('products.subcategory', $subcategory->slug)); ?>"><?php echo e(__($subcategory->name)); ?></a></li>
                                                                                <?php $__currentLoopData = $subcategory->subsubcategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subsubcategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                    <?php
                                                                                        foreach (json_decode($subsubcategory->brands) as $brand) {
                                                                                            if(!in_array($brand, $brands)){
                                                                                                array_push($brands, $brand);
                                                                                            }
                                                                                        }
                                                                                    ?>
                                                                                    <li><a href="<?php echo e(route('products.subsubcategory', $subsubcategory->slug)); ?>"><?php echo e(__($subsubcategory->name)); ?></a></li>
                                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                            </ul>
                                                                        </div>
                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                </div>
                                                            </div>
                                                            <div class="sub-cat-featured">
                                                                
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-3">
                                                        <div class="sub-cat-brand">
                                                            <ul class="sub-brand-list">
                                                                <?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand_id): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <?php if(\App\Brand::find($brand_id) != null): ?>
                                                                        <li class="sub-brand-item">
                                                                            <a href="<?php echo e(route('products.brand', \App\Brand::find($brand_id)->slug)); ?>" ><img loading="lazy"  src="<?php echo e(asset(\App\Brand::find($brand_id)->logo)); ?>" class="img-fluid"></a>
                                                                        </li>
                                                                    <?php endif; ?>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- Navbar 
	    <section class="mb-4" style="background:#1398E6;">
                <div class="caorusel-box caoruselpadding">
                    <div class="slick-carousel" data-slick-items="6" data-slick-xl-items="5" data-slick-lg-items="4"  data-slick-md-items="3" data-slick-sm-items="2" data-slick-xs-items="2">
						<?php $__currentLoopData = \App\Brand::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $Brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						
                        <div class="product-card-2 card card-product m-2 shop-cards shop-tech">
                            <div class="card-body p-0">

                                <div class="card-image brandphoto">
								<a href="<?php echo e(route('products.brand', $Brand->slug)); ?>">
								<img src="<?php echo e(asset($Brand->logo)); ?>" alt="" ></a>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
    </section>-->
</div>
<?php /**PATH C:\xampp\htdocs\Puzzle\resources\views/frontend/inc/nav.blade.php ENDPATH**/ ?>