<div class="row" style="margin-top: 60px">
    <img id="loading" src="<?php echo IMAGES ?>loading.gif" alt="" style="width: 100px; display: none">
    <?php if(isset($message)): ?>
        <div class="alert alert-success alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
            </button>
            <strong><?php echo $message; ?></strong>
        </div>
    <?php endif; ?>
</div>
<div class="row">
    <a id="stocks_migration" href="javascript:void(0);" class="btn btn-info btn-lg">Stok</a>
</div>