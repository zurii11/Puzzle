<div class="card regmodelreg">
				<span class="exitmodel"><i class="fa fa-times" aria-hidden="true"></i></span>
                            <div class="text-center px-35 pt-5">
                                <h3 class="heading heading-4 strong-500">
                                    {{__('Create an account.')}}
                                </h3>
                            </div>
                            <div class="px-5 py-3 py-lg-5">
                                <div class="row align-items-center">
                                    <div class="col-12 col-lg">
                                        <form class="form-default" role="form" action="{{ route('register') }}" method="POST">
                                            @csrf
                                            <div class="row">
                                                <div class="col-6">
													<div class="form-group"> 
														<select id="profile_type" name="profile_type" class="form-control" style="height: 47px; color: #b1b1b1;">
																<option value="1">{{__('Physical person')}}</option>
																<option value="2">{{__('Legal entity')}}</option>
														</select>
													</div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <div class="input-group input-group--style-1">
                                                            <input id="regname" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{__('Name Surname')}}" name="name">
                                                            <span class="input-group-addon">
                                                                <i class="text-md la la-user"></i>
                                                            </span>
                                                            @if ($errors->has('name'))
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $errors->first('name') }}</strong>
                                                                </span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <div class="input-group input-group--style-1">
                                                            <input id="regtypeid" type="text" class="form-control{{ $errors->has('usertype_id') ? ' is-invalid' : '' }}" placeholder="{{__('Personal Id')}}" name="usertype_id">
                                                            <span class="input-group-addon">
                                                                <i class="text-md la la-user"></i>
                                                            </span>
                                                            @if ($errors->has('usertype_id'))
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $errors->first('usertype_id') }}</strong>
                                                                </span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <div class="input-group input-group--style-1">
                                                            <input type="text" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" placeholder="{{__('phone')}}" name="phone">
                                                            <span class="input-group-addon">
                                                                <i class="text-md la la-phone"></i>
                                                            </span>
                                                            @if ($errors->has('phone'))
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $errors->first('phone') }}</strong>
                                                                </span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-6">
													<div class="form-group">
													  <select id="filter_region" name="region" class="form-control" style="height: 47px; color: #b1b1b1;">
														    <option value="">{{__('region')}}</option>
															<option value="adjara">{{__('adjara')}}</option>
															<option value="guria">{{__('guria')}}</option>
															<option value="tbilisi">{{__('tbilisi')}}</option>
															<option value="imereti">{{__('imereti')}}</option>
															<option value="samegrelo">{{__('samegrelo')}}</option>
															<option value="qvemokartli">{{__('qvemokartli')}}</option>
														</select>
														@php
															if(Session::has('locale')){
																$locale = Session::get('locale', Config::get('app.locale'));
															}
															else{
																$locale = 'en';
															}
														@endphp
														<input type="hidden" id="language" value="{{$locale}}">
													</div>
                                                </div>
                                                <div class="col-6">
													<div class="form-group">
													  <select id="filter_city" name="city" class="form-control" style="height: 47px; color: #b1b1b1;">
														    <option value="">{{__('City')}}</option>
														</select>
													</div>
                                                </div>
                                                <div class="col-12"> 
													<div class="form-group">
                                                        <!-- <label>{{ __('name') }}</label> -->
                                                        <div class="input-group input-group--style-1">
                                                            <input type="text" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" value="{{ old('address') }}" placeholder="{{ __('Address') }}" name="address">
                                                            <span class="input-group-addon">
                                                                <i class="text-md la la-map"></i>
                                                            </span>
                                                            @if ($errors->has('address'))
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $errors->first('address') }}</strong>
                                                                </span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <!-- <label>{{ __('email') }}</label> -->
                                                        <div class="input-group input-group--style-1">
                                                            <input type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ old('email') }}" placeholder="{{ __('Email') }}" name="email">
                                                            <span class="input-group-addon">
                                                                <i class="text-md la la-envelope"></i>
                                                            </span>
                                                            @if ($errors->has('email'))
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $errors->first('email') }}</strong>
                                                                </span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <!-- <label>{{ __('password') }}</label> -->
                                                        <div class="input-group input-group--style-1">
                                                            <input type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="{{ __('Password') }}" name="password">
                                                            <span class="input-group-addon">
                                                                <i class="text-md la la-lock"></i>
                                                            </span>
                                                            @if ($errors->has('password'))
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $errors->first('password') }}</strong>
                                                                </span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <!-- <label>{{ __('confirm_password') }}</label> -->
                                                        <div class="input-group input-group--style-1">
                                                            <input type="password" class="form-control" placeholder="{{ __('Confirm Password') }}" name="password_confirmation">
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
                                                        <div class="g-recaptcha" data-sitekey="{{ env('CAPTCHA_KEY') }}">
                                                            @if ($errors->has('g-recaptcha-response'))
                                                                <span class="invalid-feedback" style="display:block">
                                                                    <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                                                                </span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="checkbox pad-btm text-left">
                                                        <input class="magic-checkbox" type="checkbox" name="checkbox_example_1" id="checkboxExample_1a" required>
                                                        <label for="checkboxExample_1a" class="text-sm">{{__('By signing up you agree to our terms and conditions.')}}</label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row align-items-center">
                                                <div class="col-12 text-right  mt-3">
                                                    <button type="submit" class="btn btn-styled btn-base-1 w-100 btn-md">{{ __('Create Account') }}</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center px-35 pb-3">
                                <p class="text-md">
                                    {{__('Already have account ?')}}<a id="loginback" href="#" class="strong-600">{{__('Log In')}}</a>
                                </p>
                            </div>
                        </div>
<div class="card regmodel">
				<span class="exitmodel"><i class="fa fa-times" aria-hidden="true"></i></span>
                            <div class="text-center px-35 pt-5">
                                <h3 class="heading heading-4 strong-500">
                                    {{__('Login to your account.')}}
                                </h3>
                            </div>
                            <div class="px-5 py-3 py-lg-5">
                                <div class="row align-items-center">
                                    <div class="col-12 col-lg">
                                        <form class="form-default" role="form" action="{{ route('login') }}" method="POST">
                                            @csrf
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <!-- <label>{{ __('email') }}</label> -->
                                                        <div class="input-group input-group--style-1">
                                                            <input type="email" class="form-control form-control-sm {{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ old('email') }}" placeholder="{{__('Email')}}" name="email" id="email">
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
                                                        <!-- <label>{{ __('password') }}</label> -->
                                                        <div class="input-group input-group--style-1">
                                                            <input type="password" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="{{__('Password')}}" name="password" id="password">
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
                                                            <input id="demo-form-checkbox" class="magic-checkbox" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                                            <label for="demo-form-checkbox" class="text-sm">
                                                                {{ __('Remember Me') }}
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                @if(env('MAIL_USERNAME') != null && env('MAIL_PASSWORD') != null)
                                                    <div class="col-6 text-right">
                                                        <a href="{{ route('password.request') }}" class="link link-xs link--style-3">{{__('Forgot password?')}}</a>
                                                    </div>
                                                @endif
                                            </div>

                                            <div class="row">
                                                <div class="col text-center">
                                                    <button type="submit" class="btn btn-styled btn-base-1 btn-md w-100">{{ __('Login') }}</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center px-35 pb-3">
                                <p class="text-md">
                                    {{__('Need an account?')}} <a href="#" id="registration" class="strong-600">{{__('Register Now')}}</a>
                                </p>
                            </div>
								{{-- <div class="bg-white p-4 mx-auto mt-4">
								<div class="">
									<table class="table table-responsive table-bordered mb-0">
										<tbody>
											<tr>
												<td>{{__('Seller Account')}}</td>
												<td><button class="btn btn-info" onclick="autoFillSeller()">Copy credentials</button></td>
											</tr>
											<tr>
												<td>{{__('Customer Account')}}</td>
												<td><button class="btn btn-info" onclick="autoFillCustomer()">Copy credentials</button></td>
											</tr>
										</tbody>
									</table>
								</div>
							</div> --}}
                        </div>
<div class="header bg-white">
    <!-- Top Bar -->
    <div class="top-navbar">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col">
                    <ul class="inline-links d-lg-inline-block d-flex justify-content-between">
                        <li class="dropdown" id="lang-change">
                            @php
                                if(Session::has('locale')){
                                    $locale = Session::get('locale', Config::get('app.locale'));
                                }
                                else{
                                    $locale = 'en';
                                }
                            @endphp
                            <a href="" class="dropdown-toggle top-bar-item" data-toggle="dropdown">
                                <img loading="lazy"  src="{{ asset('frontend/images/icons/flags/'.$locale.'.png') }}" class="flag"><span class="language">{{ \App\Language::where('code', $locale)->first()->name }}</span>
                            </a>
                            <ul class="dropdown-menu">
                                @foreach (\App\Language::all() as $key => $language)
                                    <li class="dropdown-item @if($locale == $language) active @endif">
                                        <a href="#" data-flag="{{ $language->code }}"><img loading="lazy"  src="{{ asset('frontend/images/icons/flags/'.$language->code.'.png') }}" class="flag"><span class="language">{{ $language->name }}</span></a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                        <li>
                            <a href="{{ route('home') }}" class="top-bar-item">{{__('Home')}}</a>
                        </li>
                    </ul>
                </div>

                <div class="col-5 text-right d-none d-lg-block">
                    <ul class="inline-links">
                        <li>
                            <a href="{{ route('contact') }}" class="top-bar-item">{{__('Contact')}}</a>
                        </li>
                        @auth
                        <li>
                            <a href="{{ route('dashboard') }}" class="top-bar-item">{{__('My Profile')}}</a>
                        </li>
                        <li>
                            <a href="{{ route('logout') }}" class="top-bar-item">{{__('Logout')}}</a>
                        </li>
                        @else
                        <li>
                            <a id="login" href="#" class="top-bar-item">{{__('Login')}}</a>
                        </li>
                        @endauth
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

                    @auth
                        <div class="widget-profile-box px-3 py-4 d-flex align-items-center">
                                <div class="image " style="background-image:url('{{ Auth::user()->avatar_original }}')"></div>
                                <div class="name">{{ Auth::user()->name }}</div>
                        </div>
                        <div class="side-login px-3 pb-3">
                            <a href="{{ route('logout') }}">{{__('Sign Out')}}</a>
                        </div>
                    @else
                        <div class="widget-profile-box px-3 py-4 d-flex align-items-center">
                                <div class="image " style="background-image:url('{{ asset('frontend/images/icons/user-placeholder.jpg') }}')"></div>
                        </div>
                        <div class="side-login px-3 pb-3">
                            <a href="{{ route('user.login') }}">{{__('Sign In')}}</a>
                            <a href="{{ route('user.registration') }}">{{__('Registration')}}</a>
                        </div>
                    @endauth
                </div>
                <div class="side-menu-list px-3">
                    <ul class="side-user-menu">
                        <li>
                            <a href="{{ route('home') }}">
                                <i class="la la-home"></i>
                                <span>{{__('Home')}}</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('dashboard') }}">
                                <i class="la la-dashboard"></i>
                                <span>{{__('Dashboard')}}</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('cart') }}">
                                <i class="la la-shopping-cart"></i>
                                <span>{{__('Cart')}}</span>
                                @if (Auth::check())
                                    @if (count($cart = App\Carts::where('user_id', Auth::user()->id)->get()) > 0)
                                        <span class="badge" id="cart_items_sidenav">{{ count($cart)}}</span>
                                    @else
                                        <span class="badge" id="cart_items_sidenav">0</span>
                                    @endif
                                @else
                                    @if(Session::has('cart'))
                                        <span class="badge" id="cart_items_sidenav">{{ count(Session::get('cart'))}}</span>
                                    @else
                                        <span class="badge" id="cart_items_sidenav">0</span>
                                    @endif
                                @endif
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('wishlists.index') }}">
                                <i class="la la-heart-o"></i>
                                <span>{{__('Wishlist')}}</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('profile') }}">
                                <i class="la la-user"></i>
                                <span>{{__('Manage Profile')}}</span>
                            </a>
                        </li>
					</ul>
                    @if (Auth::check() && Auth::user()->user_type == 'seller')
                        <div class="sidebar-widget-title py-0">
                            <span>{{__('Shop Options')}}</span>
                        </div>
                        <ul class="side-seller-menu">
                            <li>
                                <a href="{{ route('seller.products') }}">
                                    <i class="la la-diamond"></i>
                                    <span>{{__('Products')}}</span>
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('orders.index') }}">
                                    <i class="la la-file-text"></i>
                                    <span>{{__('Orders')}}</span>
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('shops.index') }}">
                                    <i class="la la-cog"></i>
                                    <span>{{__('Shop Setting')}}</span>
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('payments.index') }}">
                                    <i class="la la-cc-mastercard"></i>
                                    <span>{{__('Payment History')}}</span>
                                </a>
                            </li>
                        </ul>
                        <div class="sidebar-widget-title py-0">
                            <span>{{__('Earnings')}}</span>
                        </div>
                        <div class="widget-balance py-3">
                            <div class="text-center">
                                <div class="heading-4 strong-700 mb-4">
                                    @php
                                        $orderDetails = \App\OrderDetail::where('seller_id', Auth::user()->id)->where('created_at', '>=', date('-30d'))->get();
                                        $total = 0;
                                        foreach ($orderDetails as $key => $orderDetail) {
                                            if($orderDetail->order->payment_status == 'paid'){
                                                $total += $orderDetail->price;
                                            }
                                        }
                                    @endphp
                                    <small class="d-block text-sm alpha-5 mb-2">{{__('Your earnings (current month)')}}</small>
                                    <span class="p-2 bg-base-1 rounded">{{ single_price($total) }}</span>
                                </div>
                                <table class="text-left mb-0 table w-75 m-auto">
                                    <tbody>
                                        <tr>
                                            @php
                                                $orderDetails = \App\OrderDetail::where('seller_id', Auth::user()->id)->get();
                                                $total = 0;
                                                foreach ($orderDetails as $key => $orderDetail) {
                                                    if($orderDetail->order->payment_status == 'paid'){
                                                        $total += $orderDetail->price;
                                                    }
                                                }
                                            @endphp
                                            <td class="p-1 text-sm">
                                                {{__('Total earnings')}}:
                                            </td>
                                            <td class="p-1">
                                                {{ single_price($total) }}
                                            </td>
                                        </tr>
                                        <tr>
                                            @php
                                                $orderDetails = \App\OrderDetail::where('seller_id', Auth::user()->id)->where('created_at', '>=', date('-60d'))->where('created_at', '<=', date('-30d'))->get();
                                                $total = 0;
                                                foreach ($orderDetails as $key => $orderDetail) {
                                                    if($orderDetail->order->payment_status == 'paid'){
                                                        $total += $orderDetail->price;
                                                    }
                                                }
                                            @endphp
                                            <td class="p-1 text-sm">
                                                {{__('Last Month earnings')}}:
                                            </td>
                                            <td class="p-1">
                                                {{ single_price($total) }}
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    @endif
                    <div class="sidebar-widget-title py-0">
                        <span>Categories</span>
                    </div>
                    <ul class="side-seller-menu">
                        @foreach (\App\Category::all() as $key => $category)
                            <li>
                            <a href="{{ route('products.category', $category->slug) }}" class="text-truncate">
                                <img loading="lazy"  class="cat-image" src="{{ asset($category->icon) }}" width="13">
                                <span>{{ __($category->name) }}</span>
                            </a>
                        </li>
                        @endforeach
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
                            <a class="navbar-brand w-100" href="{{ route('home') }}">
                                @php
                                    $generalsetting = \App\GeneralSetting::first();
                                @endphp
                                @if($generalsetting->logo != null)
                                    <img loading="lazy"  src="{{ asset($generalsetting->logo) }}" class="" alt="active shop">
                                @else
                                    <img loading="lazy"  src="{{ asset('frontend/images/logo/logo.png') }}" class="" alt="active shop">
                                @endif
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-6 col-4 position-static d-none d-lg-block">
						<div class="home-slide">
							<div class="home-slide">
								<div class="slick-carousel" data-slick-arrows="true" data-slick-dots="true" data-slick-autoplay="true" style="height: 155px;">
									@foreach (\App\Slider::where('published', 1)->get() as $key => $slider)
										<a href="https://easyway.ge/" target="_blank">
										<div class="" >
											<img loading="lazy"  class="d-block w-100 h-100" src="{{ asset($slider->photo) }}" alt="Slider Image">
										</div>
										</a>
									@endforeach
								</div>
							</div>
						</div>
                        <div class="d-flex w-100" style="margin-bottom: 15px;">
                            <div class="search-box flex-grow-1 px-4">
                                <form action="{{ route('search') }}" method="GET">
                                    <div class="d-flex position-relative">
                                        <div class="d-lg-none search-box-back">
                                            <button class="" type="button"><i class="la la-long-arrow-left"></i></button>
                                        </div>
                                        <div class="w-100">
                                            <input type="text" aria-label="Search" id="search" name="q" class="w-100" placeholder="{{__('Search')}}" autocomplete="off">
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
                                <form action="{{ route('search') }}" method="GET">
                                    <div class="d-flex position-relative">
                                        <div class="d-lg-none search-box-back">
                                            <button class="" type="button"><i class="la la-long-arrow-left"></i></button>
                                        </div>
                                        <div class="w-100">
                                            <input type="text" aria-label="Search" id="search" name="q" class="w-100" placeholder="{{__('Search')}}" autocomplete="off">
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
                                            <span class="nav-box-text d-none d-xl-inline-block">{{__('Cart')}}</span>
                                            @if (Auth::check())
                                                @if (count($cart = App\Carts::where('user_id', Auth::user()->id)->get()) > 0)
                                                    <span class="nav-box-number">{{ count($cart)}}</span>
                                                @else
                                                    <span class="nav-box-number">0</span>
                                                @endif
                                            @else
                                                @if(Session::has('cart'))
                                                    <span class="nav-box-number">{{ count(Session::get('cart'))}}</span>
                                                @else
                                                    <span class="nav-box-number">0</span>
                                                @endif
                                            @endif
                                        </a>
                                        <ul class="dropdown-menu dropdown-menu-right px-0">
                                            <li>
                                                <div class="dropdown-cart px-0">
                                                    @if (Auth::check())
                                                        @if (count($cart = App\Carts::where('user_id', Auth::user()->id)->get()) > 0)
                                                            <div class="dc-header">
                                                                <h3 class="heading heading-6 strong-700">{{__('Cart Items')}}</h3>
                                                            </div>
                                                            <div class="dropdown-cart-items c-scrollbar">
                                                                @php
                                                                    $total = 0
                                                                @endphp
                                                                @foreach($cart as $cartItem)
                                                                    @php
                                                                        $product = \App\Product::find($cartItem['product_id']);
                                                                        $total = $total + $cartItem['price']*$cartItem['quantity'];
                                                                        $key = $cartItem['id'];
                                                                    @endphp
                                                                    <div class="dc-item">
                                                                        <div class="d-flex align-items-center">
                                                                            <div class="dc-image">
                                                                                <a href="{{ route('product', $product->slug) }}">
                                                                                    <img loading="lazy"  src="{{ asset($product->thumbnail_img) }}" class="img-fluid" alt="">
                                                                                </a>
                                                                            </div>
                                                                            <div class="dc-content">
                                                                                <span class="d-block dc-product-name text-capitalize strong-600 mb-1">
                                                                                    <a href="{{ route('product', $product->slug) }}">
                                                                                        {{ __($product->name) }}
                                                                                    </a>
                                                                                </span>

                                                                                <span class="dc-quantity">x{{ $cartItem['quantity'] }}</span>
                                                                                <span class="dc-price">{{ single_price($cartItem['price']*$cartItem['quantity']) }}</span>
                                                                            </div>
                                                                            <div class="dc-actions">
                                                                                <button onclick="removeFromCart({{ $key }})">
                                                                                    <i class="la la-close"></i>
                                                                                </button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                            <div class="dc-item py-3">
                                                                <span class="subtotal-text">{{__('Subtotal')}}</span>
                                                                <span class="subtotal-amount">{{ single_price($total) }}</span>
                                                            </div>
                                                            <div class="py-2 text-center dc-btn">
                                                                <ul class="inline-links inline-links--style-3">
                                                                    <li class="px-1">
                                                                        <a href="{{ route('cart') }}" class="link link--style-1 text-capitalize btn btn-base-1 px-3 py-1">
                                                                            <i class="la la-shopping-cart"></i> {{__('View cart')}}
                                                                        </a>
                                                                    </li>
                                                                    <li class="px-1">
                                                                        <a href="{{ route('checkout.shipping_info') }}" class="link link--style-1 text-capitalize btn btn-base-1 px-3 py-1 light-text">
                                                                            <i class="la la-mail-forward"></i> {{__('Checkout')}}
                                                                            </a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        @else
                                                            <div class="dc-header">
                                                                <h3 class="heading heading-6 strong-700">{{__('Your Cart is empty')}}</h3>
                                                            </div>
                                                        @endif
                                                    @else
                                                        @if(Session::has('cart'))
                                                            @if(count($cart = Session::get('cart')) > 0)
                                                                <div class="dc-header">
                                                                    <h3 class="heading heading-6 strong-700">{{__('Cart Items')}}</h3>
                                                                </div>
                                                                <div class="dropdown-cart-items c-scrollbar">
                                                                    @php
                                                                        $total = 0;
                                                                    @endphp
                                                                    @foreach($cart as $key => $cartItem)
                                                                        @php
                                                                            $product = \App\Product::find($cartItem['id']);
                                                                            $total = $total + $cartItem['price']*$cartItem['quantity'];
                                                                        @endphp
                                                                        <div class="dc-item">
                                                                            <div class="d-flex align-items-center">
                                                                                <div class="dc-image">
                                                                                    <a href="{{ route('product', $product->slug) }}">
                                                                                        <img loading="lazy"  src="{{ asset($product->thumbnail_img) }}" class="img-fluid" alt="">
                                                                                    </a>
                                                                                </div>
                                                                                <div class="dc-content">
                                                                                    <span class="d-block dc-product-name text-capitalize strong-600 mb-1">
                                                                                        <a href="{{ route('product', $product->slug) }}">
                                                                                            {{ __($product->name) }}
                                                                                        </a>
                                                                                    </span>

                                                                                    <span class="dc-quantity">x{{ $cartItem['quantity'] }}</span>
                                                                                    <span class="dc-price">{{ single_price($cartItem['price']*$cartItem['quantity']) }}</span>
                                                                                </div>
                                                                                <div class="dc-actions">
                                                                                    <button onclick="removeFromCart({{ $key }})">
                                                                                        <i class="la la-close"></i>
                                                                                    </button>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    @endforeach
                                                                </div>
                                                                <div class="dc-item py-3">
                                                                    <span class="subtotal-text">{{__('Subtotal')}}</span>
                                                                    <span class="subtotal-amount">{{ single_price($total) }}</span>
                                                                </div>
                                                                <div class="py-2 text-center dc-btn">
                                                                    <ul class="inline-links inline-links--style-3">
                                                                        <li class="px-1">
                                                                            <a href="{{ route('cart') }}" class="link link--style-1 text-capitalize btn btn-base-1 px-3 py-1">
                                                                                <i class="la la-shopping-cart"></i> {{__('View cart')}}
                                                                            </a>
                                                                        </li>
                                                                        @if (Auth::check())
                                                                        <li class="px-1">
                                                                            <a href="{{ route('checkout.shipping_info') }}" class="link link--style-1 text-capitalize btn btn-base-1 px-3 py-1 light-text">
                                                                                <i class="la la-mail-forward"></i> {{__('Checkout')}}
                                                                            </a>
                                                                        </li>
                                                                        @endif
                                                                    </ul>
                                                                </div>
                                                            @else
                                                                <div class="dc-header">
                                                                    <h3 class="heading heading-6 strong-700">{{__('Your Cart is empty')}}</h3>
                                                                </div>
                                                            @endif
                                                        @else
                                                            <div class="dc-header">
                                                                <h3 class="heading heading-6 strong-700">{{__('Your Cart is empty')}}</h3>
                                                            </div>
                                                        @endif
                                                    @endif
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
                                <span>{{__('CATEGORIES')}}</span>
                                <a href="{{ route('categories.all') }}" class="d-inline-block">See All ></a>
                            </div>
                            <ul class="categories">
                                @foreach (\App\Category::all()->take(11) as $key => $category)
                                    @php
                                        $brands = array();
                                    @endphp
                                    <li>
                                        <a href="{{ route('products.category', $category->slug) }}">
                                            <img loading="lazy"  class="cat-image" src="{{ asset($category->icon) }}" width="30">
                                            <span class="cat-name">{{ __($category->name) }}</span>
                                        </a>
                                        @if(count($category->subcategories)>0)
                                            <div class="sub-cat-menu c-scrollbar">
                                                <div class="sub-cat-main row no-gutters">
                                                    <div class="col-9">
                                                        <div class="sub-cat-content">
                                                            <div class="sub-cat-list">
                                                                <div class="card-columns">
                                                                    @foreach ($category->subcategories as $subcategory)
                                                                        <div class="card">
                                                                            <ul class="sub-cat-items">
                                                                                <li class="sub-cat-name"><a href="{{ route('products.subcategory', $subcategory->slug) }}">{{ __($subcategory->name) }}</a></li>
                                                                                @foreach ($subcategory->subsubcategories as $subsubcategory)
                                                                                    @php
                                                                                        foreach (json_decode($subsubcategory->brands) as $brand) {
                                                                                            if(!in_array($brand, $brands)){
                                                                                                array_push($brands, $brand);
                                                                                            }
                                                                                        }
                                                                                    @endphp
                                                                                    <li><a href="{{ route('products.subsubcategory', $subsubcategory->slug) }}">{{ __($subsubcategory->name) }}</a></li>
                                                                                @endforeach
                                                                            </ul>
                                                                        </div>
                                                                    @endforeach
                                                                </div>
                                                            </div>
                                                            <div class="sub-cat-featured">
                                                                {{-- <ul class="sub-cat-featured-list inline-links d-flex">
                                                                    <li class="col">
                                                                        <a href="" >
                                                                            <span class="featured-name">New arrival plus size</span>
                                                                            <span class="featured-img">
                                                                                <img loading="lazy"  src="{{ asset('frontend/images/girls/1.png') }}" class="img-fluid">
                                                                            </span>
                                                                        </a>
                                                                    </li>
                                                                    <li class="col">
                                                                        <a href="" >
                                                                            <span class="featured-name">Sweater Collection</span>
                                                                            <span class="featured-img">
                                                                                <img loading="lazy"  src="{{ asset('frontend/images/girls/2.png') }}" class="img-fluid">
                                                                            </span>
                                                                        </a>
                                                                    </li>
                                                                    <li class="col">
                                                                        <a href="" >
                                                                            <span class="featured-name">High Quality Formal Dresses</span>
                                                                            <span class="featured-img">
                                                                                <img loading="lazy"  src="{{ asset('frontend/images/girls/3.png') }}" class="img-fluid">
                                                                            </span>
                                                                        </a>
                                                                    </li>
                                                                </ul> --}}
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-3">
                                                        <div class="sub-cat-brand">
                                                            <ul class="sub-brand-list">
                                                                @foreach ($brands as $brand_id)
                                                                    @if(\App\Brand::find($brand_id) != null)
                                                                        <li class="sub-brand-item">
                                                                            <a href="{{ route('products.brand', \App\Brand::find($brand_id)->slug) }}" ><img loading="lazy"  src="{{ asset(\App\Brand::find($brand_id)->logo) }}" class="img-fluid"></a>
                                                                        </li>
                                                                    @endif
                                                                @endforeach
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    </li>
                                @endforeach
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
						@foreach (\App\Brand::all() as $key => $Brand)
						
                        <div class="product-card-2 card card-product m-2 shop-cards shop-tech">
                            <div class="card-body p-0">

                                <div class="card-image brandphoto">
								<a href="{{ route('products.brand', $Brand->slug) }}">
								<img src="{{ asset($Brand->logo) }}" alt="" ></a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
    </section>-->
</div>
