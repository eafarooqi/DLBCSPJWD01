@if($trailingAddon)
    <span class="input-group-text text-gray-600">{!! $trailingAddon !!}</span>
@elseif ($trailingIcon)
    {!! $trailingIcon !!}
@endif

@if($leadingAddon || $leadingIcon || $trailingAddon || $trailingIcon)
    </div>
@endif
