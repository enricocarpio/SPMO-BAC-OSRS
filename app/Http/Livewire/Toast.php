<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Toast extends Component
{
    public $message;
    
    public function render()
    {
        return view('livewire.toast');
    }
}
