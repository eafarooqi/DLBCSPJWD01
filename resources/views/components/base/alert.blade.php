@if (!empty($message))
    <div role="alert" {{ $attributes->class(['alert', 'alert-dismissible' => $removable, 'fade', 'show', 'alert-'.$type]) }}>

        {{-- The close Button --}}
        @if ($removable)
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        @endif

        {{-- The Icon before Message --}}
        @if ($icon)
            <div class="alert-icon">
                <i class="far fa-fw fa-{{$icon}}"></i>
            </div>
        @endif

        <div class="alert-message">{{ $message }}</div>

        {{-- Allow additional HTML --}}
        {{ $slot }}
    </div>
@endif
