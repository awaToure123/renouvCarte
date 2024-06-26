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
            @foreach($renouveauCarteAll as $demande)
                <tr wire:key='{{$demande->id}}'>
                    <th scope="row"> {{$demande->id}} </th>
                    <td > {{$demande->status}} </td>
                    <td>{{$demande->created_at}} </td>
                    <td > {{$demande->updated_at}} </td>
                    <td><button class="btn btn-info" wire:click="edit({{ $demande->id }})"><i class="bi bi-pencil"></i></button></td>
                </tr>
            @endforeach
        </tbody>
    </table>

    @if($showForms)
        <button type="button" class="btn btn-info" wire:click='closeForm'>Fermer la demande</button>
        <h1 class="modal-title fs-5" id="exampleModalLabel">Renouveller ma carte </h1>

        <form wire:submit.prevent="{{ $showUpdate ? 'update' : 'save' }}">
            @csrf
            <div class="mb-3">
                <label for="acte_naissance" class="form-label">Ancienne-carte</label>
                <input type="file" class="form-control" id="acte_naissance" wire:model="renouveauCarte">
                @error('renouveauCarte') <span style="color:red">{{ $message }}</span> @enderror
            </div>

            <button type="submit" class="btn btn-primary">{{ $showUpdate ? 'Mettre à jour' : 'Valider la demande' }}</button>
        </form>
    @endif
</div>
