@if($leadingAddon || $leadingIcon || $trailingAddon || $trailingIcon)
    <div class="input-group @if($hasErrorsAndShow($name)) is-invalid @endif">
@endif

@if($leadingAddon)
    <span class="input-group-text text-gray-600">{!! $leadingAddon !!}</span>
@elseif ($leadingIcon)
    {!! $leadingIcon !!}
@endif
