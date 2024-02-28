<?php

namespace App\View\Components\Template;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;
use Illuminate\Support\Facades\URL;

class SidebarItem extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        public string $title,
        public string $link,
        public string $abbr = '',
        public string $icon = '',
        public string $iconType = 'feather',
        public bool $active = false,
        public ?string $permission = null,
        public string $target = ''
    )
    {
        $this->isActive();
    }

    public function render(): View
    {
        if(Auth::user()->can($this->permission)) {
            return view('components.template.sidebar-item');
        }
    }

    private function isActive(): void
    {
        $this->active = $this->link === URL::current();
    }
}
