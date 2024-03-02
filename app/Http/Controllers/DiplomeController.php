<?php

namespace App\Http\Controllers;

use App\Models\diplome;
use Illuminate\Http\Request;

class DiplomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        $diploma = diplome::where('candidat_id',$id);
        return view('hada',['certifs'=> $diploma]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("diplome.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $u = new diplome();
        $u->user_id = $request->id;
        $u->titre = $request->input("nom");
        $u->date = $request->input("date");
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
        $u=diplome::find($id);
        return view('diplome.show', ['diplome' =>$u]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $u=diplome::find($id);
        return view('diplome.edit',['diplome'=>$u]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $u =diplome::find($id);
        $u->titre = $request->input("titre");
        $u->etablissement = $request->input("universite");
        $u->date = $request->input('date');
        $u->save();
        return Redirect('candidat_dashboard');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $u=diplome::find($id);
        $u->delete();
        return redirect('candidat_dashboard');
    }
}
