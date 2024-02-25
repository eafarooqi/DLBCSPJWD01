<?php

declare(strict_types=1);

namespace App\View\Components\Form;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Form extends Component
{
    public function __construct(
        public string $action,
        public string $method = 'POST',
        public bool $hasFiles = false,
        public bool $hasJsValidation = false
    )
    {
        $this->method = strtoupper($method);
    }

    public function render(): View
    {
        return view('components.forms.form');
    }
}
