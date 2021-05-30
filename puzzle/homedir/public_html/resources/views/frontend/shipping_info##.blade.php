@extends('frontend.layouts.app')

@section('content')

    <div id="page-content">
        <section class="py-4 gry-bg">
            <div class="container" style="padding-top:100px;">
                <div class="row cols-xs-space cols-sm-space cols-md-space">
                    <div class="col-lg-8">
                        <form class="form-default" data-toggle="validator" action="{{ route('checkout.store_shipping_infostore') }}" role="form" method="POST">
                            @csrf
                            <div class="card">
                                @if(Auth::check())
                                    @php
                                        $user = Auth::user();
                                    @endphp
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="control-label">{{__('Name')}} *</label>
                                                    <input type="text" class="form-control" name="name" value="{{ $user->name }}" required>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="control-label">{{__('Email')}} *</label>
                                                    <input type="email" class="form-control" name="email" value="{{ $user->email }}" required>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="control-label">{{__('Address')}} *</label>
                                                    <input type="text" class="form-control" name="address" value="{{ $user->address }}" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group has-feedback">
                                                    <label class="control-label">{{__('Aditional Details')}}</label>
                                                    <input type="text" class="form-control" placeholder="{{__('Aditional Details')}}" name="aditional_details">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group has-feedback">
                                                <span class="phonecode">+995</span>
                                                    <label class="control-label">{{__('Phone')}} *</label>
                                                    <input type="text" class="form-control phonenumber" value="{{ $user->phone }}" id="phonenumber" name="phone" required>
                                                </div>
                                            </div>
                                        </div>

                                        <input type="hidden" name="checkout_type" value="logged">
                                    </div>
                                @else
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="control-label">{{__('Name')}} *</label>
                                                    <input type="text" class="form-control" name="name" placeholder="{{__('Name')}}" required>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="control-label">{{__('Email')}} *</label>
                                                    <input type="email" class="form-control" name="email" placeholder="{{__('Email')}}" required>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="control-label">{{__('Address')}} *</label>
                                                    <input type="text" class="form-control" name="address" placeholder="{{__('Address')}}" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group has-feedback">
                                                    <label class="control-label">{{__('Aditional Details')}}</label>
                                                    <input type="text" class="form-control" placeholder="{{__('Aditional Details')}}" name="aditional_details">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group has-feedback">
                                                <span class="phonecode">+995</span>
                                                    <label class="control-label">{{__('Phone')}} *</label>
                                                    <input type="text" class="form-control phonenumber" placeholder="{{__('Phone')}}"  id="phonenumber" name="phone" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group has-feedback">
                                                    in case of <a href="{{ route('user.login') }}">log in</a> this form will be filed automatically 
                                                </div>
                                            </div>
                                        </div>

                                        <input type="hidden" name="checkout_type" value="guest">
                                    </div>
                                @endif
                            </div>
                            <div class="row align-items-center pt-4">
                                <div class="col-6">
                                <a onclick="history.go(-1)" class="order-item btn-custom-back btn-sm shadow-none" style="width:150px;">
                                    <i class="la la-mail-reply"></i>
                                    {{__('Back')}}
                                </a>
                                </div>
                                <div class="col-6 text-right">
                                    <button type="submit" class="order-item btn-custom btn-sm shadow-none" style="width:150px;" >{{__('Continue')}}</a>
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
