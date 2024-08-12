
@php
use App\Models\Entreprise;
@endphp

<style>
    
.btn-plus {
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
    position: fixed;
    /* top:30px; */
    bottom: 20px;
    right: 20px;
    cursor: pointer;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
}

.btn-plus:hover {
    background-color: #0056b3;
}

/* Style du formulaire */
.form-container {
    display: none;
    position: fixed;
    bottom: 80px;
    right: 20px;
    background-color: white;
    border: 1px solid #ccc;
    border-radius: 8px;
    padding: 20px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
}

.form-container form {
    display: flex;
    flex-direction: column;
}

.form-container input {
    margin-bottom: 10px;
}

.btn-close {
    background-color: #dc3545;
    color: white;
    border: none;
    border-radius: 50%;
    width: 30px;
    height: 30px;
    font-size: 20px;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
}

.btn-close:hover {
    background-color: #c82333;
}
.icon-settings {
            font-size: 24px;
            color: #007bff;
        }
</style>
<script>
    document.addEventListener('DOMContentLoaded', function() {
    const openFormButton = document.getElementById('openFormButton');
    const formContainer = document.getElementById('formContainer');
    const closeFormButton = document.getElementById('closeFormButton');

    openFormButton.addEventListener('click', function() {
        formContainer.style.display = 'block';
    });

    closeFormButton.addEventListener('click', function() {
        formContainer.style.display = 'none';
    });
});
</script>

<x-app-layout>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js" defer></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" defer></script>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{-- {{ __('Dashboard') }} --}}
            Bienvenue,cher administrateur
        </h2>
        <p>Entreprise: {{ Entreprise::find(Auth::user()->entreprise_id)->libelle }}</p>
        <button  class="btn-plus icon-settings">
            <a href="{{ route('parametre.service',Auth::user()->entreprise_id) }}">
                ⚙
            </a>
        </button>

        
    </x-slot>
    
    @if(session('success'))
        
    <div class="alert alert-success d-flex justify-content-between fs-5 m-1" role="alert">
        {{ session('success') }}
         <button type="button" class="close" data-dismiss="alert" aria-label="Close">&times;</button>
    </div>
    @endif
    <script>
        const alert = document.querySelector('.alert');
        if (alert) {
            setTimeout(() => {
                alert.remove();
            }, 3000);
        }
    </script>

    <div class="row">
        <div class="col-lg-12">
            <p class="m-2 pl-1  color-white fs-3" style="font-weight: 800;background-color:#198754;border-radius:5px;color:#fff;padding-left:5px;text-transform:uppercase;">Liste des services non traite</p>
        </div>
    </div>

 <div class="row m-4 d-flex justify-content-center  ">
     <table class="table table-bordered">
         <thead>
           <tr>
             <th scope="col">Id</th>
             <th scope="col">Numero du ticket</th>
             <th scope="col">Nom-Prenom</th>
             <th scope="col">Ordre de passage</th>
             <th scope="col">Date</th>
             <th scope="col">Actions</th>

           </tr>
         </thead>
         <tbody>
          
            @foreach ($ticket_services as $service => $tickets)
            <tr>
                <td colspan="6" style="color:blue;">
                    <strong>Service: {{ $tickets->first()->service->libelle }}</strong>
                </td>
            </tr>
        
            @php
                $ticketsByDate = $tickets->groupBy(function($ticket) {
                    return \Carbon\Carbon::parse($ticket->dateCreation)->format('Y-m-d');
                });
            @endphp
        
            @foreach($ticketsByDate as $date => $ticketsForDate)
                <tr>
                    <td colspan="6">
                        <strong>Tickets pour le {{ \Carbon\Carbon::parse($date)->format('d/m/Y') }}</strong>
                        @if($date !== \Carbon\Carbon::now()->format('Y-m-d'))
                            <button class="btn btn-primary toggle-tickets ms-2" data-target="#tickets-{{ $date }}">Rendez-vous</button>
                        @endif
                    </td>
                </tr>
        
                <tbody id="tickets-{{ $date }}" class="{{ $date !== \Carbon\Carbon::now()->format('Y-m-d') ? 'd-none' : '' }}">
                    @foreach($ticketsForDate as $ticket)
                        <tr>
                            <th scope="row">{{ $ticket->id }}</th>
                            <td>{{ $ticket->numeroTicket }}</td>
                            <td>{{ Auth::user()->find($ticket->user_id)->name }}</td>
                            <td>{{ $ticket->ordrePassage }}</td>
                            <td>{{ $ticket->dateCreation }}</td>
                            <td>
                                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalTraiter-{{ $ticket->id }}">
                                    Traiter
                                </button>
                            </td>
                        </tr>
        
                        <!-- Modal -->
                        <div class="modal fade" id="modalTraiter-{{ $ticket->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">CONFIRMATION</h1>
                                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Confirmez-vous la fin du traitement du service {{ App\Models\Service::find($ticket->service_id )->libelle }} de l'utilisateur {{ Auth::user()->find($ticket->user_id)->name }} ?
                                    </div>
                                    <div class="modal-footer">
                                        <form action="{{ route('finir.service') }}" method="POST">
                                          @csrf
                                            <input type="hidden" name="id" value="{{ $ticket->id }}">
                                            <button class="btn btn-secondary" data-dismiss="modal" type="button">Annuler</button>
                                            <button type="submit" class="btn btn-success" >Traiter</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </tbody>
            @endforeach
        @endforeach
        
         </tbody>
     </table>
 </div>


    {{-- <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div> --}}
</x-app-layout>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('.toggle-tickets').forEach(function(button) {
            button.addEventListener('click', function() {
                const targetId = this.getAttribute('data-target');
                const targetElement = document.querySelector(targetId);
                if (targetElement) {
                    targetElement.classList.toggle('d-none');
                    this.textContent = targetElement.classList.contains('d-none') ? 'Rendez-vous' : 'Masquer';
                }
            });
        });
    });
</script>

