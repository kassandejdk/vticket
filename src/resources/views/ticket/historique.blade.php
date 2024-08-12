<x-dashbord.dashbord_body>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" integrity="sha384-4LISF5TTJX/fLmGSxO53rV4miRxdg84mZsxmO8Rx5jGtp/LbrixFETvWa5a6sESd" crossorigin="anonymous">
<div id="client_dash">

    @if ($ticket->isEmpty())
    <div class="row">
        <div class="col-lg-12">
            <div class="img d-flex justify-content-center align-items-center m-2" >
                <img src="{{ asset('accueil/img/notfound.png')}}" alt="">
            </div>
            <div class="alert alert-info m-2 " >
                Aucun ticket n'est trouvé pour le moment. 
            </div>
        </div>
    </div>
    @else
    <div class="row" >
        
        @foreach ($ticket as $tick )
        <div class="col-lg-4 " >
           
            <div style=" border:2px solid blue;border-radius:10px;text-align:center;padding-top:.8rem;" class="d-flex justify-content-center align-items-center bloc-ordre"  >
                <p>Ordre de passage actuel: {{ $tick->ordrePassage}} </p>
            </div>
            <div class="ticket-info" style="margin-left: .5rem;">
                <h4>{{ $tick->service->entreprise->libelle }}</h4>
                <h2 class="ticket-number m-2"> {{ $tick->numeroTicket }}</h2>
                <p>Service: {{ $tick->service->libelle }}</p>
                @php
                    $url = 'Ticket numero '. $tick->numeroTicket . ' de '. auth()->user()->name;
                    $qrCode = QrCode::format('png')->size(200)->color(0,0,255)->generate($url);
                @endphp
                <div class="text-center">
                    <img src="data:image/png;base64, {{ base64_encode($qrCode) }}" alt="QR Code">
                </div>

                <p><strong>Date:</strong> <span>{{ \Carbon\Carbon::parse($tick->dateCreation)->isoFormat('LL') }} </span></p>
                <p>Ordre de passage actuel:{{ $tick->ordrePassage }}</p>
                <hr>
                <h6>Détenteur: {{ auth()->user()->name }}</h6>
                <i>Géneré le :{{ \Carbon\Carbon::parse($tick->created_at)->isoFormat('LL') }} à {{ \Carbon\Carbon::parse($tick->created_at)->isoFormat('LT') }}</i>
            </div>
            <div class="buttons row gap-3" style="margin-left: .5rem;">
                <div class="col-lg-4">
                    <button type="button" class="btn btn-primary mt-2">
                        <a href="{{ route('telecharger.ticket',$tick->id )  }}" style="color: #fff;">Telecharger <i class="bi bi-download"></i></a>
                    </button>
                </div>
                <div class="col-lg-4">
                    <button type="button" class="btn btn-danger mt-2">
                        <a href="{{ route('delete.ticket',$tick->id )  }}" style="color: #fff;">Supprimer <i class="bi bi-trash"></i></a>
                    </button>
                </div>
            </div>
        </div>
    @endforeach
        @endif
    </div>

    <style>
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

            @media (min-width: 992px) {
            .col-lg-4 {
                max-width: 100%;
                }
            }
            @media(max-width:390px){
                .ticket-info , bloc-ordre{
                    margin-left: 20px !important;
                    margin-right: 15px !important;
                    
                }
               
                
                .bloc-ordre{
                    margin:.7rem;
                }
            }
            .buttons {
                flex-wrap: nowrap !important;
            }
            
    </style>
</div>
    
</x-dashbord.dashbord_body>
