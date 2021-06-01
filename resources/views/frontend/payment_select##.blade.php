@extends('frontend.layouts.app')

@section('content')

    <div id="page-content">
        <section class="py-3 gry-bg">
            <div class="container" style="padding-top:100px;">
                <div class="row cols-xs-space cols-sm-space cols-md-space">
                    <div class="col-lg-8">
                        <form action="{{ route('payment.checkout') }}" class="form-default" data-toggle="validator" role="form" method="POST" id="checkout-form">
                            @csrf
                            <div class="card">
                                <div class="card-title px-4 py-3">
                                    <h4 class="heading heading-5 strong-500">
                                        {{__('Select a payment option')}}
                                    </h4>
                                </div>
                                <div class="card-body text-center">
                                    <div class="row">
                                        <div class="col-md-6 mx-auto">
                                            <div class="row">
                                                @if(\App\BusinessSetting::where('type', 'paypal_payment')->first()->value == 1)
                                                    <div class="col-6">
                                                        <label class="payment_option mb-4" data-toggle="tooltip" data-title="Paypal">
                                                            <input type="radio" id="" name="payment_option" value="paypal" checked>
                                                            <span>
                                                                <img loading="lazy"  src="{{ asset('frontend/images/icons/cards/paypal.png')}}" class="img-fluid">
                                                            </span>
                                                        </label>
                                                    </div>
                                                @endif
                                                @if(\App\BusinessSetting::where('type', 'stripe_payment')->first()->value == 1)
                                                    <div class="col-6">
                                                        <label class="payment_option mb-4" data-toggle="tooltip" data-title="Stripe">
                                                            <input type="radio" id="" name="payment_option" value="stripe" checked>
                                                            <span>
                                                                <img loading="lazy"  src="{{ asset('frontend/images/icons/cards/stripe.png')}}" class="img-fluid">
                                                            </span>
                                                        </label>
                                                    </div>
                                                @endif
                                                @if(\App\BusinessSetting::where('type', 'sslcommerz_payment')->first()->value == 1)
                                                    <div class="col-6">
                                                        <label class="payment_option mb-4" data-toggle="tooltip" data-title="sslcommerz">
                                                            <input type="radio" id="" name="payment_option" value="sslcommerz" checked>
                                                            <span>
                                                                <img loading="lazy"  src="{{ asset('frontend/images/icons/cards/sslcommerz.png')}}" class="img-fluid">
                                                            </span>
                                                        </label>
                                                    </div>
                                                @endif
                                                @if(\App\BusinessSetting::where('type', 'instamojo_payment')->first()->value == 1)
                                                    <div class="col-6">
                                                        <label class="payment_option mb-4" data-toggle="tooltip" data-title="Instamojo">
                                                            <input type="radio" id="" name="payment_option" value="instamojo" checked>
                                                            <span>
                                                                <img loading="lazy"  src="{{ asset('frontend/images/icons/cards/instamojo.png')}}" class="img-fluid">
                                                            </span>
                                                        </label>
                                                    </div>
                                                @endif
                                                @if(\App\BusinessSetting::where('type', 'razorpay')->first()->value == 1)
                                                    <div class="col-6">
                                                        <label class="payment_option mb-4" data-toggle="tooltip" data-title="Razorpay">
                                                            <input type="radio" id="" name="payment_option" value="razorpay" checked>
                                                            <span>
                                                                <img loading="lazy"  src="{{ asset('frontend/images/icons/cards/rozarpay.png')}}" class="img-fluid">
                                                            </span>
                                                        </label>
                                                    </div>
                                                @endif
                                                @if(\App\BusinessSetting::where('type', 'paystack')->first()->value == 1)
                                                    <div class="col-6">
                                                        <label class="payment_option mb-4" data-toggle="tooltip" data-title="Paystack">
                                                            <input type="radio" id="" name="payment_option" value="paystack" checked>
                                                            <span>
                                                                <img loading="lazy"  src="{{ asset('frontend/images/icons/cards/paystack.png')}}" class="img-fluid">
                                                            </span>
                                                        </label>
                                                    </div>
                                                @endif
                                                @if(\App\BusinessSetting::where('type', 'voguepay')->first()->value == 1)
                                                    <div class="col-6">
                                                        <label class="payment_option mb-4" data-toggle="tooltip" data-title="VoguePay">
                                                            <input type="radio" id="" name="payment_option" value="voguepay" checked>
                                                            <span>
                                                                <img loading="lazy"  src="{{ asset('frontend/images/icons/cards/vogue.png')}}" class="img-fluid">
                                                            </span>
                                                        </label>
                                                    </div>
                                                @endif
                                                @if(\App\BusinessSetting::where('type', 'cash_payment')->first()->value == 1)
                                                    <div class="col-6">
                                                        <label class="payment_option mb-4" data-toggle="tooltip" data-title="{{__('Cash on Delivery')}}">
                                                            <input type="radio" id="paymentoption" name="payment_option" value="cash_on_delivery" checked style="display:none;">
                                                            <span>
                                                                <svg class="paymentbutton cashpaymentbutton" xmlns="http://www.w3.org/2000/svg" xml:space="preserve" width="100px" height="100px" version="1.1" style="shape-rendering:geometricPrecision; text-rendering:geometricPrecision; image-rendering:optimizeQuality; fill-rule:evenodd; clip-rule:evenodd"
                                                                viewBox="0 0 512 512"
                                                                xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                xmlns:xodm="http://www.corel.com/coreldraw/odm/2003"> 
                                                                <defs>
                                                                <style type="text/css"> 
                                                                <![CDATA[
                                                                    .fil0 {fill:#1A1A1A}
                                                                    .fil1 {fill:#1A1A1A;fill-rule:nonzero}
                                                                       
                                                                ]]>
                                                                </style>
                                                                </defs>
                                                                <g id="Layer_x0020_1">
                                                                <metadata id="CorelCorpID_0Corel-Layer"/>
                                                                <g id="_2293118096352">
                                                                <path class="fil0" d="M62.39 347.71c3.87,-3.88 9.79,-4.51 14.44,-1.65 0.08,0.05 0.16,0.09 0.24,0.14 0.84,0.49 1.79,1.49 2.48,2.16 3.35,3.27 6.65,6.61 9.95,9.92 24.91,24.94 49.82,49.88 74.76,74.79 4.52,4.5 4.6,11.97 0.05,16.46l-41.58 40.96c-0.63,0.62 -1.65,0.62 -2.27,-0.01l-98.85 -99.6c-0.62,-0.63 -0.62,-1.65 0,-2.27l40.78 -40.9zm127.25 -67.24c15.55,0 30.7,3.13 44.94,9.36 1.06,0.46 2.22,0.71 3.38,0.71l114.24 0c11.95,0 21.73,9.76 21.73,21.72 0,11.99 -9.74,21.73 -21.73,21.73l-98.19 0c-4.66,0 -8.44,3.79 -8.44,8.45 0,4.67 3.78,8.45 8.44,8.45l98.19 0c21.3,0 38.63,-17.33 38.63,-38.63 0,-1.69 -0.12,-3.37 -0.34,-5.05 -0.06,-0.5 0.09,-0.96 0.44,-1.33 18.01,-18.51 36.02,-37.01 54.02,-55.51 3.83,-3.94 8.16,-8.06 11.78,-12.14 7.71,-9.1 21.51,-10.29 30.63,-2.59 9.16,7.73 10.22,21.5 2.55,30.66l-90.23 107.87c-0.04,0.05 -0.07,0.08 -0.12,0.13 -13.48,12.94 -31.18,20.06 -49.87,20.06l-133.74 0c-12.68,0 -24.68,4.84 -33.8,13.65l-8.55 8.25c-0.63,0.61 -1.64,0.6 -2.26,-0.02l-78.81 -78.81c-0.51,-0.51 -0.62,-1.26 -0.28,-1.89 19.68,-36.93 56.15,-55.07 97.39,-55.07zm222.2 105.47c0.79,-0.85 1.59,-1.89 2.33,-2.79 3.76,-4.49 7.51,-8.99 11.26,-13.48 25.78,-30.85 51.59,-61.67 77.41,-92.49 13.63,-16.26 11.67,-40.74 -4.58,-54.45 -16.08,-13.58 -40.46,-11.62 -54.26,4.38l-59.37 61.01c-0.33,0.34 -0.75,0.51 -1.22,0.49 -0.48,-0.02 -0.88,-0.23 -1.18,-0.59 -7.33,-9.02 -18.38,-14.39 -30.03,-14.39l-112.18 0c-0.22,0 -0.41,-0.04 -0.62,-0.12 -15.82,-6.62 -32.6,-9.94 -49.75,-9.94 -47.1,0 -89.29,21.46 -112.03,63.48 -0.34,0.63 -1.02,0.95 -1.72,0.82 -9.29,-1.76 -18.77,1.18 -25.46,7.89l-47.86 48c-3.28,3.29 -3.29,8.62 -0.01,11.92l112.95 113.82c3.28,3.3 8.61,3.34 11.93,0.07l48.77 -48.05c7.78,-7.66 10.28,-19.29 6.77,-29.55 -0.21,-0.61 -0.05,-1.24 0.41,-1.68l10.49 -10.12c5.95,-5.74 13.79,-8.91 22.06,-8.91l133.74 0c23.3,0 45.33,-8.95 62.03,-25.2 0.04,-0.04 0.07,-0.08 0.12,-0.12z"/>
                                                                <path class="fil0" d="M390.44 109.05c0,50.81 -41.34,92.15 -92.15,92.15 -50.81,0 -92.15,-41.34 -92.15,-92.15 0,-50.81 41.34,-92.15 92.15,-92.15 50.81,0 92.15,41.34 92.15,92.15zm-201.2 0c0,60.13 48.92,109.06 109.05,109.06 60.13,0 109.05,-48.93 109.05,-109.06 0,-60.13 -48.92,-109.05 -109.05,-109.05 -60.13,0 -109.05,48.92 -109.05,109.05z"/>
                                                                <path class="fil1" d="M302.83 163.43c-4.78,0 -9.41,-0.57 -13.84,-1.7 -4.43,-1.15 -8.57,-2.77 -12.42,-4.87 -3.86,-2.11 -7.36,-4.63 -10.52,-7.6 -3.15,-2.97 -5.85,-6.27 -8.11,-9.9 -2.26,-3.63 -3.99,-7.55 -5.22,-11.74 -1.25,-4.18 -1.84,-8.59 -1.84,-13.17 0,-4.59 0.57,-8.99 1.75,-13.27 1.17,-4.25 2.83,-8.24 4.98,-11.93 2.17,-3.7 4.76,-7.07 7.75,-10.08 3.01,-3.03 6.36,-5.63 10.01,-7.8 3.65,-2.17 7.57,-3.83 11.8,-5.02 4.21,-1.2 8.6,-1.8 13.13,-1.8 4.08,0 8.02,0.51 11.85,1.51 3.83,0.99 7.44,2.39 10.83,4.21 3.39,1.81 6.56,4.03 9.48,6.62 2.93,2.59 5.52,5.49 7.78,8.66 2.27,3.19 4.18,6.62 5.71,10.34 1.53,3.72 2.63,7.62 3.28,11.69l-12.52 12.45c0,-3.94 -0.44,-7.73 -1.32,-11.38 -0.89,-3.66 -2.13,-7.07 -3.7,-10.21 -1.6,-3.17 -3.5,-6.05 -5.76,-8.66 -2.24,-2.64 -4.72,-4.88 -7.42,-6.74 -2.7,-1.86 -5.62,-3.3 -8.77,-4.29 -3.12,-1.02 -6.38,-1.53 -9.77,-1.53 -5.05,0 -9.78,0.97 -14.24,2.9 -4.43,1.95 -8.3,4.61 -11.64,7.95 -3.33,3.37 -5.96,7.27 -7.89,11.76 -1.9,4.47 -2.88,9.26 -2.88,14.37 0,3.41 0.47,6.69 1.4,9.81 0.93,3.15 2.23,6.09 3.92,8.84 1.7,2.75 3.72,5.25 6.11,7.49 2.37,2.25 5,4.18 7.91,5.8 2.9,1.64 6,2.88 9.32,3.76 3.3,0.89 6.75,1.33 10.34,1.33l0.51 12.2zm-18.8 -105.48l12.71 -11.76 0 61.26 -12.71 13.18 0 -62.68zm19.53 0l12.71 -11.76 0 61.26 -12.71 13.18 0 -62.68zm-43.74 93.22l85.44 0 -12.44 12.46 -85.46 0 12.46 -12.46z"/>
                                                                </g>
                                                                </g>
                                                                </svg><br>
                                                                {{__('Cash on Delivery')}}
                                                            </span>
                                                        </label>
                                                    </div>
                                                    <div class="col-6">
                                                        <label class="payment_option mb-4" data-toggle="tooltip" data-title="{{__('Card Payment')}}">
                                                            <input type="radio" id="paymentoption" name="payment_option" value="card_payment"  style="display:none;">
                                                            <span>
                                                                    <svg class="paymentbutton cardpaymentbutton" xmlns="http://www.w3.org/2000/svg" xml:space="preserve" width="100px" height="100px" version="1.1" style="shape-rendering:geometricPrecision; text-rendering:geometricPrecision; image-rendering:optimizeQuality; fill-rule:evenodd; clip-rule:evenodd"
                                                                    viewBox="0 0 512 512"
                                                                    xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                    xmlns:xodm="http://www.corel.com/coreldraw/odm/2003">
                                                                    <defs>
                                                                    <style type="text/css">
                                                                    <![CDATA[
                                                                        .fil0 {fill:#1A1A1A}
                                                                        .fil1 {fill:#1A1A1A;fill-rule:nonzero}
                                                                    ]]>
                                                                    </style>
                                                                    </defs>
                                                                    <g id="Layer_x0020_1">
                                                                    <metadata id="CorelCorpID_0Corel-Layer"/>
                                                                    <g id="_2291521525568">
                                                                    <path class="fil0" d="M62.39 347.71c3.87,-3.88 9.79,-4.51 14.44,-1.65 0.08,0.05 0.16,0.09 0.24,0.14 0.84,0.49 1.79,1.5 2.48,2.16 3.35,3.27 6.65,6.61 9.95,9.92 24.91,24.95 49.82,49.88 74.76,74.79 4.52,4.5 4.6,11.98 0.05,16.46l-41.58 40.96c-0.63,0.62 -1.65,0.62 -2.27,-0.01l-98.85 -99.6c-0.62,-0.63 -0.62,-1.65 0,-2.27l40.78 -40.9zm127.25 -67.24c15.55,0 30.7,3.13 44.94,9.36 1.06,0.46 2.22,0.71 3.38,0.71l114.24 0c11.95,0 21.73,9.76 21.73,21.73 0,11.98 -9.74,21.73 -21.73,21.73l-98.19 0c-4.66,0 -8.44,3.78 -8.44,8.45 0,4.66 3.78,8.44 8.44,8.44l98.19 0c21.3,0 38.63,-17.32 38.63,-38.63 0,-1.68 -0.12,-3.37 -0.34,-5.05 -0.06,-0.5 0.09,-0.96 0.44,-1.33 18.01,-18.5 36.02,-37.01 54.02,-55.51 3.83,-3.94 8.16,-8.06 11.78,-12.14 7.71,-9.1 21.51,-10.29 30.63,-2.59 9.16,7.73 10.22,21.5 2.55,30.66l-90.23 107.87c-0.04,0.05 -0.07,0.08 -0.12,0.13 -13.48,12.94 -31.18,20.06 -49.87,20.06l-133.74 0c-12.68,0 -24.68,4.85 -33.8,13.65l-8.55 8.25c-0.63,0.61 -1.64,0.6 -2.26,-0.02l-78.81 -78.81c-0.51,-0.51 -0.62,-1.26 -0.28,-1.89 19.68,-36.93 56.15,-55.07 97.39,-55.07zm222.2 105.48c0.79,-0.86 1.59,-1.9 2.33,-2.8 3.76,-4.49 7.51,-8.99 11.26,-13.48 25.78,-30.85 51.59,-61.67 77.41,-92.49 13.63,-16.26 11.67,-40.74 -4.58,-54.45 -16.08,-13.58 -40.46,-11.62 -54.26,4.38l-59.37 61.01c-0.33,0.35 -0.75,0.51 -1.22,0.49 -0.48,-0.02 -0.88,-0.22 -1.18,-0.59 -7.33,-9.02 -18.38,-14.39 -30.03,-14.39l-112.18 0c-0.22,0 -0.41,-0.03 -0.62,-0.12 -15.82,-6.62 -32.6,-9.93 -49.75,-9.93 -47.1,0 -89.29,21.46 -112.03,63.48 -0.34,0.62 -1.02,0.94 -1.72,0.81 -9.29,-1.76 -18.77,1.18 -25.46,7.89l-47.86 48c-3.28,3.3 -3.29,8.62 -0.01,11.92l112.95 113.82c3.28,3.3 8.61,3.34 11.93,0.07l48.77 -48.05c7.78,-7.66 10.28,-19.29 6.77,-29.55 -0.21,-0.61 -0.05,-1.24 0.41,-1.68l10.49 -10.12c5.95,-5.74 13.79,-8.91 22.06,-8.91l133.74 0c23.3,0 45.33,-8.95 62.03,-25.2 0.04,-0.04 0.07,-0.08 0.12,-0.11z"/>
                                                                    <path class="fil1" d="M398.48 0l-200.38 0c-13.83,0 -25.05,11.22 -25.05,25.05l0 125.24c0,13.84 11.22,25.05 25.05,25.05l200.38 0c13.84,0 25.05,-11.21 25.05,-25.05l0 -125.24c0,-13.83 -11.21,-25.05 -25.05,-25.05zm-65.43 140.9l55.42 0c0.21,0.01 0.43,0.01 0.64,0 3.28,-0.18 5.8,-2.98 5.62,-6.26l0 -18.79c0,-3.46 -2.8,-6.26 -6.26,-6.26l-55.42 0c-3.46,0 -6.27,2.8 -6.27,6.26l0 18.79c-0.01,0.21 -0.01,0.43 0,0.64 0.18,3.28 2.99,5.8 6.27,5.62zm6.26 -18.79l42.89 0 0 6.26 -42.89 0 0 -6.26zm-112.41 23.8c0.11,0 0.21,0 0.32,0 4.43,0 8.53,-1.4 11.89,-3.77 3.45,2.43 7.67,3.84 12.22,3.77 0.1,0 0.21,0 0.31,0 11.24,-0.18 20.21,-9.43 20.04,-20.67 0,-0.1 0,-0.2 0,-0.31 -0.18,-11.41 -9.57,-20.52 -20.98,-20.35 -4.32,0.07 -8.31,1.46 -11.59,3.77 -3.28,-2.32 -7.27,-3.7 -11.58,-3.77 -11.41,-0.17 -20.8,8.94 -20.98,20.35 -0.17,11.41 8.94,20.8 20.35,20.98zm24.43 -28.49c4.32,0 7.82,3.5 7.82,7.82 0.01,0.21 0.01,0.41 0,0.62 -0.17,4.49 -3.95,7.99 -8.44,7.82 -1.51,-0.05 -2.91,-0.53 -4.1,-1.29 0.82,-2.23 1.27,-4.64 1.27,-7.15 0,-2.32 -0.39,-4.55 -1.1,-6.64 1.32,-0.81 2.89,-1.25 4.55,-1.18zm-34 6.39c0.88,-4.41 5.16,-7.27 9.57,-6.39 1.05,-0.21 2.13,-0.21 3.18,0 0.57,0.11 1.1,0.28 1.61,0.49 -0.9,2.38 -1.38,4.96 -1.34,7.65 0.04,2.57 0.55,5.02 1.44,7.28 -1.48,0.66 -3.17,0.88 -4.89,0.54 -1.05,0.21 -2.12,0.21 -3.17,0 -4.41,-0.87 -7.28,-5.16 -6.4,-9.57zm193.68 26.79c-0.17,6.92 -5.92,12.39 -12.83,12.22 0,0 0,0 -0.01,0l-199.76 0c-6.91,0.17 -12.66,-5.29 -12.84,-12.21 0,0 0,0 0,-0.01l0 -59.8 225.44 0 0 59.8zm0 -72.32l-225.44 0 0 -31.31 225.44 0 0 31.31zm0 -43.84l-225.44 0 0 -9.7c0.17,-6.92 5.92,-12.39 12.83,-12.22 0.01,0 0.01,0 0.01,0l199.76 0c6.92,-0.17 12.66,5.29 12.84,12.21 0,0 0,0 0,0l0 9.71 0 0z"/>
                                                                    </g>
                                                                    </g>
                                                                    </svg><br>
                                                                    {{__('Card Payment')}} 
                                                            </span>
                                                        </label>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row align-items-center pt-4">
                                <div class="col-6">
                                    <a onclick="history.go(-1)" class="order-item btn-custom-back btn-sm shadow-none" style="width:150px;">
                                        <i class="la la-mail-reply"></i>
                                        {{__('Back')}}
                                    </a>
                                </div>
                                <div class="col-6 text-right">
                                     @php if(Auth::user()->validity != 1) {  @endphp
                                    <button type="submit"  id="submitorder" class="order-item btn-custom btn-sm shadow-none" style="width:150px;" disabled>{{__('Order')}}</button>
                                     @php }else { @endphp 
                                    <button type="submit" id="submitorder" class="order-item btn-custom btn-sm shadow-none" style="width:150px;">{{__('Order')}}</button>
                                     @php } @endphp
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="col-lg-4 ml-lg-auto">
                        @include('frontend.partials.cart_summary')
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@section('script')
    <script type="text/javascript">
        function use_wallet(){
            $('input[name=payment_option]').val('wallet');
            $('#checkout-form').submit();
        }
    </script>
@endsection
