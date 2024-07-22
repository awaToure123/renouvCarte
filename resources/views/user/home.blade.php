<!DOCTYPE html>
<html lang="en">

@include('user.pages.head')

<body>
    <div class="wrapper">
        @include('user.pages.sidebar')

        <div class="main">
            <nav class="navbar navbar-expand navbar-light navbar-bg">
                <a class="sidebar-toggle js-sidebar-toggle">
                    <i class="hamburger align-self-center"></i>
                </a>
                @include('user.pages.navbar')
            </nav>

            <main class="content">
                <div class="container-fluid p-0">

                    <div class="mb-3">
                        <h1 class="h3 d-inline align-middle">Demande de cartes</h1>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-xl-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="container-fluid p-0">
                                        <div style="padding-bottom: 20px;"></div>
                                        <button data-bs-toggle="modal" data-bs-target="#staticBackdrop" class="alert btn-info">+Faire une demande</button>
                                        <table class="table table-full-width">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Numéro</th>
                                                    <th scope="col">Status</th>
                                                    <th scope="col">Date</th>
                                                    <th scope="col">Details</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($demandeAll as $demande)
                                                <tr wire:key='{{$demande->id}}'>
                                                    <th scope="row"> {{$demande->id}} </th>
                                                    <td > {{$demande->status}} </td>
                                                    <td>{{$demande->created_at}} </td>
                                                    <td><a href="{{route('edit.demande.carte',['id'=>$demande->id])}}" class="btn btn-info"><i class="bi bi-pencil"></i></a></td>
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
                                                        <span class="modal-title fs-5" id="staticBackdropLabel">Demande-de-cartes</span>
                                                        <button type="button" class="btn-close btn-primary" data-bs-dismiss="modal" aria-label="Close">Fermer</button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="{{route('demande.carte.forms')}}" method="POST" enctype="multipart/form-data">
                                                            @csrf
                                                            <div class="mb-3">
                                                                <label for="acte_naissance" class="form-label">Extrait de naissance</label>
                                                                <input type="file" class="form-control" id="acte_naissance" name="acte_naissance">
                                                            </div>

                                                            <div class="mb-3">
                                                                <label for="photo" class="form-label">Photo</label>
                                                                <input type="file" class="form-control" id="photo" name="photo">
                                                            </div>

                                                            <div class="mb-3">
                                                                <label for="certificat_residence" class="form-label">Certificat de résidence</label>
                                                                <input type="file" class="form-control" id="certificat_residence" name="certificat_residence">
                                                            </div>

                                                            @if($users[0]->age < 18)
                                                            <div class="mb-3">
                                                                <label for="piece_pere" class="form-label">Pièce du père</label>
                                                                <input type="file" class="form-control" id="piece_pere" name="piece_pere">
                                                            </div>

                                                            <div class="mb-3">
                                                                <label for="piece_mere" class="form-label">Pièce de la mère</label>
                                                                <input type="file" class="form-control" id="piece_mere" name="piece_mere">
                                                            </div>
                                                            @endif
                                                            <input type="hidden" class="form-control" id="piece_mere" name="id" value="{{$users[0]->id}}">

                                                            <button type="submit" class="btn btn-primary">Valider</button>
                                                        </form>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </main>

            <footer class="footer">
                <!-- Footer content -->
            </footer>
        </div>
    </div>

    <script src="{{('/user/js/app.js')}}"></script>

</body>

</html>
