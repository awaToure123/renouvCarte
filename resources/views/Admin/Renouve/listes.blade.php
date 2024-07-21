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
                  <h4 class="card-title">Listes des demandes de renouveau</h4>
                  <p class="card-description">
                    <a href="{{route('print.listes.renouve')}}" class="btn btn-info"><i class="bi bi-printer-fill"></i></a>

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
                          {{optional($demande->demandeur)->nom}}
                          </td>
                          <td>

                            {{optional($demande->demandeur)->prenom}}

                          </td>
                          <td>
                          {{optional($demande->demandeur)->tel}}

                          </td>
                          <td>
                          {{$demande->created_at}}

                          </td>
                          <td>
                          <a href="{{route('details.renouve.carte',['id'=>$demande->id])}}" class="btn btn-info"><i class="bi bi-eye"></i></a>

                          </td>
                        </tr>
                       @endif
                        @endforeach
<!-- #region -->
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Listes des demandes de renouvellement de carte valider</h4>
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
                            Prise Rendez-vous
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
                          {{optional($demande->demandeur)->nom}}
                          </td>
                          <td>

                            {{optional($demande->demandeur)->prenom}}

                          </td>
                          <td>
                          {{optional($demande->demandeur)->tel}}

                          </td>
                          <td>
                          {{$demande->created_at}}

                          </td>
                          <td>
                          <a href="{{route('listes.Renouveau.Rendez.Vous',['id'=>$demande->id])}}" class="btn btn-success"><i class="bi bi-calendar-check"></i></a>

                          </td>


                        </tr>
                       @endif
                        @endforeach
<!-- #region -->
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
