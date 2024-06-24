<?php

namespace App\Livewire;

use App\Models\Demande_carte;
use Livewire\Component;
use Livewire\Attributes\On;
class UpdateDemandeCarte extends Component
{


    public $demande_id;
    #[On('update_demande')]
    public function mount($idDemande){
      $this->demande_id=$idDemande;

    }
    public function render()
    {
        return view('livewire.update-demande-carte',[
            'demande'=> Demande_carte::where('id', $this->user[0]->id)
        ]);
    }
}
