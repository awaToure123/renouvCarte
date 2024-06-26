@include('demandeur.styles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<div class="dashboard">
	<aside class="search-wrap">
		<div class="search">
			<label for="search">
				<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M10 18a7.952 7.952 0 0 0 4.897-1.688l4.396 4.396 1.414-1.414-4.396-4.396A7.952 7.952 0 0 0 18 10c0-4.411-3.589-8-8-8s-8 3.589-8 8 3.589 8 8 8zm0-14c3.309 0 6 2.691 6 6s-2.691 6-6 6-6-2.691-6-6 2.691-6 6-6z"/></svg>
				<input type="text" id="search">
			</label>
		</div>

		<div class="user-actions">
			<button>
				<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M13.094 2.085l-1.013-.082a1.082 1.082 0 0 0-.161 0l-1.063.087C6.948 2.652 4 6.053 4 10v3.838l-.948 2.846A1 1 0 0 0 4 18h4.5c0 1.93 1.57 3.5 3.5 3.5s3.5-1.57 3.5-3.5H20a1 1 0 0 0 .889-1.495L20 13.838V10c0-3.94-2.942-7.34-6.906-7.915zM12 19.5c-.841 0-1.5-.659-1.5-1.5h3c0 .841-.659 1.5-1.5 1.5zM5.388 16l.561-1.684A1.03 1.03 0 0 0 6 14v-4c0-2.959 2.211-5.509 5.08-5.923l.921-.074.868.068C15.794 4.497 18 7.046 18 10v4c0 .107.018.214.052.316l.56 1.684H5.388z"/></svg>
			</button>
			<button>
			</button>
		</div>
	</aside>


	<header class="menu-wrap">
		<figure class="user">
			<div class="user-avatar">
			</div>
			<figcaption>
                {{$users[0]->nom}}

			</figcaption>
		</figure>

		<nav>
			<section class="dicover">
				<h3>Dasboard</h3>

				<ul>
					<li>
						<a href="#">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M6.855 14.365l-1.817 6.36a1.001 1.001 0 0 0 1.517 1.106L12 18.202l5.445 3.63a1 1 0 0 0 1.517-1.106l-1.817-6.36 4.48-3.584a1.001 1.001 0 0 0-.461-1.767l-5.497-.916-2.772-5.545c-.34-.678-1.449-.678-1.789 0L8.333 8.098l-5.497.916a1 1 0 0 0-.461 1.767l4.48 3.584zm2.309-4.379c.315-.053.587-.253.73-.539L12 5.236l2.105 4.211c.144.286.415.486.73.539l3.79.632-3.251 2.601a1.003 1.003 0 0 0-.337 1.056l1.253 4.385-3.736-2.491a1 1 0 0 0-1.109-.001l-3.736 2.491 1.253-4.385a1.002 1.002 0 0 0-.337-1.056l-3.251-2.601 3.79-.631z"/></svg>
							{{$users[0]->nom}}
						</a>
					</li>

					<li>
						<a href="#" >
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M20 2H4C2.897 2 2 2.897 2 4v14c0 1.103.897 2 2 2h4l4 4 4-4h4c1.103 0 2-.897 2-2V4c0-1.103-.897-2-2-2zm0 16h-5.586L12 20.414 9.586 18H4V4h16v14z"/></svg>
							Message
						</a>
					</li>

                    <li>
						<a href="{{route('users.dashboard')}}" >
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M20 2H4C2.897 2 2 2.897 2 4v14c0 1.103.897 2 2 2h4l4 4 4-4h4c1.103 0 2-.897 2-2V4c0-1.103-.897-2-2-2zm0 16h-5.586L12 20.414 9.586 18H4V4h16v14z"/></svg>
							Demande de carte
						</a>
					</li>

                    <li>
						<a href="{{route('renouveCarte.listes')}}" >
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M20 2H4C2.897 2 2 2.897 2 4v14c0 1.103.897 2 2 2h4l4 4 4-4h4c1.103 0 2-.897 2-2V4c0-1.103-.897-2-2-2zm0 16h-5.586L12 20.414 9.586 18H4V4h16v14z"/></svg>
							Renouvellement-carte
						</a>
					</li>
                    <li>
						<a href="{{route('perteCarte.users')}}" >
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M20 2H4C2.897 2 2 2.897 2 4v14c0 1.103.897 2 2 2h4l4 4 4-4h4c1.103 0 2-.897 2-2V4c0-1.103-.897-2-2-2zm0 16h-5.586L12 20.414 9.586 18H4V4h16v14z"/></svg>
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


					</li>


					<li>
						<a href="{{route('users.logout')}}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M12 21c4.411 0 8-3.589 8-8 0-3.35-2.072-6.221-5-7.411v2.223A6 6 0 0 1 18 13c0 3.309-2.691 6-6 6s-6-2.691-6-6a5.999 5.999 0 0 1 3-5.188V5.589C6.072 6.779 4 9.65 4 13c0 4.411 3.589 8 8 8z"/><path d="M11 2h2v10h-2z"/></svg>
							Deconnection
						</a>
					</li>
				</ul>
			</section>


		</nav>
	</header>

	<main class="content-wrap">
		<header class="content-head">
			<p>
            <h1>Mise à jour du compte</h1><br>
            </p>

			<div class="action">



			</div>
		</header>

		<div class="content">
        <livewire:update-account />

		</div>
	</main>
</div>

