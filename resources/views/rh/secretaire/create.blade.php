@extends('layouts.app')

@section('content')
<div class="container">
  <form class="" action ="{{ url('secretaire') }}"  method="post">
   {{csrf_field()}}
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Nom</label>
      <input type="text" class="form-control" id="nom" name="nom"  placeholder="Nom" required>
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Prenom</label>
      <input type="text" class="form-control" id="prenom" name="prenom" placeholder="Prenom" required>
    </div>
  </div>

  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Telephone</label>
      <input type="tel" class="form-control" id="telephone" name="telephone"  placeholder="+216" required>
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Adresse</label>
      <input type="text" class="form-control" id="addresse" name="addresse" placeholder="10 rue tunis" required>
    </div>
  </div>

  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="inputCity">Identifiant (cin)</label>
      <input type="texte" class="form-control" name="cin" id="cin" required>
    </div>

    <div class="form-group col-md-4">
      <label for="sexe">Sexe</label>
      <div class="form-check">
              <input class="form-check-input" type="radio" name="sexe" value="H" id="exampleRadios1" value="H" checked>
              <label class="form-check-label" for="exampleRadios1">
                Homme
              </label>
      </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="sexe" value="F" id="exampleRadios2" value="F">
          <label class="form-check-label" for="exampleRadios2">
            Femme
          </label>
        </div>


    </div>

    <div class="form-group col-md-4">
      <label for="inputZip">Date de naissance</label>
      <input type="date" class="form-control" id="naissance" name="naissance" required>
    </div>

  </div>

  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="responsable">Date de début</label>
      <input type="date" class="form-control" id="date_debut" name="date_debut" placeholder="Nom responsable" required>
    </div>
  </div>
  <button type="submit" class="btn btn-success">Enregistrer</button>
</form>
</div>
@endsection
