<?php

declare(strict_types=1);
namespace App\View\Components\Form;

use App\Concerns\HandlesValidationErrors;
use Illuminate\View\Component;
use Illuminate\View\View;

class Show extends Component
{
    use HandlesValidationErrors;

    /** @var string */
    public string $name;

    /** @var string */
    public string $id;

    /** @var string */
    public string $type;

    /** @var string */
    public ?string $value;

    /** @var string */
    public string $label;

    /** @var string */
    public string $row;

    /** @var string */
    public string $wrap;

    /** @var string */
    public string $labelClass;

    /** @var bool */
    public bool $border;

    /** @var string */
    public string $fieldInfo;

    /** @var string */
    public string $bgColor;

    public function __construct(
        string $name = '',
        string $id = '',
        string $type = 'text',
        ?string $value = '',
        bool $showErrors = true,
        string $label='',
        string $labelClass ='col-sm-2 col-form-label',
        string $row ='row mb-3',
        string $wrap ='col-sm-8',
        bool $border =true,
        string $fieldInfo = '',
        string $bgColor = '#F0F0F05E'
    )
    {
        $this->name = $name;
        $this->id = $id;
        $this->type = $type;
        $this->showErrors = $showErrors;
        $this->label = $label;
        $this->labelClass = $labelClass;
        $this->row = $row;
        $this->wrap = $wrap;
        $this->value = $value;
        $this->border = $border;
        $this->bgColor = $bgColor;
        $this->fieldInfo = $fieldInfo;
    }

    public function inputClass(): string
    {
        return collect([
            'form-control',
            $this->type == 'text' ? 'form-text' : null,
            $this->type == 'checkbox' ? 'form-checkbox' : null,
            $this->border ? null : 'border-0 ps-1 shadow-none',
            $this->hasErrorsAndShow($this->name) ? 'is-invalid' : null,
        ])->filter()->implode(' ');
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View
     */
    public function render(): View
    {
        return view('components.show');
    }
}
