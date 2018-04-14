@extends('layouts.app')

@section('content')
<div class="container">
<a href="/patient/create">  <button type="button" class="btn btn-outline-primary">Ajouter un Patient</button>
</a>
<br>
<br>
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nome & Prenom</th>
      <th scope="col">Adresse</th>
      <th scope="col">Sexe</th>
      <th scope="col">Age</th>
      <th scope="col">Responsable</th>
      <th scope="col">telephone</th>
      <th scope="col"></th>
      <th scope="col"></th>
      <th scope="col"></th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
    @foreach ($patients as $patient)
      <tr>
        <th scope="row">{{$patient->id}}</th>
        <td>{{$patient->nom}} {{$patient->prenom}}</td>
        <td>{{$patient->adress}}</td>
        <td>{{$patient->sexe}}</td>
        <td>{{$patient->age}} ans</td>
        <td>{{$patient->responsable}}</td>
        <td>{{$patient->telephone}}</td>
        <td>
          Profil
        </td>
        <td>
          <a href="/rende"><img src="{{URL::asset('/img/calendar.png')}}" alt="profile Pic" ></a>
        </td>

        <td>
          <a href="{{url('patient/'.$patient->id.'/edit')}}">
            <button type="button" name="button">
              <img src="{{URL::asset('/img/wrench.png')}}" alt="profile Pic" >
            </button>
            </a>
        </td>
        <td>
          <form class="" action="{{url('patient/'.$patient->id)}}" method="post">
                {{csrf_field()}}
              <input type="hidden" name="_method" value="DELETE" >
              <a href="" >
                <button type="submit" name="button">
                  <img src="{{URL::asset('/img/garbage.png')}}" alt="profile Pic" >
                </button>
              </a>
            </form>
        </td>
      </tr>
    @endforeach

  </tbody>
</table>

</div>
@endsection
