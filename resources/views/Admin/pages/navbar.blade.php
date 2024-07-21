<nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex align-items-top flex-row">
    <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
        <div class="me-3">
        </div>
        <div>
            <a class="navbar-brand brand-logo" href="{{route('home.admin.dashboard')}}">
                <h3 class="welcome-sub-text">RenouveCart</h3>
            </a>
            <a class="navbar-brand brand-logo-mini" href="{{route('home.admin.dashboard')}}">
                <h3 class="welcome-sub-text">RenouveCart</h3>
            </a>
        </div>
    </div>
    <div class="navbar-menu-wrapper d-flex align-items-top">
        <ul class="navbar-nav">
            <li class="nav-item font-weight-semibold d-none d-lg-block ms-0"></li>
        </ul>
        <ul class="navbar-nav ms-auto">

           
            <li class="nav-item">
                <form class="search-form" action="#">
                    <i class="icon-search"></i>
                    <input type="search" class="form-control" placeholder="Search Here" title="Search here">
                </form>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link count-indicator" id="notificationDropdown" href="#" data-bs-toggle="dropdown">
                    <i class="icon-mail icon-lg"></i>
                </a>
            </li>
            <li class="nav-item dropdown d-none d-lg-block user-dropdown">
                <a class="nav-link" id="UserDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                    <img class="img-xs rounded-circle" src="{{asset('storage/'.Auth::user()->profile)}}" alt="Profile image">
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                    <div class="dropdown-header text-center">
                        <p class="mb-1 mt-3 font-weight-semibold">{{Auth::user()->nom}}</p>
                        <p class="fw-light text-muted mb-0">{{Auth::user()->email}}</p>
                    </div>
                    <a class="dropdown-item" href="{{route('update.account.users')}}">
                        <i class="dropdown-item-icon mdi mdi-account-outline text-primary me-2"></i> Mon profile <span class="badge badge-pill badge-danger">1</span>
                    </a>
                    <a class="dropdown-item" href="{{route('logout.admin')}}">
                        <i class="dropdown-item-icon mdi mdi-power text-primary me-2"></i> Deconnection
                    </a>
                </div>
            </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-bs-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
        </button>
    </div>
</nav>
