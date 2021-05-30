@extends('frontend.layouts.app')

@section('meta_title'){{ $product->meta_title }}@stop

@section('meta_description'){{ $product->meta_description }}@stop

@section('meta_keywords'){{ $product->tags }}@stop

@section('meta')
    <!-- Schema.org markup for Google+ -->
    <meta itemprop="name" content="{{ $product->meta_title }}">
    <meta itemprop="description" content="{{ $product->meta_description }}">
    <meta itemprop="image" content="{{ asset($product->meta_img) }}">

    <!-- Twitter Card data -->
    <meta name="twitter:card" content="product">
    <meta name="twitter:site" content="@publisher_handle">
    <meta name="twitter:title" content="{{ $product->meta_title }}">
    <meta name="twitter:description" content="{{ $product->meta_description }}">
    <meta name="twitter:creator" content="@author_handle">
    <meta name="twitter:image" content="{{ asset($product->meta_img) }}">
    <meta name="twitter:data1" content="{{ single_price($product->unit_price) }}">
    <meta name="twitter:label1" content="Price">

    <!-- Open Graph data -->
    <meta property="og:title" content="{{ $product->meta_title }}" />
    <meta property="og:type" content="product" />
    <meta property="og:url" content="{{ route('product', $product->slug) }}" />
    <meta property="og:image" content="{{ asset($product->meta_img) }}" />
    <meta property="og:description" content="{{ $product->meta_description }}" />
    <meta property="og:site_name" content="{{ env('APP_NAME') }}" />
    <meta property="og:price:amount" content="{{ single_price($product->unit_price) }}" />
@endsection

@section('content')
    <!-- SHOP GRID WRAPPER -->
    <section class="product-details-area">
        <div class="container">

            <div class="bg-white">

                <!-- Product gallery and Description -->
                <div class="row no-gutters cols-xs-space cols-sm-space cols-md-space">
                    <div class="col-lg-6">
                        <div class="product-gal sticky-top d-flex flex-row-reverse">
                            @if(is_array(json_decode($product->photos)) && count(json_decode($product->photos)) > 0)
                                <div class="product-gal-img">
                                    <img loading="lazy"  class="xzoom img-fluid" src="{{ asset(json_decode($product->photos)[0]) }}" xoriginal="{{ asset(json_decode($product->photos)[0]) }}" />
                                </div>
                                <div class="product-gal-thumb">
                                    <div class="xzoom-thumbs">
                                        @foreach (json_decode($product->photos) as $key => $photo)
                                            <a href="{{ asset($photo) }}">
                                                <img loading="lazy"  class="xzoom-gallery" width="80" src="{{ asset($photo) }}"  @if($key == 0) xpreview="{{ asset($photo) }}" @endif>
                                            </a>
                                        @endforeach
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <!-- Product description -->
                        <div class="product-description-wrapper">
                            <!-- Product title -->
                            <h2 class="product-title">
                                {{ __($product->name) }}
                            </h2>
                            <ul class="breadcrumb">
                                <li><a href="{{ route('home') }}">{{__('Home')}}</a></li>
                                <li><a href="{{ route('categories.all') }}">{{__('All Categories')}}</a></li>
                                <li><a href="{{ route('products.category', $product->category->slug) }}">{{ $product->category->name }}</a></li>
                                <li><a href="{{ route('products.subcategory', $product->subcategory->slug) }}">{{ $product->subcategory->name }}</a></li>
                            </ul>

                            <div class="row">
                                <div class="col-6">
                                    <!-- Rating stars 
                                    <div class="rating mb-1">
                                        @php
                                            $total = 0;
                                            $total += $product->reviews->count();
                                        @endphp
                                        <span class="star-rating">
                                            {{ renderStarRating($product->rating) }}
                                        </span>
                                        <span class="rating-count">({{ $total }} {{__('customer reviews')}})</span>
                                    </div>
                                    <div class="sold-by">
                                        <small class="mr-2">{{__('Sold by')}}: </small>
                                        @if ($product->added_by == 'seller' && \App\BusinessSetting::where('type', 'vendor_system_activation')->first()->value == 1)
                                            <a href="{{ route('shop.visit', $product->user->shop->slug) }}">{{ $product->user->shop->name }}</a>
                                        @else
                                            {{ __('Inhouse product') }}
                                        @endif
                                    </div>-->
                                </div>
								<!--
                                <div class="col-6 text-right">
                                    <ul class="inline-links inline-links--style-1">
                                        @php
                                            $qty = 5000;
                                            if(is_array(json_decode($product->variations, true)) && !empty(json_decode($product->variations, true))){
                                                foreach (json_decode($product->variations) as $key => $variation) {
                                                    $qty = 5000; //$variation->qty;
                                                }
                                            }
                                            else{
                                                $qty = 5000; //$product->current_stock;
                                            }
                                        @endphp
                                        @if ($qty > 0)
                                            <li>
                                                <span class="badge badge-md badge-pill bg-green">{{__('In stock')}}</span>
                                            </li>
                                        @else
                                            <li>
                                                <span class="badge badge-md badge-pill bg-red">{{__('Out of stock')}}</span>
                                            </li>
                                        @endif
                                    </ul>
                                </div>
								-->
                            </div>
                                <div class="row no-gutters mt-3">
                                    <div class="col-2">
                                        <div class="product-description-label">{{__('Code')}}: {{ ($product->productcode) }}</div>
                                    </div>
                                </div> 
                            @if(home_price($product->id) != home_discounted_price($product->id))

                                <div class="row no-gutters mt-4">
                                    <div class="col-12">
                                        <div class="product-description-label">{{__('Price')}}:</div>
                                    </div>
                                    <div class="col-10">
                                        <div class="product-price-old">
                                            <del>
                                                {{ home_price($product->id) }}
                                                <span>/{{ __('unit'.$product->unit) }}</span>
                                            </del>
                                        </div>
                                    </div>
                                </div>

                                <div class="row no-gutters mt-3">
                                    <div class="col-2">
                                        <div class="product-description-label mt-1">{{__('Discount Price')}}:</div>
                                    </div>
                                    <div class="col-10">
                                        <div class="product-price">
                                            <strong>
                                                {{ home_discounted_price($product->id) }}
                                            </strong>
                                            <span class="piece">/{{ __('unit'.$product->unit) }}</span>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <div class="row no-gutters mt-3">
                                    <div class="col-2">
                                        <div class="product-description-label">{{__('Price')}}:</div>
                                    </div>
                                    <div class="col-10">
                                        <div class="product-price">
                                            <strong>
                                                {{ home_discounted_price($product->id) }}
                                            </strong>
                                            <span class="piece">/{{ __('unit'.$product->unit) }}</span> 
                                        </div>
                                    </div>
                                </div>
                            @endif

                            <hr>

                            <form id="option-choice-form">
                                @csrf
                                <input type="hidden" name="id" value="{{ $product->id }}">

                                @foreach (json_decode($product->choice_options) as $key => $choice)

                                <div class="row no-gutters">
                                    <div class="col-2">
                                        <div class="product-description-label mt-2 ">{{ $choice->title }}:</div>
                                    </div>
                                    <div class="col-10">
                                        <ul class="list-inline checkbox-alphanumeric checkbox-alphanumeric--style-1 mb-2">
                                            @foreach ($choice->options as $key => $option)
                                                <li>
                                                    <input type="radio" id="{{ $choice->name }}-{{ $option }}" name="{{ $choice->name }}" value="{{ $option }}" @if($key == 0) checked @endif>
                                                    <label for="{{ $choice->name }}-{{ $option }}">{{ $option }}</label>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>

                                @endforeach

                                @if (count(json_decode($product->colors)) > 0)
                                    <div class="row no-gutters">
                                        <div class="col-2">
                                            <div class="product-description-label mt-2">{{__('Color')}}:</div>
                                        </div>
                                        <div class="col-10">
                                            <ul class="list-inline checkbox-color mb-1">
                                                @foreach (json_decode($product->colors) as $key => $color)
                                                    <li>
                                                        <input type="radio" id="{{ $product->id }}-color-{{ $key }}" name="color" value="{{ $color }}" @if($key == 0) checked @endif>
                                                        <label style="background: {{ $color }};" for="{{ $product->id }}-color-{{ $key }}" data-toggle="tooltip"></label>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>

                                    <hr>
                                @endif

                                <!-- Quantity + Add to cart -->
                                <div class="row no-gutters">
                                    <div class="col-2">
                                        <div class="product-description-label mt-2">{{__('Quantity')}}:</div>
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
                                            <!--<div class="avialable-amount">(<span id="available-quantity">{{ $qty }}</span> {{__('available')}})</div>-->
                                        </div>
                                    </div>
                                </div>

                                <hr>

                                <div class="row no-gutters pb-3 d-none" id="chosen_price_div">
                                    <div class="col-2">
                                        <div class="product-description-label">{{__('Total Price')}}:</div>
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
                                    @if ($qty > 0)
                                    <!--
                                        <button type="button" class="btn btn-styled btn-base-1 btn-icon-left strong-700 hov-bounce hov-shaddow buy-now" onclick="buyNow()">
                                            <i class="la la-shopping-cart"></i> {{__('Buy Now')}}
                                        </button>
                                    -->
                                        <button type="button" class="btn btn-styled btn-alt-base-1 c-white btn-icon-left strong-700 hov-bounce hov-shaddow ml-2 add-to-cart" onclick="addToCart()">
                                            <i class="la la-shopping-cart"></i>
                                            <span class="d-none d-md-inline-block"> {{__('Add to cart')}}</span>
                                        </button>
                                        <button type="button" class="btn btn-styled strong-700" style="background: #4f7ffe; color: white;" onclick="addToWishList({{ $product->id }})"><i class="la la-heart"></i> 
                                            {{__('Add to wishlist')}}
                                        </button> 
                                    @else
                                        <button type="button" class="btn btn-styled btn-base-1 btn-icon-left strong-700 hov-bounce hov-shaddow">
                                            <i class="la la-cart-arrow-down"></i> {{__('Out of Stock')}}
                                        </button>
                                    @endif
                                </div>
                            </div>


                            <hr class="mt-3 mb-0">

                            <div class="d-table width-100 mt-2">
                                <div class="d-table-cell">
                                    <!-- Add to wishlist button -->
                                    <!-- Add to compare button -->
                                    <!--<button type="button" class="btn btn-link btn-icon-left strong-700" onclick="addToCompare({{ $product->id }})">
                                        {{__('Add to compare')}}
                                    </button>-->
                                </div>
                            </div>

                            <hr class="mt-2">

                            <div class="row no-gutters mt-3">
                                <div class="col-2">
                                    <div class="product-description-label alpha-6">{{__('Description')}}:</div>
                                </div>
                                <div class="col-10">
                                                <?php echo $product->description; ?>
                                </div>
                            </div>
                            <div class="row no-gutters mt-3">
                                <div class="col-2">
                                    <div class="product-description-label alpha-6">{{__('Payment')}}:</div>
                                </div>
                                <div class="col-10">
                                    <ul class="inline-links">
                                        <li>
                                            <img loading="lazy"  src="{{ asset('frontend/images/icons/cards/visa.png') }}" width="30" class="">
                                        </li>
                                        <li>
                                            <img loading="lazy"  src="{{ asset('frontend/images/icons/cards/mastercard.png') }}" width="30" class="">
                                        </li>
                                        <li>
                                            <img loading="lazy"  src="{{ asset('frontend/images/icons/cards/maestro.png') }}" width="30" class="">
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            {{-- <div class="row no-gutters mt-3">
                                <div class="col-2">
                                    <img loading="lazy"  src="{{ asset('frontend/images/icons/buyer-protection.png') }}" width="40" class="">
                                </div>
                                <div class="col-10">
                                    <div class="heading-6 strong-700 text-info d-inline-block">Buyer protection</div><a href="" class="ml-2">View details</a>
                                    <ul class="list-symbol--1 pl-4 mb-0 mt-2">
                                        <li><strong>Full Refund</strong> if you don't receive your order</li>
                                        <li><strong>Full or Partial Refund</strong>, if the item is not as described</li>
                                    </ul>
                                </div>
                            </div> --}}
                            <hr class="mt-4">
                            <div class="row no-gutters mt-4">
                                <div class="col-2">
                                    <div class="product-description-label mt-2">{{__('Share')}}:</div>
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
                            @if($product->added_by == 'seller')
                                <div class="col">
                                    <a href="{{ route('shop.visit', $product->user->shop->slug) }}" class="d-block store-btn">{{__('Visit Store')}}</a>
                                </div>
                                <div class="col">
                                    <ul class="social-media social-media--style-1-v4 text-center">
                                        <li>
                                            <a href="{{ $product->user->shop->facebook }}" class="facebook" target="_blank" data-toggle="tooltip" data-original-title="Facebook">
                                                <i class="fa fa-facebook"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ $product->user->shop->google }}" class="google" target="_blank" data-toggle="tooltip" data-original-title="Google">
                                                <i class="fa fa-google"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ $product->user->shop->twitter }}" class="twitter" target="_blank" data-toggle="tooltip" data-original-title="Twitter">
                                                <i class="fa fa-twitter"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ $product->user->shop->youtube }}" class="youtube" target="_blank" data-toggle="tooltip" data-original-title="Youtube">
                                                <i class="fa fa-youtube"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="seller-top-products-box bg-white sidebar-box mb-3">
                        <div class="box-title">
                            {{__('Top Selling Products From This Seller')}}
                        </div>
                        <div class="box-content">
                            @foreach (filter_products(\App\Product::where('user_id', $product->user_id)->orderBy('num_of_sale', 'desc'))->limit(4)->get() as $key => $top_product)
                            <div class="mb-3 product-box-3">
                                <div class="clearfix">
                                    <div class="product-image float-left">
                                        <a href="{{ route('product', $top_product->slug) }}" style="background-image:url('{{ asset($top_product->thumbnail_img) }}');"></a>
                                    </div>
                                    <div class="product-details float-left">
                                        <h4 class="title text-truncate">
                                            <a href="{{ route('product', $top_product->slug) }}" class="d-block">{{ $top_product->name }}</a>
                                        </h4>
                                        <div class="star-rating star-rating-sm mt-1">
                                            {{ renderStarRating($top_product->rating) }}
                                        </div>
                                        <div class="price-box">
                                            <!-- @if(home_base_price($top_product->id) != home_discounted_base_price($top_product->id))
                                                <del class="old-product-price strong-400">{{ home_base_price($top_product->id) }}</del>
                                            @endif -->
                                            <span class="product-price strong-600">{{ home_discounted_base_price($top_product->id) }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-xl-9">
                    <div class="my-4 bg-white p-3">
                        <div class="section-title-1">
                            <h3 class="heading-5 strong-700 mb-0">
                                <span class="mr-4">{{__('Related products')}}</span>
                            </h3>
                        </div>
                        <div class="caorusel-box">
                            <div class="slick-carousel" data-slick-items="3" data-slick-xl-items="2" data-slick-lg-items="3"  data-slick-md-items="2" data-slick-sm-items="1" data-slick-xs-items="1"  data-slick-rows="2">
                                @foreach (filter_products(\App\Product::where('subcategory_id', $product->subcategory_id)->where('id', '!=', $product->id))->limit(10)->get() as $key => $related_product)
                                <div class="p-2">
                                    <div class="row no-gutters product-box-2 align-items-center">
                                        <div class="col-4">
                                            <div class="position-relative overflow-hidden h-100">
                                                <a href="{{ route('product', $related_product->slug) }}" class="d-block product-image h-100" style="background-image:url('{{ asset($related_product->thumbnail_img) }}');">
                                                </a>
                                                <div class="product-btns">
                                                    <button class="btn add-wishlist" title="Add to Wishlist" onclick="addToWishList({{ $related_product->id }})">
                                                        <i class="la la-heart-o"></i>
                                                    </button>
                                                    <button class="btn add-compare" title="Add to Compare" onclick="addToCompare({{ $related_product->id }})">
                                                        <i class="la la-refresh"></i>
                                                    </button>
                                                    <button class="btn quick-view" title="Quick view" onclick="showAddToCartModal({{ $related_product->id }})">
                                                        <i class="la la-eye"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-8 border-left">
                                            <div class="p-3">
                                                <h2 class="product-title mb-0 p-0 text-truncate">
                                                    <a href="{{ route('product', $related_product->slug) }}">{{ __($related_product->name) }}</a>
                                                </h2>
                                                <div class="star-rating star-rating-sm mb-2">
                                                    {{ renderStarRating($related_product->rating) }}
                                                </div>
                                                <div class="clearfix">
                                                    <div class="price-box float-left">
                                                        @if(home_base_price($related_product->id) != home_discounted_base_price($related_product->id))
                                                            <del class="old-product-price strong-400">{{ home_base_price($related_product->id) }}</del>
                                                        @endif
                                                        <span class="product-price strong-600">{{ home_discounted_base_price($related_product->id) }}</span>
                                                    </div>
                                                    <div class="float-right">
                                                        <button class="add-to-cart btn" title="Add to Cart" onclick="showAddToCartModal({{ $related_product->id }})">
                                                            <i class="la la-shopping-cart"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@section('script')
    <script type="text/javascript">
        $(document).ready(function() {
    		$('#share').share({
    			networks: ['facebook','twitter'],
    			theme: 'square'
    		});
            getVariantPrice();
    	});

    </script>
@endsection
