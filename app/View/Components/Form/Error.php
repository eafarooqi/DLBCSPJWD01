<?php

declare(strict_types=1);
namespace App\View\Components\Form;

use Illuminate\Support\ViewErrorBag;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class Error extends Component
{
    public function __construct(
        public string $field,
        public string $bag = 'default',
        public string $rtl = 'ltr'
    )
    {}

    public function render(): View
    {
        return view('components.forms.error');
    }

    public function messages(ViewErrorBag $errors): array
    {
        $bag = $errors->getBag($this->bag);
        return $bag->has($this->field) ? $bag->get($this->field) : [];
    }
}
