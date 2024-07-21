<style>
    .sidebar .nav-item {
    margin-bottom: 10px; /* Add some space between nav items */
}

.sidebar .nav-link {
    display: flex;
    align-items: center;
    padding: 10px 15px;
}

.sidebar .nav-link .menu-title {
    margin-left: 10px; /* Space between icon and text */
}

.sidebar .nav-link i {
    font-size: 20px; /* Adjust icon size if needed */
}

</style>
<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
       <center>
        <div class="me-3">
            <img src="{{asset('/img/logoApp.png')}}" alt="" class="ms-2" style="max-width: 50px;">

        </div>
       </center>
        <li class="nav-item">
            <a class="nav-link alert btn-info" href="{{route('home.admin.dashboard')}}">
                <i class="bi bi-house"></i>
                <span class="menu-title">Acceuil</span>

            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link alert btn-info" href="{{route('listes.demande')}}">
                <i class="bi bi-filetype-doc"></i>
                <span class="menu-title">Listes des demandes</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link alert btn-info" href="{{route('listes.Renouveau')}}">
                <i class="bi bi-file-earmark-person-fill"></i>
                <span class="menu-title">Listes de renouvellement</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link alert btn-info" href="{{route('listes.cartes.pertes')}}">
                <i class="bi bi-file-earmark-spreadsheet"></i>
                <span class="menu-title">Listes des pertes</span>
            </a>
        </li>
        <li class="nav-item nav-category">Administration</li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('listesUsers.app')}}">
                <i class="menu-icon mdi mdi-account-circle-outline"></i>
                <span class="menu-title">Listes des utilisateurs</span>
                <i class="menu-arrow"></i>
            </a>
        </li>
    </ul>
</nav>
