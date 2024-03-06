@include('components.forms.before')

<div
    id="{{ $id }}"
    @if($bgColor && $type != 'checkbox') style="background-color: {{ $bgColor }}; min-height: 36px;"@endif
    data-value="{{ $value }}"
    {{ $attributes->merge(['class' => $inputClass()]) }}>

    @if($type == 'checkbox')
        {!! $value==1 ? '<i class="fa fa-check-square"></i>' : '<i class="far fa-square"></i>' !!}
    @else
        {{ $value }}
    @endif

    @if ($hasErrorsAndShow($name))
        @error($name)
        <x-form.error :field="$name" />
        @enderror
    @endif
</div>
<!-- <div class="invalid-feedback">Dies ist ein Pflichtfeld</div> -->

@if ($fieldInfo)
    <small class="form-text text-muted">{{ $fieldInfo }}</small>
@endif

@include('components.forms.after')
