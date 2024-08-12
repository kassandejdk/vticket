<?php

namespace App\Http\Controllers;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Service;
class MainController extends Controller
{
    public function login(){
        return view('accueil.login');
    }
    
    public function accueil(){
        return view('accueil.index');
    }
    public function register(){
        return view('accueil.register');
    }

    public function inscrire(Request $request ){
        

        try{
        User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'telephone'=>$request->telephone,
            'adresse'=>$request->adresse,
            // 'name'=>$request->name,
            'password'=>Hash::make($request->password)
        ]);
        }catch(\Exception $e){
            return back()->withInput()->withErrors(['erreur'=> str($e) ]);
        }
        
        return to_route('se_connecter')->with('success','Inscription réussie !!!');
        
    }
    // public function admin(Request $request){
    //     $tickets=Ticket::pasTraiter();
    //     // dd($tickets);
    //     return view('dashboard2',compact('tickets'));
    // }

    public function parametre($id){
        $services=Service::where('entreprise_id',$id)->get();
        return view('accueil.parametre',compact('services'));
    }
}
