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
                    <div style="padding-bottom: 100px;"></div>
                    <button data-bs-toggle="modal" data-bs-target="#staticBackdrop" class="btn btn-info">+ Modifier mes informations</button>
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
                            <tr>
                                <td>{{ $users[0]->nom }}</td>
                                <td>{{ $users[0]->prenom }}</td>
                                <td>{{ $users[0]->email }}</td>
                                <td>{{ $users[0]->tel }}</td>
                                <td>{{ $users[0]->age }}</td>
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
                                    <h5 class="modal-title" id="staticBackdropLabel">Modifier mes informations</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('user.update.informations') }}" method="POST">
                                        @csrf
                                        <div class="row g-3">
                                            <div class="col-md-6">
                                                <div class="form-floating">
                                                    <input type="text" class="form-control" name="nom" id="nom" value="{{ $users[0]->nom }}" placeholder="Entrer votre nom" required>
                                                    <label for="nom">Nom</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating">
                                                    <input type="text" class="form-control" id="prenom" value="{{ $users[0]->prenom }}" name="prenom" placeholder="Entrer votre prénom" required>
                                                    <label for="prenom">Prénom</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating">
                                                    <input type="email" class="form-control" id="email" value="{{ $users[0]->email }}" name="email" placeholder="Votre email" required>
                                                    <label for="email">Email</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating">
                                                    <input type="text" class="form-control" id="tel" value="{{ $users[0]->tel }}" name="tel" placeholder="Votre téléphone" required>
                                                    <label for="tel">Téléphone</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating">
                                                    <input type="number" class="form-control" id="age" value="{{ $users[0]->age }}" name="age" placeholder="Votre âge" required>
                                                    <label for="age">Age</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating">
                                                    <input type="text" class="form-control" id="professession" value="{{ $users[0]->professession }}" name="professession" placeholder="Profession" required>
                                                    <label for="professession">Profession</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating">
                                                    <select class="form-select" name="situation_matrimonial" id="situation_matrimonial" required>
                                                        <option value="{{ $users[0]->situation_matrimonial }}">{{ $users[0]->situation_matrimonial }}</option>
                                                        <option value="Celibataire">Célibataire</option>
                                                        <option value="Mariee">Mariée</option>
                                                    </select>
                                                    <label for="situation_matrimonial">Situation Matrimoniale</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating">
                                                    <input type="text" class="form-control" id="adresse" value="{{ $users[0]->adresse }}" name="adresse" placeholder="Votre adresse" required>
                                                    <label for="adresse">Adresse</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating">
                                                    <input type="text" class="form-control" id="region" value="{{ $users[0]->region }}" name="region" placeholder="Votre région" required>
                                                    <label for="region">Région</label>
                                                </div>
                                            </div>
                                            <input type="hidden" name="id" value="{{ $users[0]->id }}">

                                            <div class="col-12">
                                                <button class="btn btn-primary w-100 py-3" type="submit">Soumettre</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </main>

            <footer class="footer">

            </footer>
        </div>
    </div>

    <script src="{{ asset('/user/js/app.js') }}"></script>
</body>

</html>
