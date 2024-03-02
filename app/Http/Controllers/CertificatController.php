<?php

namespace App\Http\Controllers;

use App\Models\certificat;
use Illuminate\Http\Request;

class CertificatController extends Controller
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
        return view("certif.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $u = new certificat();
        $u->user_id = $request->id;
        $u->titre = $request->input("nom");
        $u->date = $request->input("date");
        $u->etablissement = $request->input("etablissement");
        $u->candidat_id = $request->input("candidat_id");
        $u->save();
        return Redirect('candidat_dashboard');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $u=certificat::find($id);
        return view('certificat.show', ['certif' =>$u]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $u=certificat::find($id);
        return view('candidat.edit',['certif'=>$u]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $u =certificat::find($id);
        $u->titre = $request->input("titre");
        $u->etablissement = $request->input("etablissement");
        $u->date = $request->input('date');
        $u->save();
        return Redirect('candidat_dashboard');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $u=certificat::find($id);
        $u->delete();
        return redirect('candidat_dashboard');
    }
}
