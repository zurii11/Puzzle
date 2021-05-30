@extends('frontend.layouts.app')

@section('content')
	    <section class="mb-3" style="margin-top: 15px;">
            <div class="row caoruselpaddingcat">
                <div class="col-lg-12">
                    <div class="row gutters-5"> 
                        @foreach (\App\Category::orderby('sortnum', 'DESC')->get() as $category) 
                        @php 
                        $background_colors = array('itemhovercolor1', 'itemhovercolor2', 'itemhovercolor3', 'itemhovercolor4');
                        $rand_background = $background_colors[array_rand($background_colors)];
                        @endphp 
                            <div class="mb-2 col-lg-2 col-6 col-sm-2 col-xs-2">
                                <a href="{{ route('subcategory', $category->id) }}" class="bg-white d-block c-base-2 box-2 icon-anim">
                                    <div class="row align-items-center no-gutters itemhover @php echo $rand_background; @endphp">
                                        <div class="col-12 text-center">
                                            <!-- data-alt-src="{{ asset($category->bannerhover) }}" -->
                                            <img loading="lazy"  src="{{ asset($category->banner) }}" alt="" class="categoryimage xyzhover" style="border-radius: 10px;">
                                        </div>
                                        <div class="info col-12">
                                            <div class="name text-truncate pl-3 pr-3 pb-3" style="text-align: center;">{{ $category->name }}</div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
    </section>
    
    <section class="mb-3 py-4">
        <div class="container">
            <div class="row gutters-10">
                <div class="col-lg-6">
                    <div class="section-title-1 clearfix">
                        <h3 class="heading-5 strong-700 mb-0 float-left">
                            <span class="mr-4">{{__('Top Catogories')}}</span>
                        </h3>
                    </div>
                    <div class="row gutters-5"> 
                        @foreach (\App\Category::where('top', 1)->get() as $category)
                            <div class="mb-3 col-6">
                                <a href="{{ route('products.category', $category->slug) }}" class="bg-white border d-block c-base-2 box-2 icon-anim pl-2">
                                    <div class="row align-items-center no-gutters">
                                        <div class="col-3 text-center">
                                            <img loading="lazy"  src="{{ asset($category->banner) }}" alt="" class="img-fluid img">
                                        </div>
                                        <div class="info col-7">
                                            <div class="name text-truncate pl-3 py-4">{{ __($category->name) }}</div>
                                        </div>
                                        <div class="col-2">
                                            <i class="la la-angle-right c-base-1"></i>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="section-title-1 clearfix">
                        <h3 class="heading-5 strong-700 mb-0 float-left">
                            <span class="mr-4">{{__('Top Brands')}}</span>
                        </h3>
                    </div>
                    <div class="row">
                        @foreach (\App\Brand::where('top', 1)->get() as $brand)
                            <div class="mb-3 col-6">
                                <a href="{{ route('products.brand', $brand->slug) }}" class="bg-white border d-block c-base-2 box-2 icon-anim pl-2">
                                    <div class="row align-items-center no-gutters">
                                        <div class="col-3 text-center">
                                            <img loading="lazy"  src="{{ asset($brand->logo) }}" alt="" class="img-fluid img">
                                        </div>
                                        <div class="info col-7">
                                            <div class="name text-truncate pl-3 py-4">{{ __($brand->name) }}</div>
                                        </div>
                                        <div class="col-2">
                                            <i class="la la-angle-right c-base-1"></i>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

    </section>
	<section class="slice-sm footer-top-bar bg-white">
    <div class="container sct-inner">
        <div class="row no-gutters">
            <div class="col-lg-3 col-md-6">
                <div class="footer-top-box text-center">
                    <a href="{{ route('sellerpolicy') }}">
                        <i class="la la-file-text"></i>
                        <h4 class="heading-5">{{__('Seller Policy')}}</h4>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="footer-top-box text-center">
                    <a href="{{ route('returnpolicy') }}">
                        <i class="la la-mail-reply"></i>
                        <h4 class="heading-5">{{__('Return Policy')}}</h4>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="footer-top-box text-center">
                    <a href="{{ route('supportpolicy') }}">
                        <i class="la la-support"></i>
                        <h4 class="heading-5">{{__('Support Policy')}}</h4>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="footer-top-box text-center">
                    <a href="{{ route('profile') }}">
                        <i class="la la-dashboard"></i>
                        <h4 class="heading-5">{{__('My Profile')}}</h4>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
