@if ($row)
    <div class="{{ $row }}" @if ($rtl ?? null) dir="rtl" @endif>
@endif

@if($label ?? null)
    <x-form.label for="{{ $id }}" class="{{ $labelClass }}">{{ $label }}</x-form.label>
@endif

@if ($wrap)
    <div class="{{ $wrap }}">
@endif
