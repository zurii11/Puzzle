<div class="sidebar sidebar--style-3 no-border stickyfill p-0">
    <div class="widget mb-0">
        <div class="widget-profile-box text-center p-3">
            <div class="image" style="background-image:url('<?php echo e(asset(Auth::user()->avatar_original)); ?>')"></div>
            <div class="name"><?php echo e(Auth::user()->name); ?></div>
            <div class="name"><?php echo e(Auth::user()->usertype_id); ?></div> 
            <div class=""><?php echo e(__('Address')); ?> : <?php echo e(Auth::user()->address); ?></div> 
            <div class=""><?php echo e(__('City')); ?> : <?php echo e(Auth::user()->city); ?></div> 
            <div class=""><?php echo e(__('Region')); ?> : <?php echo e(__(Auth::user()->region)); ?></div> 
            <div class=""><?php echo e(__('Phone')); ?> : <?php echo e(Auth::user()->phone); ?></div> 
			 <a href="<?php echo e(route('profile')); ?>" class="btn btn-link btn-sm"><?php echo e(__('Edit')); ?></a>
        </div>
		<div class="row">
			<div class="col-md-12"> 
				<div class="dashboard-widget text-center green-widget text-white mt-4 c-pointer" onclick="show_wallet_modal()">
					<span class="d-block title heading-3 strong-400"><?php echo e(single_price(Auth::user()->balance)); ?></span>
					<span class="d-block sub-title"><?php echo e(__('Recharge Wallet')); ?></span>
	
				</div>
			</div>
        </div>
		
        <div class="sidebar-widget-title py-3">
            <span><?php echo e(__('Menu')); ?></span>
        </div>
        <div class="widget-profile-menu py-3">
            <ul class="categories categories--style-3">
                <li>
                    <a href="<?php echo e(route('dashboard')); ?>" class="<?php echo e(areActiveRoutesHome(['dashboard'])); ?>">
                        <i class="la la-dashboard"></i>
                        <span class="category-name">
                            <?php echo e(__('Dashboard')); ?>

                        </span>
                    </a>
                </li>
                <?php
                $delivery_viewed = App\Order::where('user_id', Auth::user()->id)->where('delivery_viewed', 0)->get()->count();
                $payment_status_viewed = App\Order::where('user_id', Auth::user()->id)->where('payment_status_viewed', 0)->get()->count();
                ?>
                <li>
                    <a href="<?php echo e(route('wishlists.index')); ?>" class="<?php echo e(areActiveRoutesHome(['wishlists.index'])); ?>">
                        <i class="la la-heart-o"></i>
                        <span class="category-name">
                            <?php echo e(__('Wishlist')); ?>

                        </span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo e(route('profile')); ?>" class="<?php echo e(areActiveRoutesHome(['profile'])); ?>">
                        <i class="la la-user"></i>
                        <span class="category-name">
                            <?php echo e(__('Manage Profile')); ?>

                        </span>
                    </a>
                </li>
                <?php
                    $support_ticket = DB::table('tickets')
                                ->where('client_viewed', 0)
                                ->where('user_id', Auth::user()->id)
                                ->count();
                ?>
            </ul>
        </div>
        <?php if(\App\BusinessSetting::where('type', 'vendor_system_activation')->first()->value == 1): ?>
            <div class="widget-seller-btn pt-4">
                <a href="<?php echo e(route('shops.create')); ?>" class="btn btn-anim-primary w-100"><?php echo e(__('Be A Seller')); ?></a>
            </div>
        <?php endif; ?>
    </div>
</div>

					<div class="modal fade" id="ticket_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
						<div class="modal-dialog modal-dialog-centered modal-dialog-zoom product-modal" id="modal-size" role="document">
							<div class="modal-content position-relative">
								<div class="modal-header">
									<h5 class="modal-title strong-600 heading-5"><?php echo e(__('Set product order')); ?></h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body px-3 pt-3">
									<form class="" action="<?php echo e(route('support_ticket.store')); ?>" method="post" enctype="multipart/form-data">
										<?php echo csrf_field(); ?>
										<div class="form-group">
											<label><?php echo e(__('product subject')); ?> <span class="text-danger">*</span></label>
											<input type="text" class="form-control mb-3" name="subject" placeholder="<?php echo e(__('product subject')); ?>" required>
										</div>
										<div class="form-group">
											<label><?php echo e(__('product description')); ?><span class="text-danger">*</span></label>
											<textarea class="form-control editor" name="details" placeholder="<?php echo e(__('type product description')); ?>" data-buttons="bold,underline,italic,|,ul,ol,|,paragraph,|,undo,redo"></textarea>
										</div>
										<div class="form-group">
											<input type="file" name="attachments[]" id="file-2" class="custom-input-file custom-input-file--2" data-multiple-caption="{count} files selected" multiple />
											<label for="file-2" class=" mw-100 mb-0">
												<i class="fa fa-upload"></i>
												<span><?php echo e(__('Attach files')); ?></span>
											</label>
										</div>
										<div class="text-right mt-4">
											<button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo e(__('cancel')); ?></button>
											<button type="submit" class="btn btn-base-1"><?php echo e(__('Send Ticket')); ?></button>
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
									<h5 class="modal-title strong-600 heading-5"><?php echo e(__('Recharge Wallet')); ?></h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<form class="" action="<?php echo e(route('wallet.recharge')); ?>" method="post">
									<?php echo csrf_field(); ?>
									<div class="modal-body gry-bg px-3 pt-3">
										<div class="row">
											<div class="col-md-2">
												<label><?php echo e(__('Amount')); ?> <span class="required-star">*</span></label>
											</div>
											<div class="col-md-10">
												<input type="number" class="form-control mb-3" name="amount" placeholder="<?php echo e(__('Amount')); ?>" required>
											</div>
										</div>
										<div class="row">
											<div class="col-md-2">
												<label><?php echo e(__('Payment Method')); ?></label>
											</div>
											<div class="col-md-10">
												<div class="mb-3">
													<select class="form-control selectpicker" data-minimum-results-for-search="Infinity" name="payment_option">
														<?php if(\App\BusinessSetting::where('type', 'paypal_payment')->first()->value == 1): ?>
															<option value="paypal"><?php echo e(__('Paypal')); ?></option>
														<?php endif; ?>
														<?php if(\App\BusinessSetting::where('type', 'stripe_payment')->first()->value == 1): ?>
															<option value="stripe"><?php echo e(__('Stripe')); ?></option>
														<?php endif; ?>
														<?php if(\App\BusinessSetting::where('type', 'sslcommerz_payment')->first()->value == 1): ?>
															<option value="sslcommerz"><?php echo e(__('SSLCommerz')); ?></option>
														<?php endif; ?>
														<?php if(\App\BusinessSetting::where('type', 'instamojo_payment')->first()->value == 1): ?>
															<option value="instamojo"><?php echo e(__('Instamojo')); ?></option>
														<?php endif; ?>
														<?php if(\App\BusinessSetting::where('type', 'paystack')->first()->value == 1): ?>
															<option value="paystack"><?php echo e(__('Paystack')); ?></option>
														<?php endif; ?>
														<?php if(\App\BusinessSetting::where('type', 'voguepay')->first()->value == 1): ?>
															<option value="voguepay"><?php echo e(__('VoguePay')); ?></option>
														<?php endif; ?>
													</select>
												</div>
											</div>
										</div>
									</div>
									<div class="modal-footer">
										<button type="submit" class="btn btn-base-1"><?php echo e(__('Confirm')); ?></button>
									</div>
								</form>
							</div>
						</div>
					</div>

    <script type="text/javascript">
        function show_wallet_modal(){
            $('#wallet_modal').modal('show');
        }
    </script><?php /**PATH /home/puzzlege/public_html/resources/views/frontend/inc/customer_side_nav.blade.php ENDPATH**/ ?>