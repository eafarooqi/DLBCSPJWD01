<?php

declare(strict_types=1);
namespace App\View\Components\Form;

use App\Concerns\HandlesValidationErrors;
use Illuminate\Support\Collection;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class Input extends Component
{
    use HandlesValidationErrors;

    /** @var string */
    public string $name;

    /** @var string */
    public string $id;

    /** @var string */
    public string $type;

    /** @var string */
    public mixed $value;

    /** @var string */
    public string $label;

    /** @var string */
    public string $row;

    /** @var string */
    public string $wrap;

    /** @var string */
    public string $labelClass;

    /** @var string */
    public string $leadingAddon;

    /** @var string */
    public string $leadingIcon;

    /** @var string */
    public string $trailingAddon;

    /** @var string */
    public string $trailingIcon;

    /** @var string */
    public string $fieldInfo;

    /** @var bool */
    public bool $disabled;

    /** @var bool */
    public bool $rtl;

    /** @var Collection */
    public Collection $dataList;

    /** @var bool */
    public bool $dataListMulti;

    public function __construct(
        string $name,
        string $id = null,
        string $type = 'text',
        ?string $value = '',
        bool $showErrors = true,
        string $label='',
        string $labelClass ='col-sm-2',
        string $row ='row mb-3',
        string $wrap ='col-sm-8',
        string $leadingAddon = '',
        string $leadingIcon = '',
        string $trailingAddon = '',
        string $trailingIcon = '',
        string $fieldInfo = '',
        bool $disabled = false,
        bool $rtl = false,
        Collection $dataList = null,
        bool $dataListMulti = false,
    )
    {
        $this->name = $name;
        $this->id = $id ?? $name;
        $this->type = $type;
        $this->showErrors = $showErrors;
        $this->label = $label;
        $this->labelClass = $labelClass;
        $this->row = $row;
        $this->wrap = $wrap;
        $this->leadingAddon = $leadingAddon;
        $this->leadingIcon = $leadingIcon;
        $this->trailingAddon = $trailingAddon;
        $this->trailingIcon = $trailingIcon;
        $this->fieldInfo = $fieldInfo;
        $this->disabled = $disabled;
        $this->rtl = $rtl;
        $this->dataList = $dataList;
        $this->dataListMulti = $dataListMulti;
        $this->value = old($name, $value ?? '');
    }

    public function inputClass(): string
    {
        return collect([
            'form-control',
            $this->rtl ? 'rtl' : '',
            $this->hasErrorsAndShow($this->name) ? 'is-invalid' : null,
        ])->filter()->implode(' ');
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render(): View
    {
        return view('components.forms.inputs.input');
    }
}
