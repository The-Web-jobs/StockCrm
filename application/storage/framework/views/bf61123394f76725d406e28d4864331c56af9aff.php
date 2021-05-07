<!-- Column -->
<div class="card">
    <!--has logo-->
    <?php if(isset($client['client_logo_folder']) && $client['client_logo_folder'] != ''): ?>
    <div class="card-body profile_header">
        <img src="<?php echo e(url('/')); ?>/storage/logos/clients/<?php echo e($client['client_logo_folder'] ?? '0'); ?>/<?php echo e($client['client_logo_filename'] ?? ''); ?>">
    </div>
    <?php else: ?>
    <!--no logo -->
    <div class="card-body profile_header client logo-text">
        <?php echo e($client->client_company_name); ?>

    </div>
    <?php endif; ?>
    <div class="card-body p-t-0 p-b-0">
        <?php if(auth()->user()->is_team): ?>
        <div>
            <small class="text-muted"><?php echo e(cleanLang(__('lang.client_name'))); ?></small>
            <h6><?php echo e($client->client_company_name); ?></h6>
            <small class="text-muted"><?php echo e(cleanLang(__('lang.telephone'))); ?></small>
            <h6><?php echo e($client->client_phone); ?></h6>
            <small class="text-muted"><?php echo e(cleanLang(__('lang.account_owner'))); ?></small>
            <div class="m-b-10"><img src="<?php echo e(getUsersAvatar($owner->avatar_directory, $owner->avatar_filename)); ?>" alt="user" class="img-circle avatar-xsmall"> <?php echo e($owner->first_name); ?> <?php echo e($owner->last_name); ?></div>
            <small class="text-muted"><?php echo e(cleanLang(__('lang.account_status'))); ?></small>
            <div>
                <?php if($client->client_status == 'active'): ?>
                <span class="badge badge-pill badge-success"><?php echo e(cleanLang(__('lang.active'))); ?></span>
                <?php else: ?>
                <span class="badge badge-pill badge-danger"><?php echo e(cleanLang(__('lang.suspended'))); ?></span>
                <?php endif; ?>
            </div>
        </div>
        <?php endif; ?>
    </div>
    <div>
        <hr> </div>
    <div class="card-body p-t-0 p-b-0">
        <div>
            <table class="table no-border m-b-0">
                <tbody>
                    <!--invoices-->
                    <tr>
                        <td class="p-l-0 p-t-5"id="fx-client-left-panel-invoices"><?php echo e(cleanLang(__('lang.invoices'))); ?></td>
                        <td class="font-medium p-r-0 p-t-5">
                            <?php echo e(runtimeMoneyFormat($client->sum_invoices_all)); ?>

                            <div class="progress">
                                <div class="progress-bar bg-info  w-100 h-px-3" role="progressbar" aria-valuenow="25" aria-valuemin="0"
                                    aria-valuemax="100"></div>
                            </div>
                        </td>
                    </tr>
                    <!--payments-->
                    <tr>
                        <td class="p-l-0 p-t-5"><?php echo e(cleanLang(__('lang.payments'))); ?></td>
                        <td class="font-medium p-r-0 p-t-5"><?php echo e(runtimeMoneyFormat($client->sum_all_payments)); ?>

                            <div class="progress">
                                <div class="progress-bar bg-success w-100 h-px-3" role="progressbar"aria-valuenow="25" aria-valuemin="0"
                                    aria-valuemax="100"></div>
                            </div>
                        </td>
                    </tr>
                    <!--completed projects-->
                    <tr>
                        <td class="p-l-0 p-t-5"><?php echo e(cleanLang(__('lang.completed_projects'))); ?></td>
                        <td class="font-medium p-r-0 p-t-5"><?php echo e($client->count_projects_completed); ?>

                            <div class="progress">
                                <div class="progress-bar bg-warning  w-100 h-px-3" role="progressbar" aria-valuenow="25" aria-valuemin="0"
                                    aria-valuemax="100"></div>
                            </div>
                        </td>
                    </tr>
                    <!--open projects-->
                    <tr>
                        <td class="p-l-0 p-t-5"><?php echo e(cleanLang(__('lang.open_projects'))); ?></td>
                        <td class="font-medium p-r-0 p-t-5"><?php echo e($client->count_projects_pending); ?>

                            <div class="progress">
                                <div class="progress-bar bg-danger w-100 h-px-3" role="progressbar"aria-valuenow="25" aria-valuemin="0"
                                    aria-valuemax="100"></div>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div>
        <hr> </div>
        <!--client address-->
    <div class="card-body p-t-0 p-b-0">
        <small class="text-muted"><?php echo e(cleanLang(__('lang.address'))); ?></small>
        <?php if($client->client_billing_street !== ''): ?>
        <h6><?php echo e($client->client_billing_street); ?></h6>
        <?php endif; ?>
        <?php if($client->client_billing_city !== ''): ?>
        <h6><?php echo e($client->client_billing_city); ?></h6>
        <?php endif; ?>
        <?php if($client->client_billing_state !== ''): ?>
        <h6><?php echo e($client->client_billing_state); ?></h6>
        <?php endif; ?>
        <?php if($client->client_billing_zip !== ''): ?>
        <h6><?php echo e($client->client_billing_zip); ?></h6>
        <?php endif; ?>
        <?php if($client->client_billing_country !== ''): ?>
        <h6><?php echo e($client->client_billing_country); ?></h6>
        <?php endif; ?>
    </div>

    <div class="d-none last-line">
        <hr> </div>
</div>
<!-- Column --><?php /**PATH /home/gi8l84000zs4/Crmstock.io/application/resources/views/pages/client/components/misc/leftpanel.blade.php ENDPATH**/ ?>