<div>
    <button type="button" class="btn btn-primary" wire:click='showForm'>Signaler une perte</button>
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
            @foreach($perteCartesAll as $demande)
                <tr wire:key='{{$demande->id}}'>
                    <th scope="row"> {{$demande->id}} </th>
                    <td> {{$demande->status}} </td>
                    <td> {{$demande->date_perte}} </td>
                    <td>{{$demande->created_at}} </td>
                    <td><button class="btn btn-info" wire:click="edit({{ $demande->id }})"><i class="bi bi-pencil"></i></button></td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Modal -->
    @if($showForms)
        <button type="button" class="btn btn-info" wire:click='closeForm'>Refermer</button>

        <form wire:submit.prevent="{{ $showUpdate ? 'update' : 'save' }}">
            @csrf
            <div class="mb-3">

                <label for="acte_naissance" class="form-label">Extrait de naissance PDF</label>
                <input type="file" class="form-control" id="acte_naissance" wire:model="extrait_naissance">
                @error('extrait_naissance') <span style="color:red">{{ $message }}</span> @enderror
            </div>

            <div class="mb-3">
                <label for="photo" class="form-label">Ancienn-carte PDF</label>
                <input type="file" class="form-control" id="photo" wire:model.live="ancienne_carte">
                @error('ancienne_carte') <span style="color:red">{{ $message }}</span> @enderror
            </div>

            <div class="mb-3">
                <label for="certificat_residence" class="form-label">Certificat de résidence PDF</label>
                <input type="file" class="form-control" id="certificat_residence" wire:model="certificat_de_perte">
                @error('certificat_de_perte') <span style="color:red">{{ $message }}</span> @enderror
            </div>

            
                <div class="mb-3">
                    <label for="piece_pere" class="form-label">Date-de-perte PDF</label>
                    <input type="date" class="form-control" id="piece_pere" wire:model="date_perte">
                    @error('date_perte') <span style="color:red">{{ $message }}</span> @enderror
                </div>



            <button type="submit" class="btn btn-primary">{{ $showUpdate ? 'Mettre à jour' : 'Valider la demande' }}</button>
        </form>
    @endif
</div>
