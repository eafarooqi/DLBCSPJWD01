@include('components.forms.before')

<div @class(['p-0', 'is-invalid' => $hasErrorsAndShow($name), 'valid' => !$hasErrorsAndShow($name)]) >
    <div wire:ignore
         x-data="{
            tomSelectDropDown: null,
            initTomSelect() {
                this.tomSelectDropDown = new TomSelect($refs.choices, {{ $jsonOptions() }});
            },
        }"
    >
        <select
            x-init="initTomSelect()"
            x-ref="choices"
            name="{{ $name }}"
            id="{{ $id }}"
            placeholder="{{ $placeholder }}"
            {{ ($required ?? false) ? 'required' : '' }}
            @if ($multiple) multiple @endif
            {{ $attributes->merge(['class' => $inputClass()]) }}
        >

            @if($hasOptionGroups)
                @foreach ($options as $option)
                    @if($option->children)
                        <optgroup label="{{ $option->name }}">
                            @foreach ($option->children as $child)
                                <option value="{{ $child->id }}" @if ($isSelected($child->id)) selected @endif>{{ $child->name }}</option>
                            @endforeach
                        </optgroup>
                    @else
                        <option value="{{ $option->id }}" @if ($isSelected($option->id)) selected @endif>{{ $option->name }}</option>
                    @endif
                @endforeach
            @else
                @foreach ($options as $key => $label)
                    <option value="{{ $key }}" @if ($isSelected($key)) selected @endif>{{ $label }}</option>
                @endforeach
            @endif
        </select>
    </div>
</div>

@if ($hasErrorsAndShow($name))
    @error($name)
    <x-form.error :field="$name" />
    @enderror
@endif

@include('components.forms.after')
