@extends('layouts.app')

@section('content')
<div class="container">
  <form class="" action="{{ url('technicien/'. $technicien->id)}}"  method="post">
    <input type="hidden" name="_method" value="PUT">
   {{csrf_field()}}
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Nom</label>
      <input type="text" class="form-control" id="nom" name="nom"  value="{{$technicien->nom}}" placeholder="Nom">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Prenom</label>
      <input type="text" class="form-control" id="prenom" name="prenom" value="{{$technicien->prenom}}" placeholder="Prenom">
    </div>
  </div>

  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Telephone</label>
      <input type="tel" class="form-control" id="telephone" name="telephone" value="{{$technicien->telephone}}"  placeholder="+216" required>
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Adresse</label>
      <input type="text" class="form-control" id="addresse" name="addresse" value="{{$technicien->adrresse}}" placeholder="10 rue tunis" required>
    </div>
  </div>

  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="inputCity">Identifiant (cin)</label>
      <input type="texte" class="form-control" value="{{$technicien->cin}}" name="cin" id="cin">
    </div>

    <div class="form-group col-md-4">
      <label for="sexe">Sexe</label>

      <div class="form-check">
              <input class="form-check-input" type="radio" name="sexe" value="H" id="exampleRadios1" value="H" @if ($technicien->sexe == 'H') checked @endif>
              <label class="form-check-label" for="exampleRadios1">
                Homme
              </label>
      </div>

        <div class="form-check">
          <input class="form-check-input" type="radio" name="sexe" value="F" id="exampleRadios2" value="F" @if ($technicien->sexe == 'F') checked @endif>
          <label class="form-check-label" for="exampleRadios2">
            Femme
          </label>
        </div>


    </div>

    <div class="form-group col-md-4">
      <label for="inputZip">Date de naissance</label>
      <input type="date" class="form-control" value="{{$technicien->naissance}}"  id="naissance" name="naissance">
    </div>

  </div>

  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="responsable">Date de début</label>
      <input type="date" class="form-control" id="date_debut" value="{{$technicien->date_debut}}" name="date_debut" placeholder="Nom responsable">
    </div>
  </div>
  <button type="submit" class="btn btn-success">Modifier</button>
</form>
</div>
@endsection
