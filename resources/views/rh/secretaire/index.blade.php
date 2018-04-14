@extends('layouts.app')

@section('content')
<div class="container">
<a href="/secretaire/create">  <button type="button" class="btn btn-outline-primary">Ajouter une Secretaire</button>
</a>
<br>
<br>
<div class="card-group">

@foreach ($secretaires as $secretaire)
<div class="mycard">
    @if ($secretaire->sexe == 'F')
      <img class="img "    src="{{URL::asset('/img/doctor.png')}}" style="width:50px;height:50px"   alt="Card image cap">
    @else
      <img class="img "    src="{{URL::asset('/img/doctor_male.png')}}" style="width:50px;height:50px"       alt="Card image cap">
    @endif
    <h5 class="">{{$secretaire->nom}} {{$secretaire->prenom}} </h5>
    <p class="">{{$secretaire->naissance}}</p>
    <div class="">
      <a href="{{url('secretaire/'.$secretaire->id.'/edit')}}">
        <button type="button" name="button">
          <img src="{{URL::asset('/img/wrench.png')}}" alt="profile Pic" >
        </button>
        </a>
      <form class="" action="{{url('secretaire/'.$secretaire->id)}}" method="post">
            {{csrf_field()}}
          <input type="hidden" name="_method" value="DELETE" >
          <a href="" >
            <button type="submit" name="button">
              <img src="{{URL::asset('/img/garbage.png')}}" alt="profile Pic" >
            </button>
          </a>
        </form>

    </div>
</div>
@endforeach

</div>
</div>

@endsection
