
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
						<h1 class="h3 d-inline align-middle">Messages</h1>
	
					</div>
					<div class="row">

						</div>

						<div class="col-md-8 col-xl-9">
							<div class="card">
								<div class="card-header">

                                <div class="container-fluid p-0">

<div style="padding-bottom: 100px;"></div>
 <h5 >Message</h5>
<table class="table">
<thead>
<tr>
            <th scope="col">Numéro</th>
            <th scope="col">Messages</th>
            <th scope="col">Date</th>
            <th scope="col">Vue 🆗</th>
        </tr>
</thead>
<tbody>
        @foreach($messages as $demande)
            <tr wire:key='{{$demande->id}}'>
            <th scope="row"> {{$demande->id}} </th>
                <th > {{$demande->message}} </th>
                <td > {{$demande->created_at}} </td>
                <td><a href="{{route('delete.users.Message',['id'=>$demande->id])}}" class="btn btn-info" ><i class="bi bi-trash"></i></td>
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
