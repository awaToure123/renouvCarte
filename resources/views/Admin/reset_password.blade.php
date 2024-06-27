<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  @include('Admin.pages.head')

</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo">

               <center>
               <h4>RenouveCart</h4>
               </center>
              </div>
              <center><h6 class="fw-light">Renitialiser les mots de passes</h6></center>
                            @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
              <form class="pt-3" action="{{route('reset.password.admin.users')}}" method="POST">
                @csrf
                <div class="form-group">
                  <input type="text" name="emailOrTel" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Identifiant">
                </div>
                <div class="form-group">
                  <input type="password" name="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password">
                </div>

                <div class="form-group">
                  <input type="password" name="password_confirm" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password">
                </div>
                <div class="mt-3">

                <div class="form-group">
                  <input type="submit" class="form-control form-control-lg" value="Envoyer" style="color:red;">
                </div>
                <div class="mt-3">
                </div>
                <div class="my-2 d-flex justify-content-between align-items-center">

                  <a href="{{route('login_admin.admin')}}" class="auth-link text-black">Retour page de login</a>
                </div>


              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="../../vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="../../vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="../../js/off-canvas.js"></script>
  <script src="../../js/hoverable-collapse.js"></script>
  <script src="../../js/template.js"></script>
  <script src="../../js/settings.js"></script>
  <script src="../../js/todolist.js"></script>
  <!-- endinject -->
</body>

</html>
