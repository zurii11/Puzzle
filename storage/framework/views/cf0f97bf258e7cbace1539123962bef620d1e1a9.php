

<?php $__env->startSection('content'); ?>

<?php if($type != 'Seller'): ?>
    <div class="row">
        <div class="col-lg-12">
            <a href="<?php echo e(route('products.create')); ?>" class="btn btn-rounded btn-info pull-right"><?php echo e(__('Add New Product')); ?></a>
        </div>
    </div>
<?php endif; ?>

<br>

<div class="col-lg-12">
    <div class="panel">
        <!--Panel heading-->
        <div class="panel-heading">
            <h3 class="panel-title"><?php echo e(__($type.' Products')); ?></h3>
        </div>
        <div class="panel-body">
            <table class="table table-striped table-bordered demo-dt-basic" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>#</th>
                        <th width="20%"><?php echo e(__('Name')); ?></th>
                        <th><?php echo e(__('Barcode')); ?></th>
                        <th><?php echo e(__('Code')); ?></th>
                        <th><?php echo e(__('Fina')); ?></th>
                        <th><?php echo e(__('Photo')); ?></th>
                        <th><?php echo e(__('Category')); ?></th>
                        <th><?php echo e(__('Subcategory')); ?></th>
                        <th><?php echo e(__('Price')); ?></th>
                        <th><?php echo e(__('Published')); ?></th>
                        <th><?php echo e(__('Options')); ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($key+1); ?></td>
                            <td><a href="<?php echo e(route('product', $product->slug)); ?>" target="_blank"><?php echo e(__($product->name)); ?></a></td>
                            <td><?php echo e(__($product->barcode)); ?></td>
                            <td><?php echo e(__($product->productcode)); ?></td>
                            <td><?php echo e(__($product->finaid)); ?></td>
                            <td><img loading="lazy"  class="img-md" src="<?php echo e(asset($product->thumbnail_img)); ?>" alt="Image"></td>
                            <td> <?php echo \App\Category::where('id', $product->category_id)->first()->name; ?> </td>
                            <td> <?php echo \App\SubCategory::where('id', $product->subcategory_id)->first()->name; ?></td>
                            <td><?php echo e(number_format($product->unit_price,2)); ?></td>
                            <td><label class="switch">
                                <input onchange="update_published(this)" value="<?php echo e($product->id); ?>" type="checkbox" <?php if($product->published == 1) echo "checked";?> >
                                <span class="slider round"></span></label></td>
                            <td style="width: 150px;">
                            <?php if($type == 'Seller'): ?>
                            <a href="<?php echo e(route('products.seller.edit', encrypt($product->id))); ?>"> 
                                <button class="btn btn-primary dropdown-toggle dropdown-toggle-icon"type="button"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i> </button>
                            </a>
                            <?php else: ?>
                            <a href="<?php echo e(route('products.admin.edit', encrypt($product->id))); ?>"> 
                                <button class="btn btn-primary dropdown-toggle dropdown-toggle-icon"type="button"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i> </button>
                            </a>
                            <?php endif; ?>
                            <a onclick="confirm_modal('<?php echo e(route('products.destroy', $product->id)); ?>');"> 
                                <button class="btn btn-danger dropdown-toggle dropdown-toggle-icon"type="button"> <i class="fa fa-trash" aria-hidden="true"></i> </button>
                            </a>
                            <a href="<?php echo e(route('products.duplicate', $product->id)); ?>">
                                <button class="btn btn-warning dropdown-toggle dropdown-toggle-icon"type="button"> <i class="fa fa-files-o" aria-hidden="true"></i> </button>
                            </a>
                            </td> 
                        </tr> 
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>

        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('script'); ?>
    <script type="text/javascript">

        $(document).ready(function(){
            //$('#container').removeClass('mainnav-lg').addClass('mainnav-sm');
        });

        function update_todays_deal(el){
            if(el.checked){
                var status = 1;
            }
            else{
                var status = 0;
            }
            $.post('<?php echo e(route('products.todays_deal')); ?>', {_token:'<?php echo e(csrf_token()); ?>', id:el.value, status:status}, function(data){
                if(data == 1){
                    showAlert('success', 'Todays Deal updated successfully');
                }
                else{
                    showAlert('danger', 'Something went wrong');
                }
            });
        }

        function update_published(el){
            if(el.checked){
                var status = 1;
            }
            else{
                var status = 0;
            }
            $.post('<?php echo e(route('products.published')); ?>', {_token:'<?php echo e(csrf_token()); ?>', id:el.value, status:status}, function(data){
                if(data == 1){
                    showAlert('success', 'Published products updated successfully');
                }
                else{
                    showAlert('danger', 'Something went wrong');
                }
            });
        }

        function update_featured(el){
            if(el.checked){
                var status = 1;
            }
            else{
                var status = 0;
            }
            $.post('<?php echo e(route('products.featured')); ?>', {_token:'<?php echo e(csrf_token()); ?>', id:el.value, status:status}, function(data){
                if(data == 1){
                    showAlert('success', 'Featured products updated successfully');
                }
                else{
                    showAlert('danger', 'Something went wrong');
                }
            });
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/puzzlege/public_html/resources/views/products/index.blade.php ENDPATH**/ ?>