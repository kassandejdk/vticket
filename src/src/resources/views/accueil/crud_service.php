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
                <th>#</th>
                <th>Nom du Service</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <!-- Exemple de service -->
            <tr>
                <td>1</td>
                <td>Service 1</td>
                <td>
                    <button type="button" class="btn btn-warning btn-sm">Modifier</button>
                    <button type="button" class="btn btn-danger btn-sm">Supprimer</button>
                </td>
            </tr>
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
                <form id="addServiceForm">
                    <div class="form-group">
                        <label for="serviceName">Nom du Service</label>
                        <input type="text" class="form-control" id="serviceName" name="serviceName" required>
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
