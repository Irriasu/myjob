<?php

namespace App\Http\Controllers;

use App\Models\candidat;
use App\Models\User;
use Illuminate\Http\Request;

class CandidatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("candidat.index");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //creation de l'utilisateur//
        $user = new User();
        $user->name = $request->input("username");
        $user->email = $request->input("email");
        $user->password = $request->input("password");
        $user->role="Candidat";
        $user->save();
        #==========================#

        //creation d'candidat//
        $u = new candidat();
        $u->user_id = $user->id;
        $u->nom = $request->input("nom");
        $u->prenom = $request->input("prenom");
        $u->save();
        return Redirect('candidat_dashboard');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $u=candidat::find($id);
        return view('etudiants.show', ['candidat' =>$u]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $u=candidat::find($id);
        return view('candidat.edit',['candidat'=>$u]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $u =candidat::find($id);
        $u->nom = $request->input("nom");
        $u->prenom = $request->input("prenom");
        $u->save();
        return Redirect('/');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $u=candidat::find($id);
        $u->delete();
        return redirect('/');
    }
}
