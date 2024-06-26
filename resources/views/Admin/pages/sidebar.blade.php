<nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="{{route('home.admin.dashboard')}}">
              <i class="mdi mdi-grid-large menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('listes.demande')}}">
              <i class="mdi mdi-grid-large menu-icon"></i>
              <span class="menu-title">Listes des demandes</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('listes.Renouveau')}}">
              <i class="mdi mdi-grid-large menu-icon"></i>
              <span class="menu-title">Listes de renouvellement</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="{{route('listes.cartes.pertes')}}">
              <i class="mdi mdi-grid-large menu-icon"></i>
              <span class="menu-title">Listes des pertes</span>
            </a>
          </li>


          <li class="nav-item nav-category">Administration</li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
              <i class="menu-icon mdi mdi-account-circle-outline"></i>
              <span class="menu-title">Listes des utilisateurs</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="auth">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="pages/samples/login.html"> Login </a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item nav-category">help</li>
          <li class="nav-item">

          </li>
        </ul>
      </nav>
