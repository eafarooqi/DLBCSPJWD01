<?php

namespace App\View\Components\Template;

use Illuminate\View\Component;

class Notification extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        public bool $showErrors = false,
        public array $messages = []
    )
    {
        $this->getMessage();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.template.notification');
    }

    private function getMessage() {

        if(session()->has('success')){
            $this->messages[] = ['type' => 'success', 'message' => session()->get('success')];
        }

        if(session()->has('completed')){
            $this->messages[] = ['type' => 'success', 'message' => session()->get('completed')];
        }

        if(session()->has('error')){
            $this->messages[] = ['type' => 'danger', 'message' => session()->get('error')];
        }

        if(session()->has('failed')){
            $this->messages[] = ['type' => 'danger', 'message' => session()->get('failed')];
        }

        if(session()->has('danger')){
            $this->messages[] = ['type' => 'danger', 'message' => session()->get('danger')];
        }

        if(session()->has('info')){
            $this->messages[] = ['type' => 'info', 'message' => session()->get('info')];
        }

        if(session()->has('warning')){
            $this->messages[] = ['type' => 'warning', 'message' => session()->get('warning')];
        }
    }
}
