
<div style="margin: 20px 0;">
    <?php if (Session::has('flash_message')): ?>
    <div class="alert alert-{{ Session::get('flash_type') }} text-left">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true" >&times;</button>
        <?=Session::get('flash_message')?>
    </div>
    <?php endif; ?>
</div>
