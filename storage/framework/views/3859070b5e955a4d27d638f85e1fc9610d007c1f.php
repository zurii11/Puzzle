

<?php $__env->startSection('content'); ?>

    <section class="gry-bg py-4">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="p-4 bg-white">
                        <?php
                            echo \App\Policy::where('name', 'privacy_policy')->first()->content;
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/solage/public_html/puzzle.sola.ge/resources/views/frontend/policies/privacypolicy.blade.php ENDPATH**/ ?>