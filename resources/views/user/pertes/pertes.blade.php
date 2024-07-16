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

					<div class="mb-3">
						<h1 class="h3 d-inline align-middle">Profile</h1>
						<a class="badge bg-dark text-white ms-2" href="upgrade-to-pro.html">
     Demandes de cartes
  </a>
					</div>
					<div class="row">

						</div>

						<div class="col-md-8 col-xl-9">
							<div class="card">
								<div class="card-header">
                                <div class="container-fluid p-0">

                <div style="padding-bottom: 100px;"></div>
                <button data-bs-toggle="modal" data-bs-target="#staticBackdrop" class="alert btn-info">+Faire une demande</button>
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
                <td><a href="{{route('users.edit_pertes',['id'=>$demande->id])}}" class="btn btn-info" ><i class="bi bi-pencil"></i></a></td>
            </tr>
        @endforeach
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
    <h5 class="modal-title fs-5" id="staticBackdropLabel">Demande-de-cartes</h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
  </div>
  <div class="modal-body">
  <form  enctype="multipart/form-data"  method="POST" action="{{route('perteCarte.users.add')}}">
        @csrf
        <div class="mb-3">

            <label for="acte_naissance" class="form-label">Extrait de naissance PDF</label>
            <input type="file" class="form-control" id="acte_naissance" name="extrait_naissance">
        </div>

        <div class="mb-3">
            <label for="photo" class="form-label">Ancienn-carte PDF</label>
            <input type="file" class="form-control" id="photo" name="ancienne_carte">
        </div>

        <div class="mb-3">
            <label for="certificat_residence" class="form-label">Certificat de résidence PDF</label>
            <input type="file" class="form-control" id="certificat_residence" name="certificat_de_perte">
        </div>


            <div class="mb-3">
                <label for="piece_pere" class="form-label">Date-de-perte PDF</label>
                <input type="date" class="form-control" id="piece_pere" name="date_perte">
            </div>

            <input type="hidden" class="form-control" id="piece_pere" name="id" value="{{$users[0]->id}}">


        <button type="submit" class="btn btn-primary">Valider</button>
    </form>
  </div>

</div>
</div>
</div>

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
