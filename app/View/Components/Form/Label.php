<?php

declare(strict_types=1);

namespace App\View\Components\Form;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Str;
use Illuminate\View\Component;

class Label extends Component
{
    public function __construct(public string $for)
    {
    }

    public function render(): View
    {
        return view('components.forms.label');
    }

    public function fallback(): string
    {
        return Str::ucfirst(str_replace('_', ' ', $this->for));
    }

    public function hasLabel($slot): bool
    {
        return ! $slot->isEmpty()
            || (bool) $this->fallback();
    }
}
