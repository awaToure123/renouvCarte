@include('demandeur.styles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<div class="dashboard">
	<aside class="search-wrap">
		<div class="search">
			<label for="search">
				<i class="bi bi-search"></i>
				<input type="text" id="search">
			</label>
		</div>

		<div class="user-actions btn btn-info" >
			<button>
				<i class="bi bi-bell"></i>
			</button>
			<button>
				<i class="bi bi-person"></i>
			</button>
		</div>
	</aside>

	<header class="menu-wrap">
		<figure class="user">
			<div class="user-avatar">
				<!-- User Avatar can be placed here -->
			</div>
			<figcaption>
				{{$users[0]->nom}}
			</figcaption>
		</figure>

		<nav>
			<section class="discover">
				<h3>Dashboard</h3>
				<ul>
					<li>
						<a href="#" class="btn btn-info">
							<i class="bi bi-star"></i>
							Bienvenue :{{$users[0]->nom}}
						</a>
					</li>
					<li>
						<a href="{{route('vue.message')}}" class="btn btn-info">
							<i class="bi bi-envelope"></i>
							Message
						</a>
					</li>
					<li>
						<a href="{{route('users.dashboard')}}" class="btn btn-info">
							<i class="bi bi-card-list"></i>
							Demande de carte
						</a>
					</li>
					<li>
						<a href="{{route('renouveCarte.listes')}}" class="btn btn-info">
							<i class="bi bi-arrow-repeat"></i>
							Renouvellement-carte
						</a>
					</li>
					<li>
						<a href="{{route('perteCarte.users')}}" class="btn btn-info">
							<i class="bi bi-exclamation-circle"></i>
							Signaler une perte
						</a>
					</li>
					@if ($errors->any())
						<div class="alert alert-danger">
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif
				</ul>
			</section>

			<section class="tools">
				<ul>
					<li>
						<a href="{{route('users.logout')}}" class="btn btn-danger">
							<i class="bi bi-box-arrow-right"></i>
							Déconnection
						</a>
					</li>
				</ul>
			</section>
		</nav>
	</header>

	<main class="content-wrap">
		<header class="content-head">
			<p>
            <h1>Signalement de la pertes de cartes</h1><br>
            </p>

			<div class="action">
				<!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Signaler une perte</button>


			</div>
		</header>

		<div class="content">
        <table class="table table-striped table-hover">
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

		</div>
	</main>
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Demande-de-cartes</h1>
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
