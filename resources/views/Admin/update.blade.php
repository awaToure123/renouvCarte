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
                  <h4 class="card-title">Details du compte </h4>
                  <p class="card-description">
                  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
  Mise à jour
</button>

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
                            Email
                          </th>
                          <th>
                           Profile
                          </th>

                        </tr>
                      </thead>
                      <tbody>




                       >


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
         <!-- Button trigger modal -->

<!-- Modal -->

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
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
