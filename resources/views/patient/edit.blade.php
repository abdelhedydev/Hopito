@extends('layouts.app')

@section('content')
<div class="container">
  <form class="" action="{{ url('patient/'. $patient->id)}}" enctype="multipart/form-data" method="post">
    <input type="hidden" name="_method" value="PUT">
   {{csrf_field()}}
   <h4><img src="{{URL::asset('/img/parent.png')}}" alt="profile Pic" > <u>Interlocuteur</u></h4>
     <div class="form-group row">
      <label for="inputEmail3" class="col-sm-2 col-form-label">Nom & prénom</label>
      <div class="col-sm-4">
        <input type="text" class="form-control" id="inputEmail3" placeholder="Nom et prenom" name="responsable_full_name" value="{{$patient->responsable_full_name}}" required>
      </div>
     </div>
     {{-- next input --}}
     <div class="form-group row">
      <label for="inputPassword3" class="col-sm-2 col-form-label">Cin</label>
      <div class="col-sm-4">
        <input type="text" class="form-control" id="inputPassword3" placeholder="num carte d'identité" name="responsable_cin" value="{{$patient->responsable_cin}}" required>
      </div>
     </div>

  {{-- next input --}}
  <div class="form-group row">
    <label for="inputPassword3" class="col-sm-2 col-form-label">Téléphone</label>
    <div class="col-sm-4">
      <input type="tele" class="form-control" id="inputPassword3" placeholder="+216" name="responsable_telephone" value="{{$patient->telephone}}" required>
    </div>
  </div>
  {{-- next input --}}
  <div class="form-group row">
    <label for="inputPassword3" class="col-sm-2 col-form-label">lien paréntale</label>
    <div class="col-sm-4">
      <select required class="form-control" id="inlineFormCustomSelect" name="responsable"   >
         <option value="">Choose...</option>
         <option @if ($patient->responsable == 'pére') selected @endif value="pére">Pére</option>
         <option @if ($patient->responsable == 'mére') selected @endif  value="mére">Mére</option>
         <option @if ($patient->responsable == 'oncle') selected @endif value="oncle">Oncle</option>
         <option @if ($patient->responsable == 'tante') selected @endif value="tante">Tante</option>
         <option value="autre">autre</option>
       </select>
    </div>
  </div>


 {{-- Patient --}}
    <h4><img src="{{URL::asset('/img/child.png')}}" alt="profile Pic" ><u>Patient</u></h4>
    {{-- line 1 --}}
   <div class="form-row">
     <div class="form-group col-md-6">
       <label for="inputEmail4">Nom</label>
       <input type="text" class="form-control" id="nom" name="nom"  placeholder="Nom"  value="{{$patient->nom}}" required>
     </div>
     <div class="form-group col-md-6">
       <label for="inputPassword4">Prenom</label>
       <input type="text" class="form-control" id="prenom" name="prenom" placeholder="Prenom" value="{{$patient->prenom}}" required>
     </div>
   </div>

 {{-- line 2 --}}
   <div class="form-row">
     <div class="form-group col-md-6">
       <label for="inputZip">Date de naissance</label>
       <input type="date" class="form-control" id="naissance" name="naissance" value="{{$patient->naissance}}" required>
     </div>
     <div class="form-group col-md-6">
       <label for="inputAddress">Addresse</label>
       <input type="text" class="form-control" id="Address" name="addresse" placeholder="12 rue liberté Béja Tunis" value="{{$patient->adresse}}" required>
     </div>
   </div>

     {{-- line 3 (sexe) --}}
     <div class="form-row">
     <div class="form-group col-md-6">
       <label for="">Sexe</label>
             <div class="form-check form-check-inline">
             <input class="form-check-input" type="radio" name="sexe" id="inlineRadio1" value="F" @if ($patient->sexe == 'F') checked @endif>
             <label class="form-check-label" for="inlineRadio1">Femme</label>
             </div>
             <div class="form-check form-check-inline">
             <input class="form-check-input" type="radio" name="sexe" id="inlineRadio2" value="H" @if ($patient->sexe == 'H') checked @endif>
             <label class="form-check-label" for="inlineRadio2">Homme</label>
             </div>
     </div>
   </div>

   {{-- line 4 (family) --}}
     <div class="form-row">
       <div class="form-group col-md-4">
         <label for="rang">Rang (famille)</label>
         <input type="number" class="form-control" id="rang" name="rang_famille" value="{{$patient->rang_famille}}">
       </div>
       <div class="form-group col-md-4">
         <label for="inputAddress">Nbr (frére & Soeur)</label>
         <input type="number" class="form-control" id="Address" name="nbre_fr_sr" value="{{$patient->nbre_fr_sr}}" placeholder="nombre des fréres et soeurs">
       </div>
       <div class="form-group col-md-4">
         <label for="inputAddress">Garde</label>
         <input type="text" class="form-control" id="Address" name="garde" placeholder="garde" value="{{$patient->garde}}">
       </div>
     </div>
     {{-- line 4 (family) --}}
       <div class="form-row">
         <div class="form-group col-md-12">
           <label for="le">Lettre de loison</label>
           <textarea type="text" class="form-control" id="lettre" name="lettre"  required>
             {{$patient->lettre}}
             </textarea>
         </div>
       </div>
  <button type="submit" class="btn btn-success">Mise à jour</button>
</form>
</div>
@endsection
