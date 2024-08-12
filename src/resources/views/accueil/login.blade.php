<x-accueil_body>

<div class="container " style="margin-top:10rem !important;">
    <div class="row align-items-center p-4 rounded-3 shadow-sm bg-light">
        <!-- Colonne pour l'image de login -->
        <div class="col-lg-6 text-center mb-4 mb-lg-0">
            <img src="{{ asset('accueil/img/login.jpg') }}" alt="Image de login" class="img-fluid">
        </div>

        <!-- Colonne pour le formulaire -->
        <div class="col-lg-6">
        @if ($message = Session::get('success'))
        <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
            <span class="badge badge-pill badge-success">Succès</span>
            <strong>{{ $message }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
        @endif

        @if ($message = Session::get('error'))
            <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
                <span class="badge badge-pill badge-danger">Erreur</span>
                <strong>{{ $message }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
        @endif

        @if ($message = Session::get('warning'))
            <div class="sufee-alert alert with-close alert-warning alert-dismissible fade show">
                <span class="badge badge-pill badge-warning">Avertissement</span>
                <strong>{{ $message }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
        @endif

        @if ($message = Session::get('info'))
        <div class="sufee-alert alert with-close alert-info alert-dismissible fade show">
            <span class="badge badge-pill badge-info">Info</span>
            <strong>{{ $message }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Erreur de validation des entrées. Veuillez reassayer ou contacter l'administrateur !</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
            <div class="p-4 rounded shadow-sm bg-white">
                <h1 class="display-6 mb-4 text-center mt-5">Formulaire de connexion</h1>
                <form method="POST" action="{{ route('login') }}">
                        @csrf
                    <div class="row g-3">
                        <div class="col-12">
                            <p style="margin:.5rem;">Email</p>
                            <div class="form-floating mb-2">
                                <input type="email" name="email" class="form-control" id="email" placeholder="Votre Email">
                                <label for="email">Email</label>
                            </div>
                        </div>
                        <div class="col-12 mt-2">
                            <p style="margin:.5rem;">Mot de passe</p>
                            <div class="form-floating mb-3">
                                <input type="password" name="password" class="form-control" id="password" placeholder="Votre Mot de passe">
                                <label for="password">Mot de passe</label>
                            </div>
                        </div>
                        <div class="col-12 mt-4">
                            <button class="btn btn-primary btn-lg btn-block" type="submit">Se connecter</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


</x-accueil_body>