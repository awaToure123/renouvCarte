

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
 <button data-bs-toggle="modal" data-bs-target="#staticBackdrop" class="alert btn-info">+Mise à jour</button>
<table class="table">
<thead>
        <tr>
                        <th scope="col">Cartes</th>
                        <th scope="col">Status</th>
                        <th scope="col">Date</th>
                        <th scope="col">Mise-à-jour</th>
                    </tr>
</thead>
<tbody>
<tr wire:key='{{$demande->id}}'>
<th > <a href="{{Storage::url($demande->ancienne_carte)}}" target="_blank">Voir</a> </th>
<td > {{$demande->status}} </td>
                <td>{{$demande->created_at}} </td>
                <td > {{$demande->updated_at}} </td>
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
    <h4 class="modal-title fs-5" id="staticBackdropLabel">Demande-de-cartes</h4>
    <button type="button" class="btn-close  btn-primary" data-bs-dismiss="modal" aria-label="Close">Fermer</button>
  </div>
  <div class="modal-body">
  <form enctype="multipart/form-data" method="POST" action="{{route('updateRenouveau.cartes.users.renouveau')}}">
        @csrf
        <div class="mb-3">
            <label for="acte_naissance" class="form-label">Ancienne-carte</label>
            <input type="file" class="form-control" id="acte_naissance" name="renouveauCarte">

        </div>
        <input type="hidden" class="form-control" id="acte_naissance" name="id" value="{{$demande->id}}">

        <button type="submit" class="btn btn-primary">Vaiider</button>
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
