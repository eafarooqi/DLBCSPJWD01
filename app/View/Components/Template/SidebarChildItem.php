<?php

namespace App\View\Components\Template;

use Illuminate\Support\Facades\URL;
use Illuminate\View\Component;

class SidebarChildItem extends Component
{
    /**
     * Item Title
     *
     * @var string
     */
    public $title;

    /**
     * Item Title
     *
     * @var string
     */
    public $abbr;

    /**
     * Item link
     *
     * @var string
     */
    public $link;

    /**
     * Item Icon
     *
     * @var string
     */
    public $icon;

    /**
     * The close button for Alert.
     *
     * @var bool
     */
    public $active;

    /**
     * Item Permission
     *
     * @var string
     */
    public $permission;

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
        $this->isActive($active);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        if($this->permission === null || Auth::user()->can($this->permission)) {
            return view('components.template.sidebar-child-item');
        }
    }

    private function isActive(){
        $this->active = $this->link === URL::current();
    }
}
