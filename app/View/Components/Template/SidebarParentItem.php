<?php

namespace App\View\Components\Template;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SidebarParentItem extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
    */
    public function __construct(
        public string $title,
        public bool $active = false,
        public string $icon = '',
        public string $iconType = 'feather',
        public string $id = ''
    )
    {
        $this->id = $this->generateId();
    }

    public function render(): View
    {
        return view('components.template.sidebar-parent-item');
    }

    private function generateId(): string
    {
        return bin2hex(random_bytes(5));
    }
}
