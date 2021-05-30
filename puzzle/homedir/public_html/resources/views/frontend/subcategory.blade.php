@extends('frontend.layouts.app')

@section('content')

	    <section class="mb-3">
            <div class="row caoruselpaddingcat">
			   <div class="col-xl-3 d-none d-xl-block">
                    <div class="bg-white sidebar-box mb-3">
                        <div class="box-title text-center">
                            {{__('Categories')}}
                        </div>
                        <div class="box-content">
                            <div class="category-accordion">
                                @foreach (\App\Category::orderby('sortnum', 'DESC')->get() as $key => $category)
                                    <div class="single-category">
										<a href="@php echo url('/subcategory/');  echo '/'; echo $category->id; @endphp">
											<button class="btn w-100 category-name collapsed" type="button" data-toggle="collapse" data-target="#category-{{ $key }}" aria-expanded="true">
												{{ __($category->name) }} 
											</button>
										</a>

                                    </div>
                                @endforeach
                            </div>
                        </div> 
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="row gutters-5">
					
                        @foreach (\App\SubCategory::where('category_id', $category_slug)->orderby('sortnum', 'ASC')->get() as $category)
                        @php 
                        $background_colors = array('itemhovercolor1', 'itemhovercolor2', 'itemhovercolor3', 'itemhovercolor4'); 
                        $rand_background = $background_colors[array_rand($background_colors)];
                        @endphp 
                            <div class="mb-2 col-lg-2 col-md-2 col-6 col-sm-6 col-xs-2">
                                <a href="{{ route('products.subcategory', $category->slug) }}" class="bg-white itemhover @php echo $rand_background; @endphp d-block c-base-2 box-2 icon-anim">
                                    <div class="row align-items-center no-gutters">
                                        <div class="col-12 text-center">
                                            <img loading="lazy" data-alt-src="{{ asset($category->bannerhover) }}" src="{{ asset($category->banner) }}" alt="" class="categoryimage" style="border-radius: 10px;">
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
@endsection
