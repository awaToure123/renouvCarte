<div>
    <button type="button" class="btn btn-primary" wire:click='showForm'>Faire une demande</button>
    <h1 class="modal-title fs-5" id="exampleModalLabel"> {{$message}} </h1>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">Numéro</th>
                <th scope="col">Status</th>
                <th scope="col">Date</th>
                <th scope="col">Mise-à-jour</th>
                <th scope="col">Details</th>
            </tr>
        </thead>
        <tbody>
            @foreach($demandeAll as $demande)
                <tr wire:key='{{$demande->id}}'>
                    <th scope="row"> {{$demande->id}} </th>
                    <td colspan="2"> {{$demande->status}} </td>
                    <td>{{$demande->created_at}} </td>
                    <td><button class="btn btn-info" wire:click="edit({{ $demande->id }})"><i class="bi bi-pencil"></i></button></td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Modal -->
    @if($showForms)
        <button type="button" class="btn btn-info" wire:click='closeForm'>Fermer la demande</button>
        <h1 class="modal-title fs-5" id="exampleModalLabel">Demande de carte d'identité</h1>

        <form wire:submit.prevent="{{ $showUpdate ? 'update' : 'save' }}">
            @csrf
            <div class="mb-3">

                <label for="acte_naissance" class="form-label">Extrait de naissance</label>
                <input type="file" class="form-control" id="acte_naissance" wire:model="acte_naissance">
                @error('acte_naissance') <span style="color:red">{{ $message }}</span> @enderror
            </div>

            <div class="mb-3">
                <label for="photo" class="form-label">Photo</label>
                <input type="file" class="form-control" id="photo" wire:model.live="photo">
                @error('photo') <span style="color:red">{{ $message }}</span> @enderror
            </div>

            <div class="mb-3">
                <label for="certificat_residence" class="form-label">Certificat de résidence</label>
                <input type="file" class="form-control" id="certificat_residence" wire:model="certificat_residence">
                @error('certificat_residence') <span style="color:red">{{ $message }}</span> @enderror
            </div>

            @if($user[0]->age < 18)
                <div class="mb-3">
                    <label for="piece_pere" class="form-label">Pièce du père</label>
                    <input type="file" class="form-control" id="piece_pere" wire:model="piece_pere">
                    @error('piece_pere') <span style="color:red">{{ $message }}</span> @enderror
                </div>

                <div class="mb-3">
                    <label for="piece_mere" class="form-label">Pièce de la mère</label>
                    <input type="file" class="form-control" id="piece_mere" wire:model="piece_mere">
                    @error('piece_mere') <span style="color:red">{{ $message }}</span> @enderror
                </div>
            @endif
            <button type="submit" class="btn btn-primary">{{ $showUpdate ? 'Mettre à jour' : 'Valider la demande' }}</button>
        </form>
    @endif
</div>
