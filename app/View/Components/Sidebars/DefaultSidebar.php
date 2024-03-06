<?php

namespace App\View\Components\Sidebars;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class DefaultSidebar extends Component
{
    /**
     * Active Item
     *
     * @var string
    */
    public string $active;

    /**
     * Parent Items Except default
     *
     * @var array
     */
    private array $parentItems = ['manage', 'collection'];

    /**
     * Create a new component instance.
     *
     * @return void
    */
    public function __construct($active='')
    {
        $this->getActiveItem($active);
    }

    private function getActiveItem($activeItem): void
    {
        $this->active = (!$activeItem || !in_array($activeItem, $this->parentItems)) ? 'default' : $activeItem;
    }

    public function render(): View
    {
        return view('components.sidebars.default-sidebar');
    }
}
