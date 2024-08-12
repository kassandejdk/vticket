<x-accueil_body>

<div class="container " style="margin-top:10rem !important;">
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
    <div class="row align-items-center p-4 rounded-3 shadow-sm bg-light">
        <!-- Colonne pour l'image de login -->
        <div class="col-lg-6 text-center mb-4 mb-lg-0">
            <img src="{{ asset('accueil/img/register.jpg') }}" height="530px" alt="Image de login" class="img-fluid">
        </div>

        <!-- Colonne pour le formulaire -->
        <div class="col-lg-6">
            <div class="p-4 rounded shadow-sm bg-white">
                <h1 class="display-6 mb-4 text-center">Formulaire d'inscription</h1>
                <form method="POST" action="{{ route('accueil_inscrire') }}">
                    @csrf
                    <div class="row g-3">
                        <div class="col-12">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="name"  name="name" >
                                <label for="name">Nom complet</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating">
                                <input type="email" class="form-control" id="email" name="email" >
                                <label for="email">Email</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating">
                                <input type="number" class="form-control" id="telephone" name="telephone"  >
                                <label for="telephone">Telephone</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="adresse" name="adresse" >
                                <label for="adresse">Adresse</label>
                            </div>
                        </div>
                        <div class="col-12 mt-2">
                            <div class="form-floating">
                                <input type="password" class="form-control" id="password" name="password" >
                                <label for="password">Mot de passe</label>
                            </div>
                        </div>
                        <div class="col-12 mt-2">
                            <div class="form-floating">
                                <input type="password" class="form-control" id="password" name="password_confirmation" >
                                <label for="password">Confirmation </label>
                            </div>
                        </div>
                        <div class="col-12 mt-4">
                            <button class="btn btn-primary btn-lg btn-block" type="submit">S'inscrire</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


</x-accueil_body>