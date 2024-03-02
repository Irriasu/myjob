<?php

namespace App\Http\Controllers;
use App\Models\anonce;
use Illuminate\Http\Request;

class AnonceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $anonces = anonce::all();
        return view('home',['anonces'=>$anonces]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('AddAnnonce');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $anonce=new anonce;
        $anonce->poste=$request->Name;
        $anonce->type=$request->Type;
        $anonce->description=$request->Description;
        $anonce->skills=$request->skills;
        $anonce->avantages=$request->avantages;
        $anonce->status=$request->Status;
        $anonce->rucruter_id=$request->id;

        $anonce->save();
        return redirect('/');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
