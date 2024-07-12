<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Demande de carte</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- Bootstrap core CSS -->
    <link href="{{asset('/user/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="https://fonts.googleapis.com/css?family=Saira+Extra+Condensed:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
    <link href="{{asset('/user/vendor/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('/user/vendor/devicons/css/devicons.min.css')}}" rel="stylesheet">
    <link href="{{asset('/user/vendor/simple-line-icons/css/simple-line-icons.css')}}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{asset('/user/css/resume.min.css')}}" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
  </head>

  <body id="page-top">

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top" id="sideNav">
      <a class="navbar-brand js-scroll-trigger" href="#page-top">
        <span class="d-none d-lg-block">
        </span>
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav">
        <li class="nav-item">
        <a class="nav-link js-scroll-trigger" href="{{route('vue.message')}}">Messages</a>
        </li>
          <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="{{route('home_page.user')}}">Demande cartes</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger"  href="{{route('perteCarte.users')}}">Pertes de carte</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="{{route('renouveCarte.listes')}}">Renouvellement de carte</a>
          </li>
          <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="{{route('users.completes.informations')}}">Mes informations</a>
 <!-- #region -->          </li>
          <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="{{route('users.logout')}}">Deconnection</a>
          </li>

        </ul>
      </div>
    </nav>

    <div class="container-fluid p-0">

    <div style="padding-bottom: 100px;"></div>
     <button data-bs-toggle="modal" data-bs-target="#staticBackdrop" class="alert btn-success">+Modifier mes informations</button>
    <table class="table">
  <thead>
                         <tr>
                <th scope="col">Nom</th>
                <th scope="col">Prenom</th>
                <th scope="col">Email</th>
                <th scope="col">Téléphone</th>
                <th scope="col">Age</th>
            </tr>
  </thead>
  <tbody>
                <tr wire:key='{{$users[0]->nom}}'>
                    <th scope="row"> {{$users[0]->nom}} </th>
                    <th scope="row"> {{$users[0]->prenom}} </th>
                    <th scope="row"> {{$users[0]->email}} </th>
                    <th scope="row"> {{$users[0]->tel}} </th>

                    <th scope="row"> {{$users[0]->age}} </th>
                </tr>
  </tbody>
</table>



@if ($errors->any())
						<div class="alert alert-danger">
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <span class="modal-title fs-5" id="staticBackdropLabel">Demande-de-cartes</>
        <button type="button" class="btn-close btn-info" data-bs-dismiss="modal" aria-label="Close">Fermer</button>
      </div>
      <div class="modal-body">
      <form action="{{route('user.update.informations')}}" method="POST">
        @csrf
    <div class="row g-3">
        <div class="col-md-6">
            <div class="form-floating">
                <label for="name">Nom</label>
                <input type="text" class="form-control " name="nom" id="name" value="{{$users[0]->nom}}" placeholder="Entrer votre nom" required >
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-floating">
                <label for="email">Prenom</label>
                <input type="text" class="form-control " id="email"  value="{{$users[0]->prenom}}" name="prenom" placeholder="Entrer votre prenom" required>

            </div>
        </div>
        <div class="col-md-6">
            <div class="form-floating date" id="date3" data-target-input="nearest">
                <label for="datetime">Email</label>
                <input type="email" class="form-control " id="datetime"  value="{{$users[0]->email}}" name="email" placeholder="Votre Email"  />
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-floating date" id="date3" data-target-input="nearest">
                <label for="datetime">Téléphone</label>
                <input type="text" class="form-control "  value="{{$users[0]->tel}}" id="datetime" name="tel" placeholder="Votre téléohone" required  />

            </div>
        </div>

        <div class="col-md-6">
            <div class="form-floating date" id="date3" data-target-input="nearest">
                <label for="datetime">Age</label>
                <input type="number" class="form-control "  value="{{$users[0]->age}}" id="datetime" name="age" placeholder="Votre age" required   />

            </div>
        </div>
        <div class="col-md-6">
            <div class="form-floating date" id="date3" data-target-input="nearest">
                <label for="datetime">Profesession</label>
                <input type="text" class="form-control "  value="{{$users[0]->professession}}" id="datetime" name="professession" placeholder="Profession" required   />

            </div>
        </div>
        <div class="col-md-6">
            <div class="form-floating date" id="date3" data-target-input="nearest">
                <label for="datetime">Situation Matrimonial</label>
                <select name="situation_matrimonial" id="">
                    <option value="{{$users[0]->situation_matrimonial}}">{{$users[0]->situation_matrimonial}}</option>
                    <option value="Celibataire">Celibataire</option>
                    <option value="Mariee">Mariee</option>
                </select>

            </div>
        </div>
        <div class="col-md-6">
            <div class="form-floating date" id="date3" data-target-input="nearest">
                <label for="datetime">Adrese</label>
                <input type="text" class="form-control "  value="{{$users[0]->adresse}}" id="datetime" name="adresse" placeholder="Votre adresse" required   />

            </div>
        </div>

        <div class="col-md-6">
        <label for="datetime">Region</label>

            <div class="form-floating date" id="date3" data-target-input="nearest">
                <input type="text" class="form-control "  value="{{$users[0]->adresse}}" id="datetime" name="region" placeholder="Votre Region" required  />
            </div>
        </div></br>

        <input type="hidden" class="form-control "  value="{{$users[0]->id}}" id="datetime" name="id"   />


        <p>
        <div class="col-12">

<button class="btn btn-primary text-white w-100 py-3" type="submit">Soumettre</button>


</div>
        </p>

    </div>
</form>
      </div>

    </div>
  </div>
</div>

    </div>

    <!-- Bootstrap core JavaScript -->
    <script src="{{asset('/user/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('/user/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Plugin JavaScript -->
    <script src="{{asset('/user/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

    <!-- Custom scripts for this template -->
    <script src="{{asset('/user/js/resume.min.js')}}"></script>

  </body>

</html>
