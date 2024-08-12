@php
    use App\Models\Entreprise;
    use App\Models\Service;
@endphp
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ticket #{{ $ticket->numeroTicket }}</title>
    <style>
        body {
            font-family: Poppins, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .ticket-info {
            border: 2px solid #ccc;
            border-radius: 10px;
            padding: 15px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.4); 
            margin-top: 20px;
            background-color: #fff;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            width:300px;
        }
            
        .ticket-info .ticket-number {
            font-weight: bold;
        }
        .text-center{
            display: flex;
            justify-content: center;
            align-items: center;
        }
            
        .ticket-info .italic {
            font-style: italic;
            font-size: 14px;
        }
        .qr-code {
            margin: 20px 0;
        }
    </style>
</head>
<body>

    <div class="ticket-info " style="margin-left:10rem;">
        <h4 style="text-align:center;">{{ Entreprise::find($ticket->entreprise_id) }}</h4>
        <h2 class="ticket-number m-2" style="text-align:center;"> {{ $ticket->numeroTicket }}</h2>
        <p style="text-align:center;">Service: {{ Service::find($ticket->service_id)->libelle }}</p>

        <div class="text-center" style="margin-left:4rem;">
            <img src="data:image/png;base64, {{ base64_encode($qrCode) }}" alt="QR Code">
        </div>

        <p style="text-align:center;"><strong>Date:</strong> <span>{{ \Carbon\Carbon::parse($ticket->dateCreation)->isoFormat('LL') }} </span></p>
        <hr>
        <h6 style="text-align:center;">Détenteur: {{ auth()->user()->name }}</h6>
        <i style="text-align:center;">Géneré le :{{ \Carbon\Carbon::parse($ticket->created_at)->isoFormat('LL') }} à {{ \Carbon\Carbon::parse($ticket->created_at)->isoFormat('LT') }}</i>
    </div>
   
</body>
</html>
