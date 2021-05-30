@extends('frontend.layouts.app')

@section('content')

    <section class="gry-bg py-4 profile">
        <div class="container">
            <div class="row cols-xs-space cols-sm-space cols-md-space">
                <div class="col-lg-3 d-lg-block">
                    @include('frontend.inc.customer_side_nav')
                </div>
                <div class="col-lg-9">
                    <!-- Page title -->
                    <div class="page-title">
                        <div class="row align-items-center">
                            <div class="col-md-6 col-12"> 
                                <h2 class="heading heading-6 text-capitalize strong-600 mb-0">
                                    {{__('Dashboard')}}
                                </h2>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="float-md-right">
                                    <ul class="breadcrumb">
                                        <li><a href="{{ route('home') }}">{{__('Home')}}</a></li>
                                        <li class="active"><a href="{{ route('dashboard') }}">{{__('Dashboard')}}</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- dashboard content -->
                    <div class="">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="dashboard-widget text-center blue-widget mt-4 c-pointer">
                                    <a href="{{ route('specialoders') }}" class="d-block">
                                        <i class="fa fa-clock-o"></i>
                                        <span class="d-block title">{{ __('Set product order') }}</span>
                                        <span class="d-block sub-title">{{__('Order what you want')}}</span> 
                                    </a> 
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="dashboard-widget text-center green-widget mt-4 c-pointer">
                                    <a href="{{ route('cart') }}" class="d-block">
                                        <i class="fa fa-shopping-cart"></i>
                                        @if(Session::has('cart'))
                                            <span class="d-block title">{{ count(Session::get('cart'))}} {{__('Productss')}}</span>
                                        @else
                                            <span class="d-block title">0 {{__('Productss')}}</span> 
                                        @endif
                                        <span class="d-block sub-title">{{__('in your cart')}}</span>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="dashboard-widget text-center red-widget mt-4 c-pointer">
                                    <a href="{{ route('wishlists.index') }}" class="d-block">
                                        <i class="fa fa-heart"></i>
                                        <span class="d-block title">{{ count(Auth::user()->wishlists)}} {{__('Productss')}}</span>
                                        <span class="d-block sub-title">{{__('in your wishlist')}}</span>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="dashboard-widget text-center yellow-widget mt-4 c-pointer">
                                    <a href="{{ route('dashboard') }}" class="d-block">
                                        <i class="fa fa-building"></i>
                                        @php
                                            $orders = \App\Order::where('user_id', Auth::user()->id)->get();
                                            $total = 0;
                                            foreach ($orders as $key => $order) {
                                                $total += count($order->orderDetails);
                                            }
                                        @endphp
                                        <span class="d-block title">{{ $total }} {{__('Productss')}}</span>
                                        <span class="d-block sub-title">{{__('you ordered')}}</span>
                                    </a>
                                </div>
                            </div>
							<div class="col-lg-12" style="margin-top: 30px;">
								<div class="main-content">
									<!-- Page title -->
									<div class="page-title">
										<div class="row align-items-center">
											<div class="col-md-6 col-12">
												<h2 class="heading heading-6 text-capitalize strong-600 mb-0">
													{{__('Purchase History')}}
												</h2>
											</div>
											<div class="col-md-6 col-12">
												<div class="float-md-right">
													<ul class="breadcrumb">
														<li><a href="{{ route('home') }}">{{__('Home')}}</a></li>
														<li><a href="{{ route('dashboard') }}">{{__('Dashboard')}}</a></li>
														<li class="active"><a href="{{ route('purchase_history.index') }}">{{__('Purchase History')}}</a></li>
													</ul>
												</div>
											</div>
										</div>
									</div>

									@if (count($orders) > 0)
										<!-- Order history table -->
										<div class="card no-border mt-4">
											<div>
												<table class="table table-sm table-hover table-responsive-md">
													<thead>
														<tr>
															<th>{{__('Code')}}</th>
															<th>{{__('Date')}}</th>
															<th>{{__('Amount')}}</th>
															<th>{{__('Delivery Status')}}</th>
															<th>{{__('Payment Status')}}</th>
															<th>{{__('Invoices')}}</th> 
														</tr>
													</thead>
													<tbody>
														@foreach ($orders as $key => $order)
															<tr>
																<td>
																	<a href="#{{ $order->code }}" onclick="show_purchase_history_details({{ $order->id }})">{{ $order->code }}</a>
																</td>
																<td>{{ date('d-m-Y', $order->date) }}</td>
																<td>
																	{{ single_price($order->grand_total) }}
																</td>
																<td>
																	@php
																		$status = $order->orderDetails->first()->delivery_status;
																	@endphp
																	@if($order->delivery_viewed == 0)
																		<span class="ml-2" style="color:green"><strong>({{ __('Updated') }})</strong></span>
																	@else
																		{{__($status)}}
																	@endif
																</td>
																<td>
																	<span class="badge badge--2 mr-4">
																		@if ($order->payment_status == 'paid')
																			<i class="bg-green"></i> {{__('Paid')}}
																		@else
																			<i class="bg-red"></i> {{__('Unpaid')}}
																		@endif
																	</span>
																</td>
																<td>
																	<div class="dropdown">
																		<button class="btn" type="button" id="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
																			<i class="fa fa-ellipsis-v"></i>
																		</button>

																		<div class="dropdown-menu dropdown-menu-right" aria-labelledby="">
                                                                <button onclick="show_purchase_history_details({{ $order->id }})" class="dropdown-item">{{__('Order Details')}}</button>
																			<a href="{{ route('customer.invoice.download', $order->id) }}" class="dropdown-item">{{__('Download Invoice')}}</a>
																		</div>
																	</div>
																</td>
															</tr>
														@endforeach
													</tbody>
												</table>
											</div>
										</div>
									@endif
								</div>
							</div>
                        </div>
                    </div>

                </div>
							 
            </div>
        </div>
    </section>
    <div class="modal fade" id="order_details" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-zoom product-modal" id="modal-size" role="document">
            <div class="modal-content position-relative">
                <div class="c-preloader">
                    <i class="fa fa-spin fa-spinner"></i>
                </div>
                <div id="order-details-modal-body">

                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script type="text/javascript">
        $('#order_details').on('hidden.bs.modal', function () {
            location.reload();
        })
    </script>
    
    @php if(isset($_GET['result']) && $_GET['result'] == 'success') { @endphp  
          <script>
            showFrontendAlert('success', '{{__("Your order has been placed successfully")}}');
          </script>
    @php }elseif(isset($_GET['result']) && $_GET['result'] == 'failed'){ @endphp
          <script>
            showFrontendAlert('danger', '{{__("Payment Failed")}}');
          </script>     
    @php } @endphp
@endsection