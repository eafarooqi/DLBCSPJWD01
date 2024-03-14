@include('components.forms.before')

<textarea
    name="{{ $name }}"
    id="{{ $id }}"
    rows="{{ $rows }}"
    @if ($hasErrorsAndShow($name))
    aria-invalid="true"

    @if (! $attributes->offsetExists('aria-describedby'))
    aria-describedby="{{ $id }}-error"
        @endif

    @endif
    {!! $attributes->merge(['class' => $inputClass(), 'rows' => 3]) !!}
>@if (! is_null($value)){!! $value !!}@elseif ($slot->isNotEmpty()){!! $slot !!}@endif</textarea>

@if ($fieldInfo)
    <small class="form-text text-muted">{{ $fieldInfo }}</small>
@endif

@if ($hasErrorsAndShow($name))
    @error($name)
    <x-form.error :field="$name" />
    @enderror
@endif

@include('components.forms.after')
