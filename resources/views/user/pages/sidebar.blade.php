<nav id="sidebar" class="sidebar js-sidebar">
			<div class="sidebar-content js-simplebar">
				<a class="sidebar-brand" href="{{route('users.dashboard')}}">
          <span class="align-middle">RenouvCarte</span>
        </a>

				<ul class="sidebar-nav">
					<li class="sidebar-header">

					</li>

					<li class="sidebar-item">
						<a class="sidebar-link"  href="{{route('users.dashboard')}}">
              <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Demande de cartes</span>
            </a>
					</li>

					<li class="sidebar-item active">
						<a class="sidebar-link" href="{{route('perteCarte.users')}}">
              <i class="align-middle" data-feather="user"></i> <span class="align-middle">Pertes de cartes</span>
            </a>
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link" href="{{route('renouveCarte.listes')}}">
              <i class="align-middle" data-feather="log-in"></i> <span class="align-middle">Renouveller une cartes n</span>
            </a>
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link" href="{{route('users.completes.informations')}}">
              <i class="align-middle" data-feather="user-plus"></i> <span class="align-middle">Mes informations </span>
            </a>
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link" href="{{route('vue.message')}}">
              <i class="align-middle" data-feather="book"></i> <span class="align-middle">Messages</span>
            </a>
					</li>


				</ul>

				<div class="sidebar-cta">
					<div class="sidebar-cta-content">
						<div class="mb-3 text-sm">
						</div>
						<div class="d-grid">
							<a href="{{route('users.logout')}}" class="btn btn-primary">Deconnection</a>
						</div>
					</div>
				</div>
			</div>
		</nav>
