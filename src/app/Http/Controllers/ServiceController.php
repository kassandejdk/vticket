<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
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
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $service = Service::create([
            'libelle' => $request->libelle,
            'entreprise_id' => $request->entreprise_id,
        ]);

        return redirect()->back()->with('success', 'Service ajouté avec succès.');
    
    }

    /**
     * Display the specified resource.
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Service $service)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Service $service)
    {
        $service->update([
            'libelle' => $request->libelle,
        ]);
        return redirect()->back()->with('success', 'Service ajouté avec succès.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {   
        $service=Service::findOrFail($request->service_id);
        $service->delete();
        return redirect()->back()->with('success', 'Service supprimé avec succès.');

    }
}
