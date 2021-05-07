
<?php $__env->startSection('settings-page'); ?>
<!--settings-->
<form class="form"  id="settingsFormEmailSMTP">

    <!--smtp host-->
    <div class="form-group row">
        <label class="col-12 control-label col-form-label"><?php echo e(cleanLang(__('lang.smtp_host'))); ?></label>
        <div class="col-12">
            <input type="text" class="form-control form-control-sm" id="settings_email_smtp_host"
                name="settings_email_smtp_host" value="<?php echo e($settings->settings_email_smtp_host ?? ''); ?>">
        </div>
    </div>

    <!--port-->
    <div class="form-group row">
        <label class="col-12 control-label col-form-label"><?php echo e(cleanLang(__('lang.smtp_port'))); ?></label>
        <div class="col-12">
            <input type="text" class="form-control form-control-sm" id="settings_email_smtp_port"
                name="settings_email_smtp_port" value="<?php echo e($settings->settings_email_smtp_port ?? ''); ?>">
        </div>
    </div>

    <!--usrname-->
    <div class="form-group row">
        <label class="col-12 control-label col-form-label"><?php echo e(cleanLang(__('lang.username'))); ?></label>
        <div class="col-12">
            <input type="text" class="form-control form-control-sm" id="settings_email_smtp_username"
                name="settings_email_smtp_username" value="<?php echo e($settings->settings_email_smtp_username ?? ''); ?>">
        </div>
    </div>

    <!--password-->
    <div class="form-group row">
        <label class="col-12 control-label col-form-label"><?php echo e(cleanLang(__('lang.password'))); ?></label>
        <div class="col-12">
            <input type="text" class="form-control form-control-sm" id="settings_email_smtp_password"
                name="settings_email_smtp_password" value="<?php echo e($settings->settings_email_smtp_password ?? ''); ?>">
        </div>
    </div>

    <!--ensryption-->
    <div class="form-group row">
        <label for="example-month-input" class="col-12 col-form-label text-left"><?php echo e(cleanLang(__('lang.encryption'))); ?></label>
        <div class="col-12">
            <select class="select2-basic form-control form-control-sm" id="settings_email_smtp_encryption"
                name="settings_email_smtp_encryption">
                <option value="none">None</option>
                <option value="tls" <?php echo e(runtimePreselected('tls', $settings->settings_email_smtp_encryption ?? '')); ?>>
                    TLS</option>
                <option value="starttls"
                    <?php echo e(runtimePreselected('starttls', $settings->settings_email_smtp_encryption ?? '')); ?>>
                    STARTTLS</option>
                <option value="ssl" <?php echo e(runtimePreselected('ssl', $settings->settings_email_smtp_encryption ?? '')); ?>>
                    SSL</option>
            </select>
        </div>
    </div>

    
    <div>
        <!--settings documentation help-->
        <a href="https://growcrm.io/documentation/email-settings/"  target="_blank" class="btn btn-sm btn-info  help-documentation"><i class="ti-info-alt"></i>
            <?php echo e(cleanLang(__('lang.help_documentation'))); ?></a>
    </div>
    
    <!--buttons-->
    <div class="text-right">
        <button type="submit" id="commonModalSubmitButton"
            class="btn btn-rounded-x btn-danger waves-effect text-left" data-url="/settings/email/smtp"
            data-loading-target="" data-ajax-type="PUT" data-type="form" data-on-start-submit-button="disable"><?php echo e(cleanLang(__('lang.save_changes'))); ?></button>
    </div>
</form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('pages.settings.ajaxwrapper', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/gi8l84000zs4/Crmstock.io/application/resources/views/pages/settings/sections/email/smtp.blade.php ENDPATH**/ ?>