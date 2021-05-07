<div class="card-title" id="<?php echo e(runtimePermissions('lead-edit-title', $lead->permission_edit_lead)); ?>">
    <?php echo e($lead->lead_title); ?>

</div>


<!--buttons: edit-->
<?php if($lead->permission_edit_lead): ?>
<div id="card-title-edit" class="card-title-edit hidden">
    <input type="text" class="form-control form-control-sm card-title-input" id="lead_title" name="lead_title">
    <!--button: subit & cancel-->
    <div id="card-title-submit" class="p-t-10 text-right">
        <button type="button" class="btn waves-effect waves-light btn-xs btn-default"
            id="card-title-button-cancel"><?php echo e(cleanLang(__('lang.cancel'))); ?></button>
        <button type="button" class="btn waves-effect waves-light btn-xs btn-danger"
            data-url="<?php echo e(url('/leads/'.$lead->lead_id.'/update-title')); ?>" data-progress-bar='hidden' data-type="form"
            data-form-id="card-title-edit" data-ajax-type="post" id="card-title-button-save"><?php echo e(cleanLang(__('lang.save'))); ?></button>
    </div>
</div>
<?php endif; ?><?php /**PATH /home/gi8l84000zs4/Crmstock.io/application/resources/views/pages/lead/components/title.blade.php ENDPATH**/ ?>