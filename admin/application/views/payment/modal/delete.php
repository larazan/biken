<div class="modal-header">
    <h4 class="modal-title">Delete Payment</h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<?php
$attributes = array('class' => 'm-form m-form--fit m-form--label-align-right');
echo form_open(base_url() . 'payment/delete', $attributes);
?>
<div class="modal-body">
    <input type="hidden" name="id" value="<?= $param2 ?>">
    <h5>Are you sure you want to delete this payment ?</h5>
</div>
<div class="modal-footer justify-content-between">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    <button type="submit" class="btn btn-danger" name="submit" value="Delete">Delete</button>
</div>
</form>