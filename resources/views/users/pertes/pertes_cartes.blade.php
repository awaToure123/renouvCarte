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
						<h1 class="h3 d-inline align-middle"> Pertes de cartes</h1>
					</div>

					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<h5 class="card-title">Liste des demandes</h5>
								</div>
								<div class="card-body">
									<div class="mb-3">
										<button data-bs-toggle="modal" data-bs-target="#staticBackdrop" class="alert btn-info">+Faire une demande</button>
									</div>
									<div class="table-responsive">
										<table class="table table-bordered table-hover w-100">
											<thead>
												<tr>
													<th scope="col">Numéro</th>
													<th scope="col">Status</th>
													<th scope="col">Date</th>
													<th scope="col">Details</th>
												</tr>
											</thead>
											<tbody>
												@foreach($demandeAll as $demande)
													<tr wire:key='{{$demande->id}}'>
														<th scope="row">{{$demande->id}}</th>
														<td>{{$demande->status}}</td>
														<td>{{$demande->created_at}}</td>
														<td>
															<a href="{{route('users.edit_pertes', ['id' => $demande->id])}}" class="btn btn-info">
																<i class="bi bi-pencil"></i>
															</a>
														</td>

													</tr>
												@endforeach
											</tbody>
										</table>
									</div>

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
													<h5 class="modal-title fs-5" id="staticBackdropLabel">Pertes de cartes</h5>
													<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
												</div>
												<div class="modal-body">
													<form enctype="multipart/form-data" method="POST" action="{{route('perteCarte.users.add')}}">
														@csrf
														<div class="mb-3">
															<label for="extrait_naissance" class="form-label">Extrait de naissance PDF</label>
															<input type="file" class="form-control" id="extrait_naissance" name="extrait_naissance">
														</div>
														<div class="mb-3">
															<label for="ancienne_carte" class="form-label">Ancienne carte PDF</label>
															<input type="file" class="form-control" id="ancienne_carte" name="ancienne_carte">
														</div>
														<div class="mb-3">
															<label for="certificat_de_perte" class="form-label">Certificat de résidence PDF</label>
															<input type="file" class="form-control" id="certificat_de_perte" name="certificat_de_perte">
														</div>
														<div class="mb-3">
															<label for="date_perte" class="form-label">Date de perte</label>
															<input type="date" class="form-control" id="date_perte" name="date_perte">
														</div>
														<input type="hidden" class="form-control" name="id" value="{{$users[0]->id}}">
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
				<!-- Footer content -->
			</footer>
		</div>
	</div>

	<script src="{{('/user/js/app.js')}}"></script>

</body>
</html>
