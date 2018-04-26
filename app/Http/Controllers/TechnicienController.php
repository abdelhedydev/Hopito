<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Technicien;

class TechnicienController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $technicien=Technicien::all();
      return view('rh/technicien.index')->with('techniciens',$technicien);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('rh/technicien.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $req
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
      $technicien = new Technicien();
     $technicien->nom = $req->input('nom');
     $technicien->prenom = $req->input('prenom');
     $technicien->adrresse = $req->input('addresse');
     $technicien->cin = $req->input('cin');
     $technicien->sexe = $req->input('sexe');
     $technicien->naissance = $req->input('naissance');
     $technicien->date_debut = $req->input('date_debut');
     $technicien->telephone = $req->input('telephone');


     $technicien->save();
       return redirect('rh');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $technicien = technicien::find($id);
       return view('rh.technicien.edit',['technicien'=>$technicien]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $req
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req, $id)
    {
      $technicien = Technicien::find($id);
      $technicien->nom = $req->input('nom');
      $technicien->prenom = $req->input('prenom');
      $technicien->adrresse = $req->input('addresse');
      $technicien->cin = $req->input('cin');
      $technicien->sexe = $req->input('sexe');
      $technicien->naissance = $req->input('naissance');
      $technicien->date_debut = $req->input('date_debut');
      $technicien->telephone = $req->input('telephone');

     $technicien->save();
       return redirect('rh');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $technicien = Technicien::find($id);
           $technicien->delete();
          return redirect('rh');
    }
}
