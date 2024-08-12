<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Services</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .btn-add {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 50%;
            width: 60px;
            height: 60px;
            font-size: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            cursor: pointer;
        }
        .btn-add:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

<div class="container mt-4">
    @if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif

    <div class="row">
        <div class="col-lg-12">
            <a href="{{ route('administrateur') }}" class="btn btn-primary">
                retour
            </a>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col">
            <h1>Services</h1>
        </div>
        <div class="col text-right">
            <!-- Bouton + pour ajouter un service -->
            <button type="button" class="btn btn-primary btn-add" data-toggle="modal" data-target="#addServiceModal">
                +
            </button>
        </div>
    </div>

    <!-- Tableau des services -->
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Date de creation</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($services as $service )
            <tr>
                <td>{{ $service->id }}</td>
                <td>{{ $service->libelle }}</td>
                <td>
                    <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modifierService{{ $service->id }}">Modifier</button>
                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteService{{ $service->id }}">Supprimer</button>
                </td>
            </tr>
            <!-- Modal pour modifier un service -->
            <div class="modal fade" id="modifierService{{ $service->id }}" tabindex="-1" role="dialog" aria-labelledby="addServiceModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="addServiceModalLabel">Modifier un Service</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form id="addServiceForm" action="{{ route('modifier.service') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="serviceName">Nom du Service</label>
                                    <input type="hidden" name="service_id" value="{{ $service->id }}">
                                    <input type="text" class="form-control" id="libelle" name="serviceName" value="{{ $service->libelle }}" required>
                                </div>
                                <button type="button" class="btn btn-primary" data-dismiss="modal">Fermer</button>
                                <button type="submit" class="btn btn-primary">Modifier</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal pour supprimer un service -->
            <div class="modal fade" id="deleteService{{ $service->id }}" tabindex="-1" role="dialog" aria-labelledby="addServiceModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="addServiceModalLabel">Suppression d'un service</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            Voulez-vous réellement supprimer le service {{ $service->libelle }} ? Cette action est irréversible
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                            <form id="deleteServiceForm" action="{{ route('supprimer.service') }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <input type="hidden" name="service_id" value="{{ $service->id }}">
                                <button type="submit" class="btn btn-danger">Supprimer</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            @endforeach
            <!-- Vous pouvez répéter le bloc ci-dessus pour d'autres services -->
        </tbody>
    </table>
</div>

<!-- Modal pour ajouter un service -->
<div class="modal fade" id="addServiceModal" tabindex="-1" role="dialog" aria-labelledby="addServiceModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addServiceModalLabel">Ajouter un Service</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="addServiceForm" action="{{ route('creer.service') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="serviceName">Nom du Service</label>
                        <input type="hidden" name="entreprise_id" value="{{ $service->entreprise_id }}">
                        <input type="text" class="form-control" id="serviceName" name="libelle" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Ajouter</button>
                </form>
            </div>
        </div>
    </div>
</div>



<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
