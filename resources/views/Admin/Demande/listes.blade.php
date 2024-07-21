<!DOCTYPE html>
<html lang="en">
 @include('Admin.pages.head')
<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    @include('Admin.pages.navbar')

    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:../../partials/_settings-panel.html -->

      <div id="right-sidebar" class="settings-panel">
        <i class="settings-close ti-close"></i>
        <ul class="nav nav-tabs border-top" id="setting-panel" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="todo-tab" data-bs-toggle="tab" href="#todo-section" role="tab" aria-controls="todo-section" aria-expanded="true">TO DO LIST</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="chats-tab" data-bs-toggle="tab" href="#chats-section" role="tab" aria-controls="chats-section">CHATS</a>
          </li>
        </ul>

      </div>
      <!-- partial -->
      <!-- partial:../../partials/_sidebar.html -->
      @include('Admin.pages.sidebar')
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">



            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Listes des demandes</h4>
                  <p class="card-description">
                  <a href="{{route('print.listes.demande')}}" class="btn btn-info"><i class="bi bi-printer-fill"></i></a>

                  </p>
                  <div class="table-responsive pt-3">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>
                           Numéro
                          </th>
                          <th>
                           Nom
                          </th>
                          <th>
                           Prenom
                          </th>
                          <th>
                            Tel
                          </th>
                          <th>
                            Date
                          </th>
                          <th>
                            Details
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                         @foreach($demandeAll as $demande)
                         @if($demande->status =='En-cours')
                        <tr>
                          <td>
                           {{$demande->id}}
                          </td>
                          <td>
                          {{$demande->demandeur->nom}}
                          </td>
                          <td>

                            {{$demande->demandeur->prenom}}

                          </td>
                          <td>
                          {{$demande->demandeur->tel}}

                          </td>
                          <td>
                          {{$demande->created_at}}

                          </td>
                          <td>
                          <a href="{{route('details.demande',['id'=>$demande->id])}}" class="btn btn-info"><i class="bi bi-eye"></i></a>

                          </td>
                        </tr>
                        @endif
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>


            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Listes des demandes valider</h4>
                  <p class="card-description">
                  </p>
                  <div class="table-responsive pt-3">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>
                           Numéro
                          </th>
                          <th>
                           Nom
                          </th>
                          <th>
                           Prenom
                          </th>
                          <th>
                            Tel
                          </th>
                          <th>
                            Date
                          </th>
                          <th>
                            Rendez-vous
                          </th>

                        </tr>
                      </thead>
                      <tbody>
                         @foreach($demandeAll as $demande)
                         @if($demande->status !='En-cours')
                        <tr>
                          <td>
                           {{$demande->id}}
                          </td>
                          <td>
                          {{$demande->demandeur->nom}}
                          </td>
                          <td>

                            {{$demande->demandeur->prenom}}

                          </td>
                          <td>
                          {{$demande->demandeur->tel}}

                          </td>
                          <td>
                          {{$demande->created_at}}

                          </td>
                          <td>
                          <a href="{{route('liste.DemandeRendez.Vous',['id'=>$demande->id])}}" class="btn btn-success"><i class="bi bi-calendar-check"></i></a>

                          </td>

                        </tr>
                        @endif
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
        @include('Admin.pages.footer')
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  @include('Admin.pages.js')

</body>

</html>
