@include('components.forms.before')
@include('components.forms.leading-addons')

    <input
        name="{{ $name }}"
        type="{{ $type }}"
        id="{{ $id }}"
        autocomplete="off"
        {{ $attributes->merge(['class' => $inputClass()]) }}
        @if(!is_null($value))value="{{ $value }}" @endif

        @if ($hasErrorsAndShow($name))
            aria-invalid="true"

            @if (! $attributes->offsetExists('aria-describedby'))
            aria-describedby="{{ $id }}-error"
            @endif
        @endif
        {{ ($required ?? false) ? 'required' : '' }}
        {{ ($disabled ?? false) ? 'disabled' : '' }}
        @if($dataList && $dataList->count() > 0 && !$dataListMulti)list="list_{{ $id }}"@endif
        @if($dataList && $dataList->count() > 0 && $dataListMulti)
            data-multiple
        data-list="{{ $dataList->implode(', ') }}"
        @endif
    />

    @if($dataList && $dataList->count() > 0 && !$dataListMulti)
        <datalist id="list_{{ $id }}">
            @foreach($dataList as $listItem)
                <option>{{ $listItem }}</option>
            @endforeach
        </datalist>
    @endif

    @include('components.forms.trailing-addons')

    @if ($fieldInfo)
        <small class="form-text text-muted">{{ $fieldInfo }}</small>
    @endif

    @if ($hasErrorsAndShow($name))
        @error($name)
            <x-form.error :field="$name" />
        @enderror
    @endif
    <!--<div class="invalid-feedback">Please provide valid data.</div>-->

@include('components.forms.after')
