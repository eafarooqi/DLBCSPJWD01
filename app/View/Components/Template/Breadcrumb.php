<?php

namespace App\View\Components\Template;

use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class Breadcrumb extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        public string $activePage,
        public array $links = []
    )
    {}

    public function render(): View
    {
        return view('components.template.breadcrumb');
    }
}
