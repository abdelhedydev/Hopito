<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Patient ;

class PatientController extends Controller
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
      $patient=Patient::all();
      return view('patient.index')->with('patients',$patient);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('patient.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
      $patient = new Patient();

      //responsable
      $patient->responsable_full_name = $req->input('responsable_full_name');
      $patient->responsable_cin = $req->input('responsable_cin');
      $patient->telephone = $req->input('responsable_telephone');
      $patient->responsable = $req->input('responsable');
      //patient
     $patient->nom = $req->input('nom');
     $patient->prenom = $req->input('prenom');
     $patient->naissance = $req->input('naissance');
     $patient->adresse = $req->input('addresse');
     $patient->sexe = $req->input('sexe');
      //famille
      $patient->rang_famille = $req->input('rang_famille');
      $patient->nbre_fr_sr = $req->input('nbre_fr_sr');
      $patient->garde = $req->input('garde');
      //lettre
      $patient->lettre = $req->input('lettre');
     $patient->save();
       return redirect('patient');
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
      $patient = patient::find($id);
       return view('patient.edit',['patient'=>$patient]);
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
        $patient = patient::find($id);
        //responsable
        $patient->responsable_full_name = $req->input('responsable_full_name');
        $patient->responsable_cin = $req->input('responsable_cin');
        $patient->telephone = $req->input('responsable_telephone');
        $patient->responsable = $req->input('responsable');
        //patient
       $patient->nom = $req->input('nom');
       $patient->prenom = $req->input('prenom');
       $patient->naissance = $req->input('naissance');
       $patient->adresse = $req->input('addresse');
       $patient->sexe = $req->input('sexe');
        //famille
        $patient->rang_famille = $req->input('rang_famille');
        $patient->nbre_fr_sr = $req->input('nbre_fr_sr');
        $patient->garde = $req->input('garde');
        //lettre
        $patient->lettre = $req->input('lettre');

        $patient->save();
          return redirect('patient');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {     $patient = Patient::find($id);
         $patient->delete();
        return redirect('patient');
    }
}
