<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>vticket</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('accueil/lib/animate/animate.min.css') }} " rel="stylesheet">
    <link href="{{ asset('accueil/lib/owlcarousel/assets/owl.carousel.min.css') }} " rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('accueil/css/bootstrap.min.css') }} " rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('accueil/css/style.css') }} " rel="stylesheet">
</head>

<body>
   
    <div class="container-fluid fixed-top px-0 wow fadeIn" data-wow-delay="0.1s">
        <div class="top-bar row gx-0 align-items-center d-none d-lg-flex">
            <div class="col-lg-6 px-5 text-start">
                <small><i class="fa fa-map-marker-alt text-primary me-2"></i>Belle ville, Bobo-Dsso</small>
                <small class="ms-4"><i class="fa fa-clock text-primary me-2"></i>08h00 - 20h00</small>
            </div>
            <div class="col-lg-6 px-5 text-end">
                <small><i class="fa fa-envelope text-primary me-2"></i>jdkasdel@gmail.com</small>
                <small class="ms-4"><i class="fa fa-phone-alt text-primary me-2"></i>+226 74 41 59 98</small>
            </div>
        </div>

        <nav class="navbar navbar-expand-lg navbar-light py-lg-0 px-lg-5 wow fadeIn" data-wow-delay="0.1s">
            <a href="#" class="navbar-brand ms-4 ms-lg-0">
                <div class="d-flex gap-1 align-items-center ">
                    <img src="{{ asset('accueil/img/logo.jpg') }}" alt="" width="60px" height="60px" style="border-radius: 50%;border:1px solid blue;">
                    <h3 class=" text-primary m-0">VTicket</h3>
                </div>
            </a>
            <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse"
                data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto p-4 p-lg-0">
                    <a href="{{ route('accueil_index') }}" class="nav-item nav-link active">Accueil</a>
                    <a href="{{ route('se_connecter') }}" class="nav-item nav-link">Se connecter</a>
                    <a href="{{ route('register') }}" class="nav-item nav-link">S'inscrire</a>
                </div>
                <div class="d-none d-lg-flex ms-2">
                    <a class="btn btn-light btn-sm-square rounded-circle ms-3" href="">
                        <small class="fab fa-facebook-f text-primary"></small>
                    </a>
                    <a class="btn btn-light btn-sm-square rounded-circle ms-3" href="https://wa.me/+22658957538">
                        <small class="fab fa-whatsapp text-primary"></small>
                    </a>
                    <a class="btn btn-light btn-sm-square rounded-circle ms-3" href="">
                        <small class="fab fa-linkedin-in text-primary"></small>
                    </a>
                </div>
            </div>
        </nav>
    </div>
    <!-- Navbar End -->



    {{ $slot }}


    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-light footer mt-5 py-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-white mb-4">Nos reférences</h4>
                    <a href="tel:+22674415998">
                        <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+226 74 41 59 98</p>
                    </a>
                    <a href="malito:jdkasdel@gmail.com">
                        <p class="mb-2"><i class="fa fa-envelope me-3"></i>jdkasdel@gmail.com</p>
                    </a>
                    <div class="d-flex pt-2">
                        <a class="btn btn-square btn-outline-light rounded-circle me-2" href=""><i
                                class="fab fa-whatsapp"></i></a>
                        <a class="btn btn-square btn-outline-light rounded-circle me-2" href=""><i
                                class="fab fa-facebook-f"></i></a>

                        <a class="btn btn-square btn-outline-light rounded-circle me-2" href=""><i
                                class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-white mb-4">Partenaires</h4>
                    <a class="btn-link " href="">Orange Digital Center</a>
                    <br>
                    <a class="btn-link " href="">Orange Burkina</a>
                    <br>
                    <a class="btn-link " href="">banques burkina</a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-white mb-4">Developers team</h4>
                    <a class="btn-link" href="">BADO Yves</a>
                    <br>
                    <a class="btn-link" href="">KABRE Hamidou</a>
                    <br>
                    <a class="btn-link" href="">KASSANDE Judicael</a>
                </div>
                
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Copyright Start -->
    <div class="container-fluid copyright py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                    &copy; <a class="border-bottom" href="#">VTicket</a>, Tous droits reservés.
                </div>
                <div class="col-md-6 text-center text-md-end">
                Conçu par le <a class="border-bottom" href="https://htmlcodex.com">Groupe 3</a> 
                </div>
            </div>
        </div>
    </div>
    <!-- Copyright End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"><i
            class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('accueil/lib/wow/wow.min.js') }}"></script>
    <script src="{{ asset('accueil/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('accueil/lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('accueil/lib/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('accueil/lib/counterup/counterup.min.js') }}"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('accueil/js/main.js') }}"></script>
</body>

</html>