@include('components.forms.before')

<div @class(['removeValidationAfter', 'lw-validation', 'is-invalid' => $hasErrorsAndShow($name), 'is-valid' => (!$hasErrorsAndShow($name) && $value) ])>
    <div class="input-group" wire:ignore
        x-data="{
            picker: null,
            initPicker() {
                this.picker = flatpickr($refs.datePicker, {{ $jsonOptions() }});
                $el.closest('.removeValidationAfter').classList.remove('is-valid');
                 this.picker.config.onClose.push(function(selectedDates, dateStr, instance) {
                    if(instance.config.allowInput){
                        instance.setDate(selectedDates, true);
                    }
                } );
            }
        }"
    >
        <input
            x-ref="datePicker"
            x-init="initPicker()"
            x-on:mouseenter="initPicker()"
            name="{{ $name }}"
            id="{{ $id }}"
            type="{{ $type }}"
            placeholder="{{ $placeholder }}"
            @if($value) value="{{ $value }}" @endif
            {{ $attributes->merge(['class' => $inputClass()]) }}
        />
        <span class="input-group-text text-darkcyan has-js-validation" @click="picker.open()" title="{{ __('Kalender öffnen') }}"><span class="far fa-calendar-alt"></span></span>
        <span class="input-group-text text-light-orange has-js-validation" title="{{ __('löschen') }}" data-clear @click="picker.clear()">
            <i class="fas fa-times-circle"></i>
        </span>
    </div>
</div>
@if ($hasErrorsAndShow($name))
    @error($name)
    <x-form.error :field="$name" />
    @enderror
@endif

@include('components.forms.after')
