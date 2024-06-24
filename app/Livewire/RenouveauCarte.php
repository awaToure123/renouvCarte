<?php

namespace App\Livewire;

use App\Models\Renouvellement_carte;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;

class RenouveauCarte extends Component
{
    use WithFileUploads, WithPagination;


    public $user;
    public $query;
    public $message = '';
    public $showUpdate = false;
    public $updateDemande;
    public $showForms = false;

    public $renouveauCarte;

    public function rules(): array
    {
        return [
            'renouveauCarte' => 'required|mimes:pdf|max:1024',

        ];
    }

    public function mount()
    {
        $this->user = session()->get('users');
    }

    public function showForm()
    {
        $this->showForms = true;
    }

    public function closeForm()
    {
        $this->showForms = false;
    }

    public function edit($id)
    {
        $demande = Renouvellement_carte::findOrFail($id);
        $this->updateDemande = $demande;
        $this->renouveauCarte = $demande->acte_naissance;

        $this->showUpdate = true;
        $this->showForms = true;
    }

    public function save()
    {
        $this->validate();

        $todayCount = Renouvellement_carte::where('demandeur_id', $this->user[0]->id)
            ->whereDate('created_at', date('Y-m-d'))
            ->count();

        if ($todayCount > 0) {
            $this->message = 'Vous avez déjà une demande en cours de renouvellement de carte ❌ !';
            return;
        }

        $Renouvellement_carte = new Renouvellement_carte();
        $Renouvellement_carte->ancienne_carte = $this->renouveauCarte->store('renouveau');

        $Renouvellement_carte->status = 'En-cours';
        $Renouvellement_carte->demandeur_id = $this->user[0]->id;
        $Renouvellement_carte->save();

        $this->message = 'Informations envoyé avec succéss  !!';

        $this->reset( 'renouveauCarte','showForms', 'showUpdate');
    }

    public function update()
    {

        $Renouvellement_carte = Renouvellement_carte::find($this->updateDemande->id);

        // Mise à jour des fichiers si de nouveaux fichiers sont téléchargés
        if ($this->renouveauCarte && !is_string($this->renouveauCarte   )) {
            $Renouvellement_carte->ancienne_carte= $this->renouveauCarte->store('renouveau');
        }

        // Sauvegarde de la demande mise à jour
        $Renouvellement_carte->save();

        $this->message = 'Informations mise à jour avec succèss !';

        $this->reset('renouveauCarte', 'showForms', 'showUpdate');
    }


    public function render()
    {

        return view('livewire.renouveau-carte',[
            'renouveauCarteAll'=>Renouvellement_carte::where('demandeur_id', $this->user[0]->id)->get()
        ]);
    }
}
