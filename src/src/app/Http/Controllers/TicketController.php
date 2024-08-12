<?php

namespace App\Http\Controllers;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Entreprise;
use App\Models\Ticket;
use Dompdf\Dompdf;
use Dompdf\Options;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;
class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {   
        $request->validate([
            'date' => ['required', 'date', 'after_or_equal:today'],
        ]);
        
        $entreprise = Entreprise::find($request->entreprise);
        $service = Service::find($request->service);
        $ticketCount = Ticket::where('service_id', $service->id)->count() + 1;
        $numeroTicket = strtoupper(substr($entreprise->libelle, 0, 1) . '' . substr($service->libelle, 0, 1) . '-' . str_pad($ticketCount, 5, '0', STR_PAD_LEFT));

        $ticket = new Ticket();
        $ticket->numeroTicket = $numeroTicket;
        $ticket->dateCreation = $request->date;
        $ticket->estValide = false; 
        $ticket->user_id = auth()->id(); 
        $ticket->service_id = $service->id;
        $ticket->ordrePassage=0;
        $ticket->save();

        $ticket->ordrePassage = Ticket::where('service_id', $request->service)
            ->where('estValide', false)
            ->whereRaw('DATE(dateCreation) = DATE(?)', [$ticket->dateCreation])
            ->where('id', '<', $ticket->id)
            ->count() + 1;
        $ticket->save();

        $url = 'Ticket numero '. $numeroTicket. ' de '. auth()->user()->name;
        $qrCode = QrCode::format('png')->size(200)->color(0,0,255)->generate($url);
        $entreprises=Entreprise::withCount('services')->get();
        return view('dashboard',compact('entreprises','ticket','qrCode'));
    }

    
    
    public function telechargerTicket(Ticket $ticket)
    {
        $url = 'Ticket numero '. $ticket->numeroTicket. ' de '. auth()->user()->name;
        $qrCode = QrCode::format('png')->size(200)->color(0,0,255)->generate($url);
        $html = view('ticket/ticket', compact('ticket','qrCode'))->render();

        // $options = new Options();
        // $options->set('defaultFont', 'Arial');
        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        return $dompdf->stream("ticket_".$ticket->numeroTicket.'.pdf');
    }
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {   
        $entreprises = Entreprise::with(['services.tickets' => function ($query) {
            $query->where('estValide', false)
                  ->where('created_at', '>=', Carbon::today())
                  ->where('created_at', '<', Carbon::tomorrow());
        }])->get();
    
        $statistiques = $entreprises->map(function ($entreprise) {
            return [
                'entreprise' => $entreprise->libelle,
                'services' => $entreprise->services->map(function ($service) {
                    return [
                        'service' => $service->libelle, 
                        'ticket_count' => $service->tickets->count(),
                    ];
                }),
            ];
        });

        return view('ticket.statistique', compact('statistiques'));

    }

    

    public function finir( Request $request){
        // dd($request);
        
        $ticket = Ticket::find($request->id);
        $ticket->estValide = true;
        $ticket->save();
        Ticket::where('ordrePassage', '>', $ticket->ordrePassage)
                ->where('service_id', $ticket->service_id)
                ->where('estValide',false)
                ->decrement('ordrePassage');
        foreach(Ticket::all() as $tic){
            if ($tic->ordrePassage === 3) {
                $tic->message = $tic->numeroTicket. ': '. " Il reste  03 personnes";
                $tic->save();
                $user=User::find($tic->user_id);
                $entrepris=Entreprise::find($tic->service_id)->libelle;
                $sujet = "Notification de VTicket";
                $message = "
                    <p>Bonjour <strong>{$user->name}</strong>,</p>
                    <p>Nous souhaitons vous informer qu'il ne reste plus que trois (03) personnes avant votre tour pour le ticket <span>{$tic->numeroTicket}</span>. Nous vous invitons à vous rapprocher du service <span style='color:blue'>{$tic->service->libelle}</span> pour être prêt lorsque votre numéro sera appelé.</p>
                    <p>Cordialement,</p>
                    <p>{$entrepris}</p>
                ";

                Mail::html($message, function ($message) use ($user, $sujet) {
                    $message->to($user->email)
                            ->subject($sujet);
                });
        
                }
        }
        return redirect()->back()->with('success', 'Ticket traité avec succès!');
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $ticket = Ticket::find($id);
        $ticket->delete();
        return redirect()->back()->with('success', 'Ticket supprimé avec succès!');
    }

    public function historique($id){
        // dd($id);  
        $ticket = Ticket::where('user_id',$id)->where('estValide',false)->orderBy('dateCreation','desc')->get();
        $entreprises=Entreprise::withCount('services')->get();
        
        // $url = 'Ticket numero '. $ticket->numeroTicket . ' de '. auth()->user()->name;
        // $qrCode = QrCode::format('png')->size(200)->color(0,0,255)->generate($url);
        return view('ticket.historique',compact('ticket','entreprises'));
    }

    public function delete_message(Request $request){
        $ticket=Ticket::findOrFail($request->id);
        // dd($ticket);
        $ticket->message=null;
        $ticket->save();
        return redirect()->back()->with('success', 'Message supprimé avec succès!');
    }

    
}
