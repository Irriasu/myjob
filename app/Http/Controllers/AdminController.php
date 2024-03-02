<?php

namespace App\Http\Controllers;

use App\Models\admin;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("admin.index");
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
        $user->role="admin";
        $user->save();
        #==========================#

        //creation d'admin//
        $u = new admin();
        $u->user_id = $user->id;
        $u->nom = $request->input("nom");
        $u->prenom = $request->input("prenom");
        $u->save();
        return Redirect('admin_dashboard');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $u=admin::find($id);
        return view('etudiants.show', ['admin' =>$u]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $u=admin::find($id);
        return view('admin.edit',['admin'=>$u]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $u =admin::find($id);
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
        $u=admin::find($id);
        $u->delete();
        return redirect('/');
    }
}
