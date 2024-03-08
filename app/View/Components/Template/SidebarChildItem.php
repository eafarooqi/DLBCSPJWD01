<?php

namespace App\View\Components\Template;

use Illuminate\Support\Facades\URL;
use Illuminate\View\Component;
use Illuminate\View\View;

class SidebarChildItem extends Component
{
    /**
     * Item Title
     *
     * @var string
     */
    public string $title;

    /**
     * Item Title
     *
     * @var string
     */
    public string $abbr;

    /**
     * Item link
     *
     * @var string
     */
    public string $link;

    /**
     * Item Icon
     *
     * @var string
     */
    public string $icon;

    /**
     * The close button for Alert.
     *
     * @var bool
     */
    public bool $active;

    /**
     * Item Permission
     *
     * @var string
     */
    public mixed $permission;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $title, string $link, string $abbr='', string $icon='', bool $active=false, $permission=null)
    {
        $this->title = $title;
        $this->link = $link;
        $this->abbr = $abbr;
        $this->icon = $icon;
        $this->permission = $permission;
        $this->active = $active;
        $this->isActive();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View
     */
    public function render(): View
    {
        return view('components.template.sidebar-child-item');
    }

    private function isActive(): void
    {
        $this->active = $this->link === URL::current();
    }
}
