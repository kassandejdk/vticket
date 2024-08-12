@php
    use App\Models\Entreprise;
    use App\Models\Service;
@endphp
<x-dashbord.dashbord_body>

    <div class="content">
        <div class="row">
            <div class="col-lg-12 m-3">
                <p style="font-size: 2rem;color:blue;font-weight:800;">
                    L'ordre de passage actuel 
                </p>
            </div>
        </div>
        <div class="container mt-4">
            <div class="row">
                <div class="col-lg-12">
                    @foreach($statistiques as $stat)
                        <div class="card mb-3">
                            <div class="card-header bg-primary text-white">
                                <h4 class="mb-0">Entreprise: {{ $stat['entreprise'] }}</h4>
                            </div>
                            <div class="card-body">
                                <ul class="list-group">
                                    @foreach($stat['services'] as $service)
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            <span>Service: {{ $service['service'] }}</span>
                                            <span class="badge badge-primary badge-pill">
                                                Tickets: {{ $service['ticket_count'] }}
                                            </span>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endforeach 
                </div>
            </div>
        </div>
    </div>
    
   

</x-dashbord.dashbord_body>