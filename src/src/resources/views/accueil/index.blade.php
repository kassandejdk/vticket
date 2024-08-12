<x-accueil_body>

    <!-- Carousel Start -->
    <div class="container-fluid p-0 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div id="header-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="w-100" src="{{ asset('accueil/img/carousel-2.jpg') }}" alt="Image">
                    <div class="carousel-caption">
                        <div class="container">
                            <div class="row justify-content-start">
                                <div class="col-lg-7">
                                    <p
                                    class="d-inline-block   text-primary fw-semi-bold py-1 px-3 animated slideInDown">
                                        Bienvenue sur VTicket</p>
                                    <h1 class="display-6 mb-4 animated slideInDown">
                                    Améliorez l'expérience de vos clients en réduisant les temps d'attente.
                                    </h1>
                                    <a href="" class="btn btn-primary  animated slideInDown">Savoir plus</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
           
        </div>
    </div>
    <!-- Carousel End -->


    <!-- About Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-4 align-items-end mb-4">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                    <img class="img-fluid rounded" src="{{ asset('accueil/img/about.jpg') }}">
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                   
                    
                    <img src="{{ asset('accueil/img/logo.jpg') }}" alt="" width="100%" height="300px" style="object-fit: cover">
                    <div class="border rounded p-4">
                        <nav>
                            <div class="nav nav-tabs mb-3" id="nav-tab" role="tablist">
                                <button class="nav-link fw-semi-bold active" id="nav-story-tab" data-bs-toggle="tab"
                                    data-bs-target="#nav-story" type="button" role="tab" aria-controls="nav-story"
                                    aria-selected="true">Histoire</button>
                                <button class="nav-link fw-semi-bold" id="nav-mission-tab" data-bs-toggle="tab"
                                    data-bs-target="#nav-mission" type="button" role="tab" aria-controls="nav-mission"
                                    aria-selected="false">Mission</button>
                                <button class="nav-link fw-semi-bold" id="nav-vision-tab" data-bs-toggle="tab"
                                    data-bs-target="#nav-vision" type="button" role="tab" aria-controls="nav-vision"
                                    aria-selected="false">Vision</button>
                            </div>
                        </nav>
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-story" role="tabpanel"
                                aria-labelledby="nav-story-tab">
                                <p>VTicket a été créée avec une vision claire : transformer la gestion des files d'attente grâce à la technologie. En combinant l'expertise en service client et le potentiel de la numérisation, VTicket est aujourd'hui reconnue pour son impact positif sur la productivité et la satisfaction des clients dans divers secteurs</p>
                            </div>
                            <div class="tab-pane fade" id="nav-mission" role="tabpanel"
                                aria-labelledby="nav-mission-tab">
                                <p>Améliorer l'efficacité et l'expérience client en réinventant la gestion des files d'attente grâce à une plateforme numérique innovante</p>
                                
                            </div>
                            <div class="tab-pane fade" id="nav-vision" role="tabpanel" aria-labelledby="nav-vision-tab">
                                <p>Devenir le leader mondial dans la transformation digitale des files d'attente, en offrant des solutions flexibles, transparentes et adaptées aux besoins variés de nos clients.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="border rounded p-4 wow fadeInUp" data-wow-delay="0.1s">
                <div class="row g-4">
                    <div class="col-lg-4 wow fadeIn" data-wow-delay="0.1s">
                        <div class="h-100">
                            <div class="d-flex">
                                <div class="flex-shrink-0 btn-lg-square rounded-circle bg-primary">
                                    <i class="fa fa-times text-white"></i>
                                </div>
                                <div class="ps-3">
                                    <h4>Zéro retard</h4>
                                    <span>Pour mieux gerer votre temps et éviter les retards</span>
                                </div>
                                <div class="border-end d-none d-lg-block"></div>
                            </div>
                            <div class="border-bottom mt-4 d-block d-lg-none"></div>
                        </div>
                    </div>
                    <div class="col-lg-4 wow fadeIn" data-wow-delay="0.3s">
                        <div class="h-100">
                            <div class="d-flex">
                                <div class="flex-shrink-0 btn-lg-square rounded-circle bg-primary">
                                    <i class="fa fa-users text-white"></i>
                                </div>
                                <div class="ps-3">
                                    <h4>Communauté</h4>
                                    <span>Notre solution s'est invité au quotidien de tous </span>
                                </div>
                                <div class="border-end d-none d-lg-block"></div>
                            </div>
                            <div class="border-bottom mt-4 d-block d-lg-none"></div>
                        </div>
                    </div>
                    <div class="col-lg-4 wow fadeIn" data-wow-delay="0.5s">
                        <div class="h-100">
                            <div class="d-flex">
                                <div class="flex-shrink-0 btn-lg-square rounded-circle bg-primary">
                                    <i class="fa fa-phone text-white"></i>
                                </div>
                                <div class="ps-3">
                                    <h4>Disponibilité</h4>
                                    <span>Nous sommes à votre service 24h/07</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->


    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <h1 class="display-5 mb-5">Nos partenaires</h1>
            </div>
            <div class="owl-carousel project-carousel wow fadeInUp" data-wow-delay="0.3s">
                <div class="project-item pe-5 pb-5">
                    <div class="project-img mb-3">
                        <img class="img-fluid rounded" src="{{ asset('accueil/img/service-1.jpg') }}" alt="">
                         
                    </div>
                    <div class="project-title">
                        <h4 class="mb-0">UBA Banque</h4>
                    </div>
                </div>
                <div class="project-item pe-5 pb-5">
                    <div class="project-img mb-3">
                        <img class="img-fluid rounded" src="{{ asset('accueil/img/service-2.jpg') }}" alt="">
                         
                    </div>
                    <div class="project-title">
                        <h4 class="mb-0">Coris Bank</h4>
                    </div>
                </div>
                <div class="project-item pe-5 pb-5">
                    <div class="project-img mb-3">
                        <img class="img-fluid rounded" src="{{ asset('accueil/img/service-3.jpg') }}" alt="">
                         
                    </div>
                    <div class="project-title">
                        <h4 class="mb-0">Eco Bank</h4>
                    </div>
                </div>
                <div class="project-item pe-5 pb-5">
                    <div class="project-img mb-3">
                        <img class="img-fluid rounded" src="{{ asset('accueil/img/service-4.jpg') }}" alt="">
                         
                    </div>
                    <div class="project-title">
                        <h4 class="mb-0">Sona Assurance</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>


</x-accueil_body>