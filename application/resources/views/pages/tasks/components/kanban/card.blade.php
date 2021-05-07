@foreach($board['tasks'] as $task)
<!--each card-->
<div class="kanban-card show-modal-button reset-card-modal-form js-ajax-ux-request" data-toggle="modal"
    data-target="#cardModal" data-url="{{ urlResource('/tasks/'.$task->task_id) }}" data-task-id="{{ $task->task_id }}"
    data-loading-target="main-top-nav-bar" id="card_task_{{ $task->task_id }}">
    <div class="x-title wordwrap" id="kanban_task_title_{{ $task->task_id }}">{{ $task->task_title }}
        <span class="x-action-button" id="card-action-button-{{ $task->task_id }}" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false"><i class="mdi mdi-dots-vertical"></i></span>
        <div class="dropdown-menu dropdown-menu-small dropdown-menu-right js-stop-propagation"
            aria-labelledby="card-action-button-{{ $task->task_id }}">
            @php $count_actions = 0 ; @endphp
            <!--delete-->
            @if($task->permission_delete_task)
            <a class="dropdown-item confirm-action-danger  js-stop-propagation" data-confirm-title="{{ cleanLang(__('lang.delete_item')) }}"
                data-confirm-text="{{ cleanLang(__('lang.are_you_sure')) }}" data-ajax-type="DELETE"
                data-url="{{ url('/') }}/tasks/{{ $task->task_id }}">{{ cleanLang(__('lang.delete')) }}</a>
            @php $count_actions ++ ; @endphp
            @endif
            <!--stop my timer-->
            @if($task->timer_current_status)
            <a class="dropdown-item confirm-action-danger js-stop-propagation" data-confirm-title="{{ cleanLang(__('lang.stop_my_timer')) }}"
                data-confirm-text="{{ cleanLang(__('lang.are_you_sure')) }}" data-ajax-type="GET"
                data-url="{{ url('/') }}/tasks/timer/{{ $task->task_id }}?action=stop">{{ cleanLang(__('lang.stop_my_timer')) }}</a>
            @php $count_actions ++ ; @endphp
            @endif
            <!--stop all timers-->
            @if(auth()->user()->is_team && $task->permission_super_user)
            <a class="dropdown-item confirm-action-danger js-stop-propagation" data-confirm-title="{{ cleanLang(__('lang.stop_all_timers')) }}"
                data-confirm-text="{{ cleanLang(__('lang.are_you_sure')) }}" data-ajax-type="GET"
                data-url="{{ url('/') }}/tasks/timer/{{ $task->task_id }}/stopall?source=list">{{ cleanLang(__('lang.stop_all_timers')) }}</a>
            @php $count_actions ++ ; @endphp
            @endif
            <!--no actions-->
            @if($count_actions == 0)
            <a class="dropdown-item js-stop-propagation" href="javascript:void(0);">{{ cleanLang(__('lang.no_actions_available')) }}</a>
            @endif
        </div>
    </div>
    <div class="x-meta">
        <!--priority-->
        @if(config('system.settings_tasks_kanban_priority') == 'show')
        <label class="label {{ runtimeTaskPriorityColors($task->task_priority, 'label') }} p-t-3 p-b-3 p-l-8 p-r-8"
            data-toggle="tooltip" title="{{ cleanLang(__('lang.priority')) }}">{{ runtimeLang($task->task_priority) }}</label>
        @endif
        <!--date created-->
        @if(config('system.settings_tasks_kanban_date_created') == 'show')
        <span><strong>{{ cleanLang(__('lang.created')) }}:</strong> {{ runtimeDate($task->task_created) }}</span>
        @endif
        <!--start date-->
        @if(config('system.settings_tasks_kanban_date_start') == 'show')
        <span><strong>{{ cleanLang(__('lang.start_date')) }}:</strong>: {{ runtimeDate($task->task_date_start) }}</span>
        @endif
        <!--due date-->
        @if(config('system.settings_tasks_kanban_date_due') == 'show')
        <span><strong>{{ cleanLang(__('lang.due')) }}:</strong>: {{ runtimeDate($task->task_date_due) }}</span>
        @endif
    </div>
    <div class="x-footer row">
        <div class="col-6 x-icons">

            <!--client visibility-->
            @if(config('system.settings_tasks_kanban_client_visibility') == 'show' && auth()->user()->is_team)
            @if($task->task_client_visibility == 'no')
            <span class="x-icon" data-toggle="tooltip" title="{{ cleanLang(__('lang.client')) }} - {{ cleanLang(__('lang.hidden')) }}" data-placement="top"><i
                    class="mdi mdi-eye-outline-off"></i></span>
            @endif
            @endif

            <!--attachments-->
            @if($task->has_attachments)
            <span class="x-icon"><i class="mdi mdi-attachment"></i>
                @if($task->count_unread_attachments > 0)
                <span class="x-notification" id="card_notification_attachment_{{ $task->task_id }}"></span>
                @endif
            </span>
            @endif
            <!--comments-->
            @if($task->has_comments)
            <span class="x-icon"><i class="mdi mdi-comment-text-outline"></i>
                @if($task->count_unread_comments > 0)
                <span class="x-notification" id="card_notification_comment_{{ $task->task_id }}"></span>
                @endif
            </span>
            @endif

            <!--checklists-->
            @if($task->has_checklist)
            <span class="x-icon"><i class="mdi mdi-checkbox-marked-outline"></i></span>
            @endif

            <!--timer running-->
            <span class="x-icon text-danger {{ runtimeCardMyRunningTimer($task->timer_current_status) }}"
                id="card-task-timer-{{ $task->task_id }}"><i class="mdi mdi-timer"></i></span>

        </div>
        <div class="col-6 x-assigned">
            @foreach($task->assigned as $user)
            <img src="{{ getUsersAvatar($user->avatar_directory, $user->avatar_filename) }}" data-toggle="tooltip"
                title="" data-placement="top" alt="{{ $user->first_name }}" class="img-circle avatar-xsmall"
                data-original-title="{{ $user->first_name }}">
            @endforeach
        </div>
    </div>
</div>
@endforeach