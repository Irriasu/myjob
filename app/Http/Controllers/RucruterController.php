<?php

namespace App\Http\Controllers;

use App\Models\rucruter;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("rucuter.index");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("rucruter.create");
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
        $user->role="admin";
        $user->save();
        #==========================#

        //creation d'admin//
        $u = new rucruter();
        $u->user_id = $user->id;
        $u->nom = $request->input("nom");
        $u->prenom = $request->input("prenom");
        $u->save();
        return Redirect('rucruter_dashboard');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $u=rucruter::find($id);
        return view('rucruter.show', ['rucruter' =>$u]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $u=rucruter::find($id);
        return view('rucruter.edit',['rucre'=>$u]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $u =rucruter::find($id);
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
        $u=rucruter::find($id);
        $u->delete();
        return redirect('rucruter_dashboard');
    }
}
