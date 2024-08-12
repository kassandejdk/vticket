@php
use Carbon\Carbon;
Carbon::setLocale('fr');
@endphp

<x-dashbord.dashbord_body>
    <!-- Option 1: Include in HTML -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <!-- Content -->
    <div class="content">
        <!-- Animated -->
        <div class="animated fadeIn">
            <style>
                .content{
                    background-color: #d5f8e5;
                }
            </style>
            <div class="row">
                <div class="col-lg-12">
                    @if (isset($ticket))
                        <div class="alert alert-success alert-dismissible fade show">
                            Votre ticket a été créé avec succès!
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                </div>
            </div>

            <div class="row">
                

                <div class="col-lg-12 m-2 justify-content-center align-items-center">
                    <h3 style="text-align:center;text-transform:uppercase;color:#000;" class="m-1">Prendre un ticket</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <img src="{{ asset('accueil/img/prise-ticket.jpg')}}" alt="Image">
                </div>
                <div class="col-lg-6">
                    <form action="{{ route('prendre_ticket') }}" method="POST">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="entrepriseSelect">Le nom de l'entreprise</label>
                                <select name="entreprise" id="entrepriseSelect" class="form-control" onchange="updateServices()" required>
                                    <option selected>Choisir une entreprise</option>
                                    @foreach ($entreprises as $entreprise)
                                    <option value="{{ $entreprise->id }}">{{ $entreprise->libelle }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="serviceSelect">Le nom du service</label>
                                <select name="service" id="serviceSelect" class="form-control" disabled>
                                    <option>Choisir le service</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="inputDateTime">Date </label>
                                <input type="date" name="date" class="form-control" id="inputDateTime" value="{{ now()->format('Y-m-d') }}" min="{{ now()->format('Y-m-d') }}" required>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Valider</button>
                    </form>
                    <div class="card mt-3 @if (isset($ticket)) d-block @else d-none @endif">
                        <div class="card-body">
                            @if (isset($ticket))
                                <div class="ticket-info">
                                    <h4>{{ $ticket->service->entreprise->libelle }}</h4>
                                    <h2 class="ticket-number m-2"> {{ $ticket->numeroTicket }}</h2>
                                    <p>Service: {{ $ticket->service->libelle }}</p>
                    
                                    <div class="text-center">
                                        <img src="data:image/png;base64, {{ base64_encode($qrCode) }}" alt="QR Code">
                                    </div>
                    
                                    <p><strong>Date:</strong> <span>{{ \Carbon\Carbon::parse($ticket->dateCreation)->isoFormat('LL') }} </span></p>
                                    <p>Ordre de passage actuel:{{ $ticket->ordrePassage }}</p>
                                    <hr>
                                    <h6>Détenteur: {{ auth()->user()->name }}</h6>
                                    <i>Géneré le :{{ \Carbon\Carbon::parse($ticket->created_at)->isoFormat('LL') }} à {{ \Carbon\Carbon::parse($ticket->created_at)->isoFormat('LT') }}</i>
                                </div>
                                <button type="button" class="btn btn-primary mt-2">
                                    <a href="{{ route('telecharger.ticket',$ticket )  }}" style="color: #fff;">Telecharger <i class="bi bi-download"></i></a>
                                </button>
                            @endif

                        </div>
                    </div>
                    
                </div>
            </div>
            
            <style>
                .card .card-body {
                    float: left;
                    padding: 1.25rem 5rem;
                }
                .ticket-info {
                    border: 2px solid #ccc;
                    border-radius: 10px;
                    padding: 15px;
                    box-shadow: 0 0 20px rgba(0, 0, 0, 0.4); /* Box shadow fort */
                    margin-top: 20px;
                    background-color: #fff;
                    display: flex;
                    flex-direction: column;
                    justify-content: center;
                    align-items: center;
                }
            
                .ticket-info .ticket-number {
                    /* font-size: 24px;  */
                    font-weight: bold;
                }
            
                .ticket-info .italic {
                    font-style: italic;
                    font-size: 14px;
                }
            </style>
            
       

        <script>
            function updateServices() {
                var entrepriseId = document.getElementById('entrepriseSelect').value;
                var serviceSelect = document.getElementById('serviceSelect');
                
                // Effacer les options existantes
                serviceSelect.innerHTML = '<option>Choisir le service</option>';
                
                // Si une entreprise est sélectionnée
                if (entrepriseId) {
                    @foreach ($entreprises as $entreprise)
                        if (entrepriseId == '{{ $entreprise->id }}') {
                            @foreach ($entreprise->services as $service)
                                var option = document.createElement('option');
                                option.value = '{{ $service->id }}';
                                option.text = '{{ $service->libelle }}';
                                serviceSelect.appendChild(option);
                            @endforeach
                        }
                    @endforeach
                    serviceSelect.disabled = false;
                } else {
                    serviceSelect.disabled = false;
                }
            }
        </script>

          
            
        </div>
        <!-- .animated -->
    </div>
    <!-- /.content -->
</x-dashbord.dashbord_body>
