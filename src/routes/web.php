<?php

use App\Http\Controllers\ProfileController;
use App\Models\Entreprise;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\TicketController;
use App\Models\Ticket;
use App\Http\Controllers\ServiceController;
Route::get('/dashboard', function () {
    $entreprises=Entreprise::withCount('services')->get();
    return view('dashboard',compact('entreprises'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('dashbord/admin', function () {
    $id=Auth::user()->entreprise_id;
    $tickets=Ticket::pasTraiter($id);
    $ticket_services=$tickets->groupBy('service_id');
    return view('dashboard2',compact('ticket_services'));
})->middleware(['auth', 'verified'])->name('administrateur');

Route::post('/dashboard', function () {
    $entreprises=Entreprise::withCount('services')->get();
    return view('dashboard',compact('entreprises'));
});

// Route::post('dashbord/admin',[MainController::class,'admin'])->name('administrateur');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/connecter',[MainController::class,'login'])->name('se_connecter');
Route::get('/register',[MainController::class,'register'])->name('register');
Route::get('/',[MainController::class,'accueil'])->name('accueil_index');
Route::post('/inscription',[MainController::class,'inscrire'])->name('accueil_inscrire');
Route::post('/prendre/ticket',[TicketController::class,'create'])->name('prendre_ticket');
Route::post('finir/service/',[TicketController::class,'finir'])->name('finir.service');
Route::get('/telecharger/ticket/{ticket}',[TicketController::class,'telechargerTicket'])->name('telecharger.ticket');
Route::get('historique/ticket/{id}',[TicketController::class,'historique'])->name('historique.ticket');
Route::get('delete/ticket/{id}',[TicketController::class,'destroy'])->name('delete.ticket');
Route::get('statistique/tickets',[TicketController::class,'show'])->name('statistique.ticket');
Route::post('delete/message',[TicketController::class,'delete_message'])->name('delete.message');
Route::get('parametre/service/{id}',[MainController::class,'parametre'])->name('parametre.service');

Route::post('service/creer',[ServiceController::class,'store'])->name('creer.service');
Route::post('modifier/service',[ServiceController::class,'update'])->name('modifier.service');
Route::delete('supprimer/service',[ServiceController::class,'destroy'])->name('supprimer.service');