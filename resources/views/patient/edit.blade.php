@extends('layouts.app')

@section('content')
<div class="container">
  <form class="" action="{{ url('patient/'. $patient->id)}}" enctype="multipart/form-data" method="post">
    <input type="hidden" name="_method" value="PUT">
   {{csrf_field()}}
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Nom</label>
      <input type="text" class="form-control" id="nom" name="nom" value="{{$patient->nom}}" placeholder="Nom">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Prenom</label>
      <input type="text" class="form-control" id="prenom" name="prenom" value="{{$patient->prenom}}" placeholder="Prenom">
    </div>
  </div>

  <div class="form-group">
    <label for="inputAddress">Address</label>
    <input type="text" class="form-control" id="Address" name="addresse" value="{{$patient->adresse}}" placeholder="12 rue liberté Béja Tunis">
  </div>

  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="inputCity">Age</label>
      <input type="number" class="form-control" value="{{$patient->age}}" name="age" id="age">
    </div>

    <div class="form-group col-md-4">
      <label for="sexe">Sexe</label>
      <div class="form-check">
              <input class="form-check-input" type="radio" name="sexe" id="H" value="H" @if ($patient->sexe == 'H') checked @endif >
              <label class="form-check-label" for="H">
                Homme
              </label>
      </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="sexe" id="F" value="F" @if ($patient->sexe == 'F') checked @endif >
          <label class="form-check-label" for="F">
            Femme
          </label>
        </div>


    </div>

    <div class="form-group col-md-4">
      <label for="inputZip">Date de naissance</label>
      <input type="date" class="form-control" value="{{$patient->naissance}}" id="naissance" name="naissance">
    </div>

  </div>

  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="responsable">Responsable</label>
      <input type="text" class="form-control" value="{{$patient->responsable}}" id="responsable" name="responsable" placeholder="Nom responsable">
    </div>
    <div class="form-group col-md-6">
      <label for="telephone">Num telephone</label>
      <input type="phone" class="form-control" id="telephone" value="{{$patient->telephone}}" name="telephone" placeholder="+216">
    </div>
  </div>
  <button type="submit" class="btn btn-success">Enregistrer</button>
</form>
</div>
@endsection
