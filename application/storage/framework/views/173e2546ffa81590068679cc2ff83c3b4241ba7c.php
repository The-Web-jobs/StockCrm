<!--attachment-->
<?php if($event->event_item == 'attachment'): ?>
<div class="x-description"><a href="<?php echo e(url($event->event_item_content2)); ?>"><?php echo e($event->event_item_content); ?></a>
</div>
<?php endif; ?>

<!--comment-->
<?php if($event->event_item == 'comment'): ?>
<div class="x-description"><?php echo clean($event->event_item_content); ?></div>
<?php endif; ?>

<!--status-->
<?php if($event->event_item == 'status'): ?>
<div class="x-description"><strong><?php echo e(cleanLang(__('lang.new_status'))); ?>:</strong> <?php echo e(runtimeLang($event->event_item_content)); ?>

</div>
<?php endif; ?>

<!--file-->
<?php if($event->event_item == 'file'): ?>
<div class="x-description"><a href="<?php echo e(url($event->event_item_content2)); ?>"><?php echo e($event->event_item_content); ?></a>
</div>
<?php endif; ?>

<!--task-->
<?php if($event->event_item == 'task'): ?>
<div class="x-description">
        <a href="<?php echo e(url('/tasks/v/'.$event->event_item_id.'/'.str_slug($event->event_parent_title))); ?>"><?php echo e($event->event_item_content); ?></a>
</div>
<?php endif; ?>

<!--tickets-->
<?php if($event->event_item == 'ticket'): ?>
<div class="x-description"><a href="<?php echo e(url('tickets/'.$event->event_item_id)); ?>"><?php echo clean($event->event_item_content); ?></a>
</div>
<?php endif; ?>

<!--invoice-->
<?php if($event->event_item == 'invoice'): ?>
<div class="x-description"><a href="<?php echo e(url('invoices/'.$event->event_item_id)); ?>"><?php echo clean($event->event_item_content); ?></a>
</div>
<?php endif; ?>


<!--estimate-->
<?php if($event->event_item == 'estimate'): ?>
<div class="x-description"><a href="<?php echo e(url('estimates/'.$event->event_item_id)); ?>"><?php echo clean($event->event_item_content); ?></a>
</div>
<?php endif; ?>

<!--project (..but do not show on project timeline)-->
<?php if($event->event_item == 'new_project' && request('timelineresource_type') != 'project'): ?>
<div class="x-description"><a
                href="<?php echo e(url('projects/'.$event->event_parent_id)); ?>"><?php echo e($event->event_parent_title); ?></a>
</div>
<?php endif; ?><?php /**PATH C:\xampp\htdocs\crmstock\application\resources\views/pages/events/includes/content.blade.php ENDPATH**/ ?>