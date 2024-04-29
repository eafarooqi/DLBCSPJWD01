<?php

namespace App\Livewire\Books\Modal;

use Illuminate\View\View;
use Livewire\Attributes\On;
use Livewire\Component;

class DetailsModal extends Component
{
    public $details=null;

    #[On('loadBookDetails')]
    public function loadDetails($details): void
    {
        $this->details = $details;

        //dd($details);
        $this->dispatch('ShowOLSearchDetailModal');
    }

    public function render(): View
    {
        return view('livewire.books.details-modal')->section('modals');
    }
}
