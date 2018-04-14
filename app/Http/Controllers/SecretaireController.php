<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Secretaire ;

class SecretaireController extends Controller
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
      $secretaire=Secretaire::all();
      return view('rh/secretaire.index')->with('secretaires',$secretaire);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('rh/secretaire.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
      $secretaire = new Secretaire();
     $secretaire->nom = $req->input('nom');
     $secretaire->prenom = $req->input('prenom');
     $secretaire->adrresse = $req->input('addresse');
     $secretaire->cin = $req->input('cin');
     $secretaire->sexe = $req->input('sexe');
     $secretaire->naissance = $req->input('naissance');
     $secretaire->date_debut = $req->input('date_debut');

     $secretaire->save();
       return redirect('secretaire');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $secretaire = secretaire::find($id);
       return view('rh.secretaire.edit',['secretaire'=>$secretaire]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req, $id)
    {
      $secretaire = Secretaire::find($id);
      $secretaire->nom = $req->input('nom');
      $secretaire->prenom = $req->input('prenom');
      $secretaire->adrresse = $req->input('addresse');
      $secretaire->cin = $req->input('cin');
      $secretaire->sexe = $req->input('sexe');
      $secretaire->naissance = $req->input('naissance');
      $secretaire->date_debut = $req->input('date_debut');

     $secretaire->save();
       return redirect('secretaire');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $secretaire = Secretaire::find($id);
           $secretaire->delete();
          return redirect('secretaire');
    }
}
