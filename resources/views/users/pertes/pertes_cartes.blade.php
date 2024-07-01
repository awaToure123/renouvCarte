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
          <a class="nav-link js-scroll-trigger" href="{{route('home_page.user')}}">Demande cartes</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="{{route('perteCarte.users')}}">Pertes de carte</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="{{route('renouveCarte.listes')}}">Renouvellement de carte</a>
          </li>
          <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="{{route('users.completes.informations')}}">Mes informations</a>
          </li>
          <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="{{route('users.logout')}}">Deconnection</a>
          </li>

        </ul>
      </div>
    </nav>

    <div class="container-fluid p-0">

    <div style="padding-bottom: 100px;"></div>
     <button data-bs-toggle="modal" data-bs-target="#staticBackdrop">+Faire une demande</button>
    <table class="table">
  <thead>
  <tr>
                <th scope="col">Numéro</th>
                <th scope="col">Status</th>
                <th scope="col">Date</th>
                <th scope="col">Mise-à-jour</th>
                <th scope="col">Details</th>
            </tr>
  </thead>
  <tbody>
  @foreach($demandeAll as $demande)

                <tr wire:key='{{$demande->id}}'>
                    <th scope="row"> {{$demande->id}} </th>
                    <td colspan="2"> {{$demande->status}} </td>
                    <td>{{$demande->created_at}} </td>
                    <td><a href="{{route('users.edit_pertes',['id'=>$demande->id])}}" class="btn btn-info" ><i class="bi bi-pencil"></i></a></td>
                </tr>
            @endforeach
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
        <h5 class="modal-title fs-5" id="staticBackdropLabel">Demande-de-cartes</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form  enctype="multipart/form-data"  method="POST" action="{{route('perteCarte.users.add')}}">
            @csrf
            <div class="mb-3">

                <label for="acte_naissance" class="form-label">Extrait de naissance PDF</label>
                <input type="file" class="form-control" id="acte_naissance" name="extrait_naissance">
            </div>

            <div class="mb-3">
                <label for="photo" class="form-label">Ancienn-carte PDF</label>
                <input type="file" class="form-control" id="photo" name="ancienne_carte">
            </div>

            <div class="mb-3">
                <label for="certificat_residence" class="form-label">Certificat de résidence PDF</label>
                <input type="file" class="form-control" id="certificat_residence" name="certificat_de_perte">
            </div>


                <div class="mb-3">
                    <label for="piece_pere" class="form-label">Date-de-perte PDF</label>
                    <input type="date" class="form-control" id="piece_pere" name="date_perte">
                </div>

                <input type="hidden" class="form-control" id="piece_pere" name="id" value="{{$users[0]->id}}">


            <button type="submit" class="btn btn-primary">Valider</button>
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
