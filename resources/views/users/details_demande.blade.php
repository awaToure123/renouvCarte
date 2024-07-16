
<!DOCTYPE html>
<html lang="en">

@include('user.pages.head')
<body>
	<div class="wrapper">
		@include('user.pages.sidebar')

		<div class="main">
			<nav class="navbar navbar-expand navbar-light navbar-bg">
				<a class="sidebar-toggle js-sidebar-toggle">
          <i class="hamburger align-self-center"></i>
        </a>

		@include('user.pages.navbar')

			</nav>

			<main class="content">
            <div class="container-fluid p-0">

<div style="padding-bottom: 100px;"></div>
 <button data-bs-toggle="modal" data-bs-target="#staticBackdrop" class="alert btn-info">+Mise à jour de la demande</button>
<table class="table">
<thead>
                     <tr>
            <th scope="col">Extrait de Naissance    </th>
            <th scope="col">Photo</th>
            <th scope="col">Certificat-Naissance</th>
            <th scope="col">Piece-pere</th>
            <th scope="col">Piece Mere </th>

        </tr>
</thead>
<tbody>

            <tr wire:key='{{$demande->id}}'>
                <th scope="row"> <a href="{{Storage::url($demande->acte_naissance)}}" target="_blank">Voir</a> </th>
                <th > <a href="{{Storage::url($demande->photo)}}" target="_blank">Voir</a> </th>
                <th > <a href="{{Storage::url($demande->certificat_residence)}}" target="_blank">Voir</a> </th>
                <th > <a href="{{Storage::url($demande->piece_pere)}}" target="_blank">Voir</a> </th>
                <th > <a href="{{Storage::url($demande->piece_mere)}}" target="_blank">Voir</a> </th>

            </tr>
</tbody>
</table>



@if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
  <div class="modal-header">
    <span class="modal-title fs-5" id="staticBackdropLabel">Mise-à-jour Demande-de-cartes</>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
  </div>
  <div class="modal-body">
  <form  action="{{route('update.Demande.carte')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">

            <label for="acte_naissance" class="form-label">Extrait de naissance</label>
            <input type="file" class="form-control" id="acte_naissance" name="acte_naissance">

        </div>

        <div class="mb-3">
            <label for="photo" class="form-label">Photo</label>
            <input type="file" class="form-control" id="photo" name="photo">

        </div>

        <div class="mb-3">
            <label for="certificat_residence" class="form-label">Certificat de résidence</label>
            <input type="file" class="form-control" id="certificat_residence" name="certificat_residence">

        </div>

        @if($users[0]->age < 18)
            <div class="mb-3">
                <label for="piece_pere" class="form-label">Pièce du père</label>
                <input type="file" class="form-control" id="piece_pere"  name="piece_pere">

            </div>

            <div class="mb-3">
                <label for="piece_mere" class="form-label">Pièce de la mère</label>
                <input type="file" class="form-control" id="piece_mere" name="piece_mere">

            </div>
        @endif
        <input type="hidden" class="form-control" id="piece_mere" name="id" value="{{$demande->id}}">

        <button type="submit" class="btn btn-primary">Valider</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
    </form>
  </div>

</div>
</div>
</div>

</div>
			</main>

			<footer class="footer">

			</footer>
		</div>
	</div>

	<script src="{{('/user/js/app.js')}}"></script>

</body>

</html>
