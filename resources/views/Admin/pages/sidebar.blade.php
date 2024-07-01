<nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
        <li class="nav-item  alert alert-info">
        <a class="nav-link  alert alert-info" href="{{route('home.admin.dashboard')}}">
              <i class="mdi mdi-grid-large menu-icon"></i>
              <i class="bi bi-house"></i>
            </a>
          </li>
          <li class="nav-item  alert alert-info">
            <a class="nav-link" href="{{route('listes.demande')}}">
            <i class="bi bi-filetype-doc"></i>
                          <span class="menu-title">Listes des demandes</span>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link  alert alert-info"  href="{{route('listes.Renouveau')}}">
            <i class="bi bi-file-earmark-person-fill"></i>
              <span class="menu-title">Listes de renouvellement</span>
            </a>
          </li>

          <li class="nav-item  alert alert-info">
            <a class="nav-link" href="{{route('listes.cartes.pertes')}}">
            <i class="bi bi-file-earmark-spreadsheet"></i>
              <span class="menu-title">Listes des pertes</span>
            </a>
          </li>

          


          <li class="nav-item nav-category">Administration</li>
          <li class="nav-item">
            <a class="nav-link"  href="{{route('listesUsers.app')}}">
              <i class="menu-icon mdi mdi-account-circle-outline"></i>
              <span class="menu-title">Listes des utilisateurs</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="auth">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="#"> Login </a></li>
              </ul>
            </div>
          </li>

          </li>
        </ul>
      </nav>
