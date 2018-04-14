@extends('layouts.app')

@section('content')
  <h2>rh</h2>
<div class="container">
  <form class="" action ="{{ url('patient') }}"  method="post">
   {{csrf_field()}}
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Nom</label>
      <input type="text" class="form-control" id="nom" name="nom"  placeholder="Nom">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Prenom</label>
      <input type="text" class="form-control" id="prenom" name="prenom" placeholder="Prenom">
    </div>
  </div>

  <div class="form-group">
    <label for="inputAddress">Address</label>
    <input type="text" class="form-control" id="Address" name="addresse" placeholder="12 rue liberté Béja Tunis">
  </div>

  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="inputCity">Age</label>
      <input type="number" class="form-control" name="age" id="age">
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
      <input type="date" class="form-control" id="naissance" name="naissance">
    </div>

  </div>

  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="responsable">Responsable</label>
      <input type="text" class="form-control" id="responsable" name="responsable" placeholder="Nom responsable">
    </div>
    <div class="form-group col-md-6">
      <label for="telephone">Num telephone</label>
      <input type="phone" class="form-control" id="telephone" name="telephone" placeholder="+216">
    </div>
  </div>
  <button type="submit" class="btn btn-success">Enregistrer</button>
</form>
</div>
@endsection
