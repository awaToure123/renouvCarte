

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
 <button data-bs-toggle="modal" data-bs-target="#staticBackdrop" class="alert btn-info">+Modifier mes informations</button>
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
			</main>

			<footer class="footer">

			</footer>
		</div>
	</div>

	<script src="{{('/user/js/app.js')}}"></script>

</body>

</html>
