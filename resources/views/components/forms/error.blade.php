@error($field, $bag)
    <div id="{{$field}}-error"  {{ $attributes->merge(['class' => 'invalid-feedback']) }} dir="{{ $rtl }}">
        @if ($slot->isEmpty())
            {{ $message }}
        @else
            {{ $slot }}
        @endif
    </div>
@enderror
