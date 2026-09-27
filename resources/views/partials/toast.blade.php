@if ($toast = session('toast'))
    <div class="toast" role="status" data-toast>
        <span class="toast__icon"><x-ui-icon name="circle-check" :size="17" /></span>
        <div class="toast__body">
            <div class="toast__title">{{ $toast['title'] }}</div>
            <div class="toast__msg">{{ $toast['message'] }}</div>
        </div>
        <button type="button" class="toast__close" data-toast-close aria-label="Dismiss">
            <x-ui-icon name="x" :size="14" />
        </button>
    </div>
@endif
