<?php

namespace App\Http\Controllers;

use App\Models\entreprise;
use Illuminate\Http\Request;

class EntrepriseController extends Controller
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
        return view('entp.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $u = new entreprise();
        $u->nom = $request->input("nom");
        $u->taille = $request->input("taille");
        $u->universite = $request->input("universite");
        $u->candidat_id = $request->input("candidat_id");
        $u->save();
        return Redirect('candidat_dashboard');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $u=entreprise::find($id);
        return view('diplome.show', ['entreprise' =>$u]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(entreprise $entreprise)
    {
        return view('entreprise.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    
    
    public function update(Request $request, string $id)

        {   
            $u = entreprise:: find($id);
            $u->nom = $request->input("nom");
            $u->taille = $request->input("taille");
            $u->sexe = $request->input("adresse");
            
            $u->save();
            return Redirect('/');
           
        }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $u =entreprise::find($id);
        $u->delete();
        return redirect('recruteur_dashboard');
    }
}
