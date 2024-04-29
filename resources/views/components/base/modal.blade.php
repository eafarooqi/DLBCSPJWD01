<div wire:ignore.self class="modal fade" id="{{ $id }}" tabindex="-1" role="dialog" aria-labelledby="{{ $id }}" aria-hidden="true">
    <div {{ $attributes->class(['modal-dialog', 'modal-dialog-scrollable' => $scrollable, 'modal-dialog-centered' => $centered]) }} role="document">
        <div class="modal-content">
            @if ($slot->isNotEmpty())
                {!! $slot !!}
            @else
                <div class="modal-header">
                    @if ($title)
                        <h2 class="h6 modal-title">{{ $title }}</h2>
                    @endif
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    {{ $body ?? '' }}
                </div>
                <div class="modal-footer">

                    @if($showSubmit)
                        <button type="submit" class="btn btn-secondary modal-save-btn">{{ __('Speichern') }}</button>
                    @endif
                    @if($showCancel)
                        <button type="button" class="btn btn-link text-gray-600 ms-auto" data-bs-dismiss="modal">{{ __('Schließen') }}</button>
                    @endif

                    {{ $footer ?? '' }}
                </div>
            @endif
        </div>
    </div>
</div>
