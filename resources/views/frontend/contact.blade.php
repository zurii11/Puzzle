@extends('frontend.layouts.app')

@section('content')  
  
<section class="gry-bg py-5">
        <div class="profile">
            <div class="container">
                <div class="row">
                    <div class="col-xl-8 offset-xl-2">
                        <div class="card" style="border-top-left-radius: 50px; border-top-right-radius: 50px;">
						
                            <div class="text-center px-35 ">
                                <h3 class="heading heading-4 strong-500" style="color: white; background: #4f7ffe; height: 40px; border-top-left-radius: 50px;  border-top-right-radius: 50px;">
                                    {{__('Contact')}}
                                </h3>
                            </div>
							@php
							$generalsetting = \App\GeneralSetting::first();
							@endphp
							<div class="row">
								<div class="col-lg-4 col-md-4" style="padding-top: 20px;">
									<div class="col text-center text-md-left">
										<ul class="footer-links contact-widget">
											<li>
											   <span class="d-block opacity-5">{{__('Address')}}:</span>
											   <span class="d-block">{{ $generalsetting->address }}</span>
											</li>
										</ul>
									</div>
								</div>
								<div class="col-lg-4 col-md-4" style="padding-top: 20px;">
									<div class="col text-center text-md-left">
										<ul class="footer-links contact-widget">
											<li>
											   <span class="d-block opacity-5">{{__('Phone')}}:</span>
											   <span class="d-block">{{ $generalsetting->phone }}</span>
											</li>
										</ul>
									</div>
								</div>
								<div class="col-lg-4 col-md-4" style="padding-top: 20px;">
									<div class="col text-center text-md-left">
										<ul class="footer-links contact-widget">
											<li>
											   <span class="d-block opacity-5">{{__('Email')}}:</span>
											   <span class="d-block">
												   <a href="mailto:{{ $generalsetting->email }}">{{ $generalsetting->email  }}</a>
												</span>
											</li>
										</ul>
									</div>
								</div>
								<div class="col-md-12" style="padding: 50px;">
								  <form id="contact-form" name="contact-form" action="#" method="POST">
									  <div class="row">
										  <div class="col-md-6">
											  <div class="md-form mb-0">
												  <input type="text" id="name" name="name" class="form-control">
												  <label for="name" class="">{{__('Your Name')}}</label>
											  </div>
										  </div>
										  <div class="col-md-6">
											  <div class="md-form mb-0">
												  <input type="text" id="email" name="email" class="form-control">
												  <label for="email" class="">{{__('Your Email')}}</label>
											  </div>
										  </div>
									  </div>
									  <div class="row">
										  <div class="col-md-12">
											  <div class="md-form mb-0">
												  <input type="text" id="subject" name="subject" class="form-control">
												  <label for="subject" class="">{{__('Subject')}}</label>
											  </div>
										  </div>
									  </div>
									  <div class="row">
										  <div class="col-md-12">

											  <div class="md-form">
												  <textarea type="text" id="message" name="message" rows="2" class="form-control md-textarea"></textarea>
												  <label for="message">{{__('Your message')}}</label>
											  </div>

										  </div>
									  </div>
								  </form>
								  <div class="text-center text-md-left">
									  <a class="btn waves-effect waves-light" style="color: white; background: #4f7ffe;">{{__('Send')}}</a>
								  </div>
								  <div id="status"></div>
							  </div>
							</div>
                        </div>
                    </div>
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
