<?php

namespace App\Livewire;

use Livewire\Component;

class UpdateAccount extends Component
{

    public $user=[];



    public function mount(){
        $this->user=session()->get('users');
    }
    public function render()
    {
        return view('livewire.update-account');
    }
}
