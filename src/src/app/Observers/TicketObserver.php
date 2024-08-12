<?php

namespace App\Observers;

use App\Models\Service;
use App\Models\Ticket;
use Illuminate\Support\Facades\Mail;
use App\Models\User;

class TicketObserver
{
    /**
     * Handle the Ticket "created" event.
     */
    public function created(Ticket $ticket): void
    {
        //
    }

    public function envoyerEmail(Request $request, $id)
    {
        $request->validate([
            'raison' => 'nullable|string|max:1000',
        ]);

        $user = User::findOrFail($id);
       

        if ($request->filled('raison')) {
            $sujet = "Probleme d'inscription";
            $raison = $request->input('raison');
            $message = "<p>Bonjour <strong>{$user->prenom}</strong>,</p>
            <p>
            Nous avons examiné votre demande d'inscription et malheureusement, elle n'est pas complète. Veuillez revoir les informations suivantes :
            </p>
            <p style='color: red;'><strong>{$raison}</strong></p>
            <p>
            Merci de vous reconnecter en tenant compte de ces suggestions.
            Le lien du site : <a href='".route('login')."'>GestMutuelle</a> <br/>
            </p>
            <p>Cordialement,<br>Signé par GestMutuelle.</p>
            ";
        } else {
            $sujet = "Inscription reussie";
            $message = "<p>Bonjour <strong>{$user->prenom}</strong>,</p>
            <p>Félicitations ! Votre inscription a été validée avec succès. Vous pouvez maintenant accéder à votre compte avec le matricule suivant:<br/></p>
            <p style='color:blue;'><strong>{$user->matricule}</strong></p>
            <p>
            Le numéro matricule est personnel et confidentiel ne le communiquez donc pas à une tierce personne <br/>
            Le lien du site: <a href='".route('login')."'>GestMutuelle</a>
            </p>

            <p>Cordialement, <br/>
            Signé par GestMutuelle.
            </p>
            ";
        }

        try {
            Mail::html($message, function ($message) use ($user, $sujet) {
                $message->to($user->email)
                        ->subject($sujet);
            });
            if ($request->filled('raison')) {
                $user->delete();
            }
            return redirect()->back()->with('success', 'Email envoyé avec succès.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Erreur lors de l\'envoi de l\'email.');
        }
    }
    /**
     * Handle the Ticket "updated" event.
     */
    public function updated(Ticket $ticket): void
    {
       if ($ticket->ordrePassage === 3) {
        $ticket->message = $ticket->numeroTicket. ': '. " Il reste  03 personnes";
        $ticket->save();
        dd($ticket);
        $user=User::find($ticket->user_id);
        $sujet="Notification de VTicket";
        $message="<p>Bonjour <strong>{{ $user->name }}</strong>,</p>
        <p>Nous souhaitons vous informer qu'il ne reste plus que trois(03) personnes avant votre tour. Nous vous invitons à vous rapprocher du service {{ Service::find($ticket->service_id)->libelle }} pour être prêt lorsque votre numéro sera appelé.</p>
        <p>Cordialement,</p>
        <p>{{ $ticket->entreprise_id }}</p>
        ";
        Mail::html($message, function ($message) use ($user, $sujet) {
            $message->to($user->email)
                    ->subject($sujet);
        });

        }
    }

    /**
     * Handle the Ticket "deleted" event.
     */
    public function deleted(Ticket $ticket): void
    {
        //
    }

    /**
     * Handle the Ticket "restored" event.
     */
    public function restored(Ticket $ticket): void
    {
        //
    }

    /**
     * Handle the Ticket "force deleted" event.
     */
    public function forceDeleted(Ticket $ticket): void
    {
        //
    }
}
