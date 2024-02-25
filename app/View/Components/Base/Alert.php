<?php

namespace App\View\Components\Base;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Alert extends Component
{
    /**
     * Create a new component instance.
    */
    public function __construct(
        public string $message,
        public string $title = '',
        public string $type = '',
        public string $icon = 'bell',
        public bool $removable = true
    )
    {
        $this->guessType();
    }

    private function guessType(): void
    {
        if(!$this->type) {
            if (session()->has('success') || session()->has('completed')) {
                $this->type = 'success';
            } elseif (session()->has('error') || session()->has('failed') || session()->has('danger')) {
                $this->type = 'danger';
            } elseif (session()->has('info')) {
                $this->type = 'info';
            } elseif (session()->has('warning')) {
                $this->type = 'warning';
            } else {
                $this->type = 'secondary';
            }
        }
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View
     */
    public function render(): View
    {
        return view('components.base.alert');
    }
}
