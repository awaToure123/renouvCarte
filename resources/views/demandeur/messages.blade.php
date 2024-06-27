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
			<h1>Message</h1>

			<div class="action">
				<!-- Button trigger modal -->


			</div>
		</header>


		<div class="content">
        <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th scope="col">Numéro</th>
                <th scope="col">Messages</th>
                <th scope="col">Date</th>
                <th scope="col">Supprimer</th>
            </tr>
        </thead>
        <tbody>
            @foreach($messages as $demande)
                <tr wire:key='{{$demande->id}}'>
                <th scope="row"> {{$demande->id}} </th>
                    <th > {{$demande->message}} </th>
                    <td > {{$demande->created_at}} </td>
                    <td><a href="{{route('delete.users.Message',['id'=>$demande->id])}}" class="btn btn-info" ><i class="bi bi-pencil"></i></but></td>
                </tr>
            @endforeach
        </tbody>
    </table>

		</div>
	</main>


</div>
