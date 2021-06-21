<?php $__env->startSection('content'); ?>

    <section class="gry-bg py-4 profile">
        <div class="container">
            <div class="row cols-xs-space cols-sm-space cols-md-space">
                <div class="col-lg-3 d-lg-block">
                    <?php echo $__env->make('frontend.inc.customer_side_nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
                <div class="col-lg-9">
                    <!-- Page title -->
                    <div class="page-title">
                        <div class="row align-items-center">
                            <div class="col-md-6 col-12"> 
                                <h2 class="heading heading-6 text-capitalize strong-600 mb-0">
                                    <?php echo e(__('Dashboard')); ?>

                                </h2>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="float-md-right">
                                    <ul class="breadcrumb">
                                        <li><a href="<?php echo e(route('home')); ?>"><?php echo e(__('Home')); ?></a></li>
                                        <li class="active"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
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
                                    <a href="<?php echo e(route('specialoders')); ?>" class="d-block">
                                        <i class="fa fa-clock-o"></i>
                                        <span class="d-block title"><?php echo e(__('Set product order')); ?></span>
                                        <span class="d-block sub-title"><?php echo e(__('Order what you want')); ?></span> 
                                    </a> 
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="dashboard-widget text-center green-widget mt-4 c-pointer">
                                    <a href="<?php echo e(route('cart')); ?>" class="d-block">
                                        <i class="fa fa-shopping-cart"></i>
                                        <?php if(count($cart = App\Carts::where('user_id', Auth::user()->id)->get()) > 0): ?>
                                            <span class="d-block title"><?php echo e(count($cart)); ?> <?php echo e(__('Productss')); ?></span>
                                        <?php else: ?>
                                            <span class="d-block title">0 <?php echo e(__('Productss')); ?></span> 
                                        <?php endif; ?>
                                        <span class="d-block sub-title"><?php echo e(__('in your cart')); ?></span>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="dashboard-widget text-center red-widget mt-4 c-pointer">
                                    <a href="<?php echo e(route('wishlists.index')); ?>" class="d-block">
                                        <i class="fa fa-heart"></i>
                                        <span class="d-block title"><?php echo e(count(Auth::user()->wishlists)); ?> <?php echo e(__('Productss')); ?></span>
                                        <span class="d-block sub-title"><?php echo e(__('in your wishlist')); ?></span>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="dashboard-widget text-center yellow-widget mt-4 c-pointer">
                                    <a href="<?php echo e(route('dashboard')); ?>" class="d-block">
                                        <i class="fa fa-building"></i>
                                        <?php
                                            $orders = \App\Order::where('user_id', Auth::user()->id)->get();
                                            $total = 0;
                                            foreach ($orders as $key => $order) {
                                                $total += count($order->orderDetails);
                                            }
                                        ?>
                                        <span class="d-block title"><?php echo e($total); ?> <?php echo e(__('Productss')); ?></span>
                                        <span class="d-block sub-title"><?php echo e(__('you ordered')); ?></span>
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
													<?php echo e(__('Purchase History')); ?>

												</h2>
											</div>
											<div class="col-md-6 col-12">
												<div class="float-md-right">
													<ul class="breadcrumb">
														<li><a href="<?php echo e(route('home')); ?>"><?php echo e(__('Home')); ?></a></li>
														<li><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
														<li class="active"><a href="<?php echo e(route('purchase_history.index')); ?>"><?php echo e(__('Purchase History')); ?></a></li>
													</ul>
												</div>
											</div>
										</div>
									</div>

									<?php if(count($orders) > 0): ?>
										<!-- Order history table -->
										<div class="card no-border mt-4">
											<div>
												<table class="table table-sm table-hover table-responsive-md">
													<thead>
														<tr>
															<th><?php echo e(__('Code')); ?></th>
															<th><?php echo e(__('Date')); ?></th>
															<th><?php echo e(__('Amount')); ?></th>
															<th><?php echo e(__('Delivery Status')); ?></th>
															<th><?php echo e(__('Payment Status')); ?></th>
															<th><?php echo e(__('Invoices')); ?></th> 
														</tr>
													</thead>
													<tbody>
														<?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
															<tr>
																<td>
																	<a href="#<?php echo e($order->code); ?>" onclick="show_purchase_history_details(<?php echo e($order->id); ?>)"><?php echo e($order->code); ?></a>
																</td>
																<td><?php echo e(date('d-m-Y', $order->date)); ?></td>
																<td>
																	<?php echo e(single_price($order->grand_total)); ?>

																</td>
																<td>
																	<?php
																		$status = $order->orderDetails->first()->delivery_status;
																	?>
																	<?php if($order->delivery_viewed == 0): ?>
																		<span class="ml-2" style="color:green"><strong>(<?php echo e(__('Updated')); ?>)</strong></span>
																	<?php else: ?>
																		<?php echo e(__($status)); ?>

																	<?php endif; ?>
																</td>
																<td>
																	<span class="badge badge--2 mr-4">
																		<?php if($order->payment_status == 'paid'): ?>
																			<i class="bg-green"></i> <?php echo e(__('Paid')); ?>

																		<?php else: ?>
																			<i class="bg-red"></i> <?php echo e(__('Unpaid')); ?>

																		<?php endif; ?>
																	</span>
																</td>
																<td>
																	<div class="dropdown">
																		<button class="btn" type="button" id="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
																			<i class="fa fa-ellipsis-v"></i>
																		</button>

																		<div class="dropdown-menu dropdown-menu-right" aria-labelledby="">
                                                                <button onclick="show_purchase_history_details(<?php echo e($order->id); ?>)" class="dropdown-item"><?php echo e(__('Order Details')); ?></button>
																			<a href="<?php echo e(route('customer.invoice.download', $order->id)); ?>" class="dropdown-item"><?php echo e(__('Download Invoice')); ?></a>
																		</div>
																	</div>
																</td>
															</tr>
														<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
													</tbody>
												</table>
											</div>
										</div>
									<?php endif; ?>
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
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script type="text/javascript">
        $('#order_details').on('hidden.bs.modal', function () {
            location.reload();
        })
    </script>
    
    <?php if(isset($_GET['result']) && $_GET['result'] == 'success') { ?>  
          <script>
            showFrontendAlert('success', '<?php echo e(__("Your order has been placed successfully")); ?>');
          </script>
    <?php }elseif(isset($_GET['result']) && $_GET['result'] == 'failed'){ ?>
          <script>
            showFrontendAlert('danger', '<?php echo e(__("Payment Failed")); ?>');
          </script>     
    <?php } ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Puzzle\resources\views/frontend/customer/dashboard.blade.php ENDPATH**/ ?>