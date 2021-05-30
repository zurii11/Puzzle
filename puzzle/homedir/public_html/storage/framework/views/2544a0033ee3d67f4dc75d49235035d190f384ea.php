<script type="text/javascript">
    function confirm_modal(delete_url)
    {
        jQuery('#confirm-delete').modal('show', {backdrop: 'static'});
        document.getElementById('delete_link').setAttribute('href' , delete_url);
    }
    
    function confirm_modal_status(delete_url)
    {
        jQuery('#confirm-status-change').modal('show', {backdrop: 'static'});
        document.getElementById('change_link').setAttribute('href' , delete_url);
    }
</script>

<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myModalLabel"><?php echo e(__('Confirmation')); ?></h4>
            </div>

            <div class="modal-body">
                <p><?php echo e(__('Delete confirmation message')); ?></p>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo e(__('Cancel')); ?></button>
                <a id="delete_link" class="btn btn-danger btn-ok"><?php echo e(__('Delete')); ?></a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="confirm-status-change" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myModalLabel"><?php echo e(__('Confirmation')); ?></h4>
            </div>

            <div class="modal-body">
                <p><?php echo e(__('Status Change confirmation message')); ?></p>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo e(__('Cancel')); ?></button>
                <a id="change_link" class="btn btn-danger btn-ok"><?php echo e(__('Change')); ?></a>
            </div>
        </div>
    </div>
</div>
<?php /**PATH /home/solage/public_html/puzzle.sola.ge/resources/views/partials/modal.blade.php ENDPATH**/ ?>