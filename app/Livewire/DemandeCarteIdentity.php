<?php

namespace App\Livewire;

use App\Models\Demande_carte;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;

class DemandeCarteIdentity extends Component
{
    use WithFileUploads, WithPagination;

    public $acte_naissance;
    public $photo;
    public $certificat_residence;
    public $piece_pere;
    public $piece_mere;
    public $user;
    public $query;
    public $message = '';
    public $showUpdate = false;
    public $updateDemande;
    public $showForms = false;

    public function rules(): array
    {
        return [
            'acte_naissance' => 'required|mimes:pdf|max:1024',
            'certificat_residence' => 'required|mimes:pdf|max:1024',
            'piece_pere' => 'nullable|mimes:pdf|max:1024',
            'piece_mere' => 'nullable|mimes:pdf|max:1024',
            'photo' => 'required|mimes:png,jpg,jpeg|max:1024'
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
        $demande = Demande_carte::findOrFail($id);
        $this->updateDemande = $demande;
        $this->acte_naissance = $demande->acte_naissance;
        $this->certificat_residence = $demande->certificat_residence;
        $this->piece_pere = $demande->piece_pere;
        $this->piece_mere = $demande->piece_mere;
        $this->photo = $demande->photo;
        $this->showUpdate = true;
        $this->showForms = true;
    }

    public function save()
    {
        $this->validate();

        $todayCount = Demande_carte::where('demandeur_id', $this->user[0]->id)
            ->whereDate('created_at', date('Y-m-d'))
            ->count();

        if ($todayCount > 0) {
            $this->message = 'Vous avez déjà une demande en cours !';
            return;
        }

        $demande_carte = new Demande_carte();
        $demande_carte->photo = $this->photo->store('demande','public');
        $demande_carte->acte_naissance = $this->acte_naissance->store('demande','public');
        $demande_carte->certificat_residence = $this->certificat_residence->store('demande','public');
        $demande_carte->piece_pere = $this->piece_pere ? $this->piece_pere->store('demande','public') : '';
        $demande_carte->piece_mere = $this->piece_mere ? $this->piece_mere->store('demande','public') : '';
        $demande_carte->status = 'En-cours';
        $demande_carte->demandeur_id = $this->user[0]->id;
        $demande_carte->save();

        toastr()->info('Demande de carte d\'identité envoyée avec succès !');
        $this->reset('photo', 'piece_pere', 'piece_mere', 'acte_naissance', 'certificat_residence', 'showForms');
    }

    public function update()
    {

        $demande_carte = Demande_carte::find($this->updateDemande->id);

        // Mise à jour des fichiers si de nouveaux fichiers sont téléchargés
        if ($this->photo && !is_string($this->photo)) {
            $demande_carte->photo = $this->photo->store('demande','public');
        }
        if ($this->acte_naissance && !is_string($this->acte_naissance)) {
            $demande_carte->acte_naissance = $this->acte_naissance->store('demande','public');
        }
        if ($this->certificat_residence && !is_string($this->certificat_residence)) {
            $demande_carte->certificat_residence = $this->certificat_residence->store('demande','public');
        }
        if ($this->piece_pere && !is_string($this->piece_pere)) {
            $demande_carte->piece_pere = $this->piece_pere->store('demande','public');
        }
        if ($this->piece_mere && !is_string($this->piece_mere)) {
            $demande_carte->piece_mere = $this->piece_mere->store('demande','public');
        }

        // Sauvegarde de la demande mise à jour
        $demande_carte->save();

        $this->message = 'Informations mise à jour avec succèss  !!';

        $this->reset('photo', 'piece_pere', 'piece_mere', 'acte_naissance', 'certificat_residence', 'showForms', 'showUpdate', 'updateDemande');
    }


    public function render()
    {
        return view('livewire.demande-carte-identity', [
            'demandeAll' => Demande_carte::where('demandeur_id', $this->user[0]->id)->get()
        ]);
    }
}
