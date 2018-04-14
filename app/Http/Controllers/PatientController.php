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
     $patient->nom = $req->input('nom');
     $patient->prenom = $req->input('prenom');
     $patient->adresse = $req->input('addresse');
     $patient->age = $req->input('age');
     $patient->sexe = $req->input('sexe');
     $patient->naissance = $req->input('naissance');
     $patient->responsable = $req->input('responsable');
     $patient->telephone = $req->input('telephone');

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
        $patient->nom = $req->input('nom');
        $patient->prenom = $req->input('prenom');
        $patient->adresse = $req->input('addresse');
        $patient->age = $req->input('age');
        $patient->sexe = $req->input('sexe');
        $patient->naissance = $req->input('naissance');
        $patient->responsable = $req->input('responsable');
        $patient->telephone = $req->input('telephone');

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
