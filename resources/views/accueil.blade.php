<!DOCTYPE html>
<html lang="en">

<style>
    .modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content/Box */
.modal-content {
  background-color: #fefefe;
  margin: 15% auto; /* 15% from the top and centered */
  padding: 20px;
  border: 1px solid #888;
  width: 80%; /* Could be more or less, depending on screen size */
}

/* The Close Button */
.close {
  color: #aaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: black;
  text-decoration: none;
  cursor: pointer;
}
</style>
    @include('templates.heade')

    <body>

    @include('templates.navBar')


        <!-- About Start -->
        <div class="container-fluid about py-5">
            <div class="container py-5">
                <div class="row g-5 align-items-center">
                    <div class="col-lg-5">
                        <div class="h-100" style="border: 50px solid; border-color: transparent #13357B transparent #13357B;">
                            <img src="img/sene.jpg" class="img-fluid w-100 h-100" alt="">
                        </div>
                    </div>

                    <div class="col-lg-7" style="background: linear-gradient(rgba(255, 255, 255, .8), rgba(255, 255, 255, .8)), url(img/about-img-1.png);">
                        <h5 class="section-about-title pe-3"></h5>
                        <h1 class="mb-4">Renouvecarte <span class="text-primary">Travela</span></h1>
                        <p class="mb-4">
                        <p>Le Sénégal, situé à l'extrémité ouest de l'Afrique, possède une riche histoire qui remonte à plusieurs millénaires. Dès le 7ème siècle, les empires du Ghana, du Mali et du Songhaï ont influencé la région avec leurs cultures et leurs échanges commerciaux. Au 15ème siècle, les explorateurs portugais ont été les premiers Européens à arriver, suivis par les Français qui ont colonisé le Sénégal au 19ème siècle. Le pays a joué un rôle crucial dans la traite transatlantique des esclaves, notamment à travers l'île de Gorée, un site mémorable de cette période sombre.

Le Sénégal a acquis son indépendance de la France le 4 avril 1960, sous la direction de son premier président, Léopold Sédar Senghor, un éminent poète et homme politique. Depuis lors, le Sénégal a été reconnu pour sa stabilité politique et son engagement en faveur de la démocratie en Afrique de l'Ouest. Dakar, la capitale vibrante et culturelle, est le cœur économique et culturel du pays.

Aujourd'hui, le Sénégal est réputé pour sa diversité culturelle, ses traditions riches, et son accueil chaleureux, symbolisé par la célèbre hospitalité sénégalaise ou "teranga". De plus, le pays continue de jouer un rôle important dans la région, tant sur le plan politique qu'économique.</p><br><!-- About Text 1 -->
                        </p>
                        <div class="row gy-2 gx-4 mb-4">
                            <div class="col-sm-6">
                                <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>First Class Flights</p>
                            </div>

                        </div>
                        <a class="btn btn-primary rounded-pill py-3 px-5 mt-2" href="">Read More</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- About End -->

        <!-- Services Start -->
        <div class="container-fluid bg-light service py-5">
            <div class="container py-5">
                <div class="mx-auto text-center mb-5" style="max-width: 900px;">
                    <h5 class="section-title px-3">Searvices</h5>
                    <h1 class="mb-0">Our Services</h1>
                </div>
                <div class="row g-4">
                    <div class="col-lg-6">
                        <div class="row g-4">
                            <div class="col-12">
                                <div class="service-content-inner d-flex align-items-center bg-white border border-primary rounded p-4 pe-0">
                                    <div class="service-content text-end">
                                        <h5 class="mb-4">WorldWide Tours</h5>
                                        <p class="mb-0">Dolor sit amet consectetur adipisicing elit. Non alias eum, suscipit expedita corrupti officiis debitis possimus nam laudantium beatae quidem dolore consequuntur voluptate rem reiciendis, omnis sequi harum earum.
                                        </p>
                                    </div>
                                    <div class="service-icon p-4">
                                        <i class="fa fa-globe fa-4x text-primary"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="service-content-inner d-flex align-items-center  bg-white border border-primary rounded p-4 pe-0">
                                    <div class="service-content text-end">
                                        <h5 class="mb-4">Hotel Reservation</h5>
                                        <p class="mb-0">Dolor sit amet consectetur adipisicing elit. Non alias eum, suscipit expedita corrupti officiis debitis possimus nam laudantium beatae quidem dolore consequuntur voluptate rem reiciendis, omnis sequi harum earum.
                                        </p>
                                    </div>
                                    <div class="service-icon p-4">
                                        <i class="fa fa-hotel fa-4x text-primary"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="service-content-inner d-flex align-items-center bg-white border border-primary rounded p-4 pe-0">
                                    <div class="service-content text-end">
                                        <h5 class="mb-4">Travel Guides</h5>
                                        <p class="mb-0">Dolor sit amet consectetur adipisicing elit. Non alias eum, suscipit expedita corrupti officiis debitis possimus nam laudantium beatae quidem dolore consequuntur voluptate rem reiciendis, omnis sequi harum earum.
                                        </p>
                                    </div>
                                    <div class="service-icon p-4">
                                        <i class="fa fa-user fa-4x text-primary"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="service-content-inner d-flex align-items-center bg-white border border-primary rounded p-4 pe-0">
                                    <div class="service-content text-end">
                                        <h5 class="mb-4">Event Management</h5>
                                        <p class="mb-0">Dolor sit amet consectetur adipisicing elit. Non alias eum, suscipit expedita corrupti officiis debitis possimus nam laudantium beatae quidem dolore consequuntur voluptate rem reiciendis, omnis sequi harum earum.
                                        </p>
                                    </div>
                                    <div class="service-icon p-4">
                                        <i class="fa fa-cog fa-4x text-primary"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="row g-4">
                            <div class="col-12">
                                <div class="service-content-inner d-flex align-items-center bg-white border border-primary rounded p-4 ps-0">
                                    <div class="service-icon p-4">
                                        <i class="fa fa-globe fa-4x text-primary"></i>
                                    </div>
                                    <div class="service-content">
                                        <h5 class="mb-4">WorldWide Tours</h5>
                                        <p class="mb-0">Dolor sit amet consectetur adipisicing elit. Non alias eum, suscipit expedita corrupti officiis debitis possimus nam laudantium beatae quidem dolore consequuntur voluptate rem reiciendis, omnis sequi harum earum.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="service-content-inner d-flex align-items-center bg-white border border-primary rounded p-4 ps-0">
                                    <div class="service-icon p-4">
                                        <i class="fa fa-hotel fa-4x text-primary"></i>
                                    </div>
                                    <div class="service-content">
                                        <h5 class="mb-4">Hotel Reservation</h5>
                                        <p class="mb-0">Dolor sit amet consectetur adipisicing elit. Non alias eum, suscipit expedita corrupti officiis debitis possimus nam laudantium beatae quidem dolore consequuntur voluptate rem reiciendis, omnis sequi harum earum.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="service-content-inner d-flex align-items-center bg-white border border-primary rounded p-4 ps-0">
                                    <div class="service-icon p-4">
                                        <i class="fa fa-user fa-4x text-primary"></i>
                                    </div>
                                    <div class="service-content">
                                        <h5 class="mb-4">Travel Guides</h5>
                                        <p class="mb-0">Dolor sit amet consectetur adipisicing elit. Non alias eum, suscipit expedita corrupti officiis debitis possimus nam laudantium beatae quidem dolore consequuntur voluptate rem reiciendis, omnis sequi harum earum.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="service-content-inner d-flex align-items-center bg-white border border-primary rounded p-4 ps-0">
                                    <div class="service-icon p-4">
                                        <i class="fa fa-cog fa-4x text-primary"></i>
                                    </div>
                                    <div class="service-content">
                                        <h5 class="mb-4">Event Management</h5>
                                        <p class="mb-0">Dolor sit amet consectetur adipisicing elit. Non alias eum, suscipit expedita corrupti officiis debitis possimus nam laudantium beatae quidem dolore consequuntur voluptate rem reiciendis, omnis sequi harum earum.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="text-center">
                            <a class="btn btn-primary rounded-pill py-3 px-5 mt-2" href="">Service More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Services End -->

        <!-- Destination Start -->

        <!-- Destination End -->

        <!-- Explore Tour Start -->

        <!-- Explore Tour Start -->


   <!-- Button trigger modal -->

<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
    <form action="/registerDemande" method="POST">
        @csrf
    <div class="row g-3">
        <div class="col-md-6">
            <div class="form-floating">
                <input type="text" class="form-control bg-white border-0" name="nom" id="name" placeholder="Entrer votre nom">
                <label for="name">Nom</label>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-floating">
                <input type="text" class="form-control bg-white border-0" id="email" name="prenom" placeholder="Entrer votre prenom" required>
                <label for="email">Prenom</label>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-floating date" id="date3" data-target-input="nearest">
                <input type="email" class="form-control bg-white border-0" id="datetime" name="email" placeholder="Votre Email"  />
                <label for="datetime">Email</label>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-floating date" id="date3" data-target-input="nearest">
                <input type="text" class="form-control bg-white border-0" id="datetime" name="tel" placeholder="Votre téléohone"  />
                <label for="datetime">Téléphone</label>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-floating date" id="date3" data-target-input="nearest">
                <input type="number" class="form-control bg-white border-0" id="datetime" name="age" placeholder="Votre age" min='1'  />
                <label for="datetime">Age</label>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-floating date" id="date3" data-target-input="nearest">
                <input type="password" class="form-control bg-white border-0" id="datetime" name="password" placeholder="Mot de passe"  />
                <label for="datetime">Password</label>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-floating date" id="date3" data-target-input="nearest">
                <input type="password" class="form-control bg-white border-0" id="datetime" name="password_confirm" placeholder="Mot de passe"  />
                <label for="datetime">Password-confirmation</label>
            </div>
        </div>

        <div class="col-12">
            <button class="btn btn-primary text-white w-100 py-3" type="submit">Soumettre</button>
        </div>
    </div>
</form>
  </div>

</div>



<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered"> <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title fs-5" id="staticBackdropLabel">CONNEXION</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="/loginDemande" method="POST">
          @csrf
          <div class="row g-3">
            <div class="col-md-12 mb-3"> <div class="form-floating">
                <input type="text" class="form-control bg-white border-0" name="emailOrTel" id="name" placeholder="Email ou Téléphone">
                <label for="name">Identifiant</label>
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-floating date" id="date3" data-target-input="nearest">
                <input type="password" class="form-control bg-white border-0" id="datetime" name="password" placeholder="Mot de passe">
                <label for="datetime">Mot de passe</label>
              </div>
            </div>
            <a href="{{route('reset_.assword.users')}}">Mot de passe oublié ?</a>
            <div class="col-12 mt-3"> <button class="btn btn-primary text-white w-100 py-3" type="submit">Soumettre</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Button trigger modal -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
       <center>
       <h1 class="modal-title fs-5" id="exampleModalLabel">Creation-de-compte</h1>
       </center>
      </div>
      <div class="modal-body">
      <form action="/registerDemande" method="POST">
        @csrf
    <div class="row g-3">
        <div class="col-md-6">
            <div class="form-floating">
                <input type="text" class="form-control bg-white border-0" name="nom" id="name" placeholder="Entrer votre nom">
                <label for="name">Nom</label>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-floating">
                <input type="text" class="form-control bg-white border-0" id="email" name="prenom" placeholder="Entrer votre prenom" required>
                <label for="email">Prenom</label>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-floating date" id="date3" data-target-input="nearest">
                <input type="email" class="form-control bg-white border-0" id="datetime" name="email" placeholder="Votre Email"  />
                <label for="datetime">Email</label>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-floating date" id="date3" data-target-input="nearest">
                <input type="text" class="form-control bg-white border-0" id="datetime" name="tel" placeholder="Votre téléohone"  />
                <label for="datetime">Téléphone</label>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-floating date" id="date3" data-target-input="nearest">
                <input type="number" class="form-control bg-white border-0" id="datetime" name="age" placeholder="Votre age" min='1'  />
                <label for="datetime">Age</label>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-floating date" id="date3" data-target-input="nearest">
                <input type="password" class="form-control bg-white border-0" id="datetime" name="password" placeholder="Mot de passe"  />
                <label for="datetime">Password</label>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-floating date" id="date3" data-target-input="nearest">
                <input type="password" class="form-control bg-white border-0" id="datetime" name="password_confirm" placeholder="Mot de passe"  />
                <label for="datetime">Password-confirmation</label>
            </div>
        </div>

        <div class="col-12">

            <button class="btn btn-primary text-white w-100 py-3" type="submit">Soumettre</button>
        </div>

        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>

    </div>
</form>
      </div>

    </div>
  </div>
</div>


        <!-- Tour Booking Start -->




        <!-- Testimonial End -->

        <!-- Subscribe Start -->
        <div class="container-fluid subscribe py-5">
            <div class="container text-center py-5">
                <div class="mx-auto text-center" style="max-width: 900px;">
                    <h5 class="subscribe-title px-3">Subscribe</h5>
                    <h1 class="text-white mb-4">Our Newsletter</h1>
                    <p class="text-white mb-5">Lorem ipsum dolor sit amet consectetur adipisicing elit. Laborum tempore nam, architecto doloremque velit explicabo? Voluptate sunt eveniet fuga eligendi! Expedita laudantium fugiat corrupti eum cum repellat a laborum quasi.
                    </p>
                    <div class="position-relative mx-auto">
                        <input class="form-control border-primary rounded-pill w-100 py-3 ps-4 pe-5" type="text" placeholder="Your email">
                        <button type="button" class="btn btn-primary rounded-pill position-absolute top-0 end-0 py-2 px-4 mt-2 me-2">Subscribe</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Subscribe End -->

        <!-- Footer Start -->
        @include('templates.footer')
        <!-- Footer End -->

        <!-- Copyright Start -->
        <div class="container-fluid copyright text-body py-4">
            <div class="container">
                <div class="row g-4 align-items-center">
                    <div class="col-md-6 text-center text-md-end mb-md-0">
                        <i class="fas fa-copyright me-2"></i><a class="text-white" href="#">Your Site Name</a>, All right reserved.
                    </div>
                    <div class="col-md-6 text-center text-md-start">
                        <!--/*** This template is free as long as you keep the below author’s credit link/attribution link/backlink. ***/-->
                        <!--/*** If you'd like to use the template without the below author’s credit link/attribution link/backlink, ***/-->
                        <!--/*** you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". ***/-->
                        Designed By <a class="text-white" href="https://htmlcodex.com">HTML Codex</a> Distributed By <a href="https://themewagon.com">ThemeWagon</a>
                    </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Copyright End -->

        <!-- Back to Top -->
        <a href="#" class="btn btn-primary btn-primary-outline-0 btn-md-square back-to-top"><i class="fa fa-arrow-up"></i></a>


        <!-- JavaScript Libraries -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="lib/easing/easing.min.js"></script>
        <script src="lib/waypoints/waypoints.min.js"></script>
        <script src="lib/owlcarousel/owl.carousel.min.js"></script>
        <script src="lib/lightbox/js/lightbox.min.js"></script>


        <!-- Template Javascript -->
        <script src="js/main.js"></script>

        <script>
            var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on the button, open the modal
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
        </script>
    </body>

</html>
