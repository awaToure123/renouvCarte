<?php

namespace App\Livewire;

use App\Models\PertesCartesUser;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;
use Livewire\WithPagination;

class PersteCarteLive extends Component
{

    use WithFileUploads, WithPagination;

    public $extrait_naissance;
    public $certificat_de_perte;
    public $ancienne_carte;

    public $date_perte;
    public $user;
    public $query;
    public $message = '';
    public $showUpdate = false;
    public $updateDemande;
    public $showForms = false;

    public function rules(): array
    {
        return [
            'extrait_naissance' => 'required|mimes:pdf',
            'certificat_de_perte' => 'required|mimes:pdf',
            'ancienne_carte' => 'required|mimes:pdf',
            'date_perte' => 'required',

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
        $demande = PertesCartesUser::findOrFail($id);
        $this->updateDemande = $demande;
        $this->extrait_naissance = $demande->extrait_naissance;
        $this->certificat_de_perte = $demande->certificat_de_perte;
        $this->ancienne_carte = $demande->anncienne_carte;
        $this->date_perte = $demande->date_perte;
        $this->showUpdate = true;
        $this->showForms = true;
    }

    public function save()
    {
        $this->validate();

        $todayCount = PertesCartesUser::where('demandeur_id', $this->user[0]->id)
            ->whereDate('created_at', date('Y-m-d'))
            ->count();

        if ($todayCount > 0) {
            $this->message = 'Vous avez déjà une demande en cours !';
            return;
        }

        $PertesCartesUser = new PertesCartesUser();
        $PertesCartesUser->ancienne_carte = $this->ancienne_carte->store('demande');
        $PertesCartesUser->certificat_de_perte = $this->certificat_de_perte->store('demande');
        $PertesCartesUser->extrait_naissance = $this->extrait_naissance->store('demande');
        $PertesCartesUser->date_perte = $this->date_perte;
        $PertesCartesUser->status = 'En-cours';
        $PertesCartesUser->demandeur_id = $this->user[0]->id;
        $PertesCartesUser->save();

        $this->message='Demande de pertes de cartes est envoyé au services traiteur  !';
        $this->reset( 'date_perte', 'extrait_naissance', 'ancienne_carte',  'showForms', 'showUpdate', 'updateDemande');
    }

    public function update()
    {

        $PertesCartesUser = PertesCartesUser::find($this->updateDemande->id);

        // Mise à jour des fichiers si de nouveaux fichiers sont téléchargés
        if ($this->ancienne_carte && !is_string($this->ancienne_carte)) {
            $PertesCartesUser->ancienne_carte = $this->ancienne_carte->store('demande');
        }
        if ($this->extrait_naissance && !is_string($this->extrait_naissance)) {
            $PertesCartesUser->extrait_naissance = $this->extrait_naissance->store('demande');
        }
        if ($this->certificat_de_perte && !is_string($this->certificat_de_perte)) {
            $PertesCartesUser->certificat_de_perte = $this->certificat_de_perte->store('demande');
        }
        $PertesCartesUser->date_perte=$this->date_perte;

        // Sauvegarde de la demande mise à jour
        $PertesCartesUser->save();

        $this->message = 'Informations mise à jour avec succèss  !!';

        $this->reset( 'date_perte', 'extrait_naissance', 'ancienne_carte',  'showForms', 'showUpdate', 'updateDemande');
    }

    public function render()
    {
        return view('livewire.perste-carte-live',[
            'perteCartesAll'=>PertesCartesUser::where('demandeur_id',$this->user[0]->id)->get()
        ]);
    }
}
