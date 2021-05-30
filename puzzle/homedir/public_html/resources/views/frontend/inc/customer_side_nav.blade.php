<div class="sidebar sidebar--style-3 no-border stickyfill p-0">
    <div class="widget mb-0">
        <div class="widget-profile-box text-center p-3">
            <div class="image" style="background-image:url('{{ asset(Auth::user()->avatar_original) }}')"></div>
            <div class="name">{{ Auth::user()->name }}</div>
            <div class="name">{{ Auth::user()->usertype_id }}</div> 
            <div class="">{{__('Address')}} : {{ Auth::user()->address }}</div> 
            <div class="">{{__('City')}} : {{ Auth::user()->city }}</div> 
            <div class="">{{__('Region')}} : {{__(Auth::user()->region)}}</div> 
            <div class="">{{__('Phone')}} : {{ Auth::user()->phone }}</div> 
			 <a href="{{ route('profile') }}" class="btn btn-link btn-sm">{{__('Edit')}}</a>
        </div>
		<div class="row">
			<div class="col-md-12"> 
				<div class="dashboard-widget text-center green-widget text-white mt-4 c-pointer" onclick="show_wallet_modal()">
					<span class="d-block title heading-3 strong-400">{{ single_price(Auth::user()->balance) }}</span>
					<span class="d-block sub-title">{{ __('Recharge Wallet') }}</span>
	
				</div>
			</div>
        </div>
		
        <div class="sidebar-widget-title py-3">
            <span>{{__('Menu')}}</span>
        </div>
        <div class="widget-profile-menu py-3">
            <ul class="categories categories--style-3">
                <li>
                    <a href="{{ route('dashboard') }}" class="{{ areActiveRoutesHome(['dashboard'])}}">
                        <i class="la la-dashboard"></i>
                        <span class="category-name">
                            {{__('Dashboard')}}
                        </span>
                    </a>
                </li>
                @php
                $delivery_viewed = App\Order::where('user_id', Auth::user()->id)->where('delivery_viewed', 0)->get()->count();
                $payment_status_viewed = App\Order::where('user_id', Auth::user()->id)->where('payment_status_viewed', 0)->get()->count();
                @endphp
                <li>
                    <a href="{{ route('wishlists.index') }}" class="{{ areActiveRoutesHome(['wishlists.index'])}}">
                        <i class="la la-heart-o"></i>
                        <span class="category-name">
                            {{__('Wishlist')}}
                        </span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('profile') }}" class="{{ areActiveRoutesHome(['profile'])}}">
                        <i class="la la-user"></i>
                        <span class="category-name">
                            {{__('Manage Profile')}}
                        </span>
                    </a>
                </li>
                @php
                    $support_ticket = DB::table('tickets')
                                ->where('client_viewed', 0)
                                ->where('user_id', Auth::user()->id)
                                ->count();
                @endphp
            </ul>
        </div>
        @if (\App\BusinessSetting::where('type', 'vendor_system_activation')->first()->value == 1)
            <div class="widget-seller-btn pt-4">
                <a href="{{ route('shops.create') }}" class="btn btn-anim-primary w-100">{{__('Be A Seller')}}</a>
            </div>
        @endif
    </div>
</div>

					<div class="modal fade" id="ticket_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
						<div class="modal-dialog modal-dialog-centered modal-dialog-zoom product-modal" id="modal-size" role="document">
							<div class="modal-content position-relative">
								<div class="modal-header">
									<h5 class="modal-title strong-600 heading-5">{{__('Set product order')}}</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body px-3 pt-3">
									<form class="" action="{{ route('support_ticket.store') }}" method="post" enctype="multipart/form-data">
										@csrf
										<div class="form-group">
											<label>{{__('product subject')}} <span class="text-danger">*</span></label>
											<input type="text" class="form-control mb-3" name="subject" placeholder="{{__('product subject')}}" required>
										</div>
										<div class="form-group">
											<label>{{__('product description')}}<span class="text-danger">*</span></label>
											<textarea class="form-control editor" name="details" placeholder="{{__('type product description')}}" data-buttons="bold,underline,italic,|,ul,ol,|,paragraph,|,undo,redo"></textarea>
										</div>
										<div class="form-group">
											<input type="file" name="attachments[]" id="file-2" class="custom-input-file custom-input-file--2" data-multiple-caption="{count} files selected" multiple />
											<label for="file-2" class=" mw-100 mb-0">
												<i class="fa fa-upload"></i>
												<span>{{__('Attach files')}}</span>
											</label>
										</div>
										<div class="text-right mt-4">
											<button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('cancel')}}</button>
											<button type="submit" class="btn btn-base-1">{{__('Send Ticket')}}</button>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
					<div class="modal fade" id="wallet_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
						<div class="modal-dialog modal-dialog-centered modal-dialog-zoom product-modal" id="modal-size" role="document">
							<div class="modal-content position-relative">
								<div class="modal-header">
									<h5 class="modal-title strong-600 heading-5">{{__('Recharge Wallet')}}</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<form class="" action="{{ route('wallet.recharge') }}" method="post">
									@csrf
									<div class="modal-body gry-bg px-3 pt-3">
										<div class="row">
											<div class="col-md-2">
												<label>{{__('Amount')}} <span class="required-star">*</span></label>
											</div>
											<div class="col-md-10">
												<input type="number" class="form-control mb-3" name="amount" placeholder="{{__('Amount')}}" required>
											</div>
										</div>
										<div class="row">
											<div class="col-md-2">
												<label>{{__('Payment Method')}}</label>
											</div>
											<div class="col-md-10">
												<div class="mb-3">
													<select class="form-control selectpicker" data-minimum-results-for-search="Infinity" name="payment_option">
														@if (\App\BusinessSetting::where('type', 'paypal_payment')->first()->value == 1)
															<option value="paypal">{{__('Paypal')}}</option>
														@endif
														@if (\App\BusinessSetting::where('type', 'stripe_payment')->first()->value == 1)
															<option value="stripe">{{__('Stripe')}}</option>
														@endif
														@if (\App\BusinessSetting::where('type', 'sslcommerz_payment')->first()->value == 1)
															<option value="sslcommerz">{{__('SSLCommerz')}}</option>
														@endif
														@if (\App\BusinessSetting::where('type', 'instamojo_payment')->first()->value == 1)
															<option value="instamojo">{{__('Instamojo')}}</option>
														@endif
														@if (\App\BusinessSetting::where('type', 'paystack')->first()->value == 1)
															<option value="paystack">{{__('Paystack')}}</option>
														@endif
														@if (\App\BusinessSetting::where('type', 'voguepay')->first()->value == 1)
															<option value="voguepay">{{__('VoguePay')}}</option>
														@endif
													</select>
												</div>
											</div>
										</div>
									</div>
									<div class="modal-footer">
										<button type="submit" class="btn btn-base-1">{{__('Confirm')}}</button>
									</div>
								</form>
							</div>
						</div>
					</div>

    <script type="text/javascript">
        function show_wallet_modal(){
            $('#wallet_modal').modal('show');
        }
    </script>