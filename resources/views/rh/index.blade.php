@extends('layouts.app')

@section('content')
<div class="container">

  <div class="row">
    <div class="col-10">
      <h3>Secretaires :</h3>
    </div>
    <div class="col-2">
      <a href="/secretaire/create">  <button type="button" class="btn btn-outline-primary">Nouveau</button></a>
    </div>

  </div>
<br>
<div class="row">
@foreach ($secretaires as $secretaire)
  <div class="col">
    <div class="col-2">
      <center>
        @if ($secretaire->sexe == 'F')
          <img class="img "    src="{{URL::asset('/img/secretary.png')}}" style="width:50px;height:50px"   alt="Card image cap">
        @else
          <img class="img "    src="{{URL::asset('/img/boss.png')}}" style="width:50px;height:50px"       alt="Card image cap">
        @endif
      </center>
    </div>
    <div class="col-10">
      <h5 class="">{{$secretaire->nom}} {{$secretaire->prenom}} </h5>
      <h6><img class="img"    src="{{URL::asset('/img/smartphone.png')}}"       alt="Card image cap">{{$secretaire->telephone}}</h6>
      <h6><img class="img"    src="{{URL::asset('/img/gmail.png')}}"       alt="Card image cap"> {{$secretaire->user->email}}</h6>
      <!-- Modal -->
<div class="modal fade" id="info{{$secretaire->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">
          @if ($secretaire->sexe == 'F')
            <img class="img "    src="{{URL::asset('/img/secretary.png')}}" style="width:50px;height:50px"   alt="Card image cap">
          @else
            <img class="img "    src="{{URL::asset('/img/boss.png')}}" style="width:50px;height:50px"       alt="Card image cap">
          @endif
            {{$secretaire->nom}} {{$secretaire->prenom}}
         </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
              {{--  info sart here --}}

                <div class="row">
                    <div class="col-6">
                          <h5>Cin</h5>
                    </div>
                    <div class="col-6">
                        <h6>{{$secretaire->cin}}</h6>
                    </div>
                </div>

                <div class="row">
                    <div class="col-6">
                          <h5>Adresse</h5>
                    </div>
                    <div class="col-6">
                        <h6>{{$secretaire->adrresse}}</h6>
                    </div>
                </div>

                <div class="row">
                    <div class="col-6">
                          <h5>Date de début</h5>
                    </div>
                    <div class="col-6">
                        <h6>{{$secretaire->date_debut}}</h6>
                    </div>
                </div>

                <div class="row">
                    <div class="col-6">
                          <h5>Date de naissance</h5>
                    </div>
                    <div class="col-6">
                        <h6>{{$secretaire->naissance}}</h6>
                    </div>
                </div>

                {{--  info sart here --}}
      </div>

    </div>
  </div>
</div>
      <hr>
      <div class="row">{{-- Buttons info edit / delete --}}
        <div class="col-4">
            <a href="#"><img src="{{URL::asset('/img/info.png')}}" alt="profile Pic" data-toggle="modal" data-target="#info{{$secretaire->id}}"></a>
        </div>
        <div class="col-4">
          <a href="{{url('secretaire/'.$secretaire->id.'/edit')}}">
            <button type="button" name="button">
              <img src="{{URL::asset('/img/wrench.png')}}" alt="profile Pic" >
            </button>
            </a>
        </div>
        <div class="col-4">
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
    </div>
  </div>
  <br>
@endforeach
</div>
<br>
<hr>
{{-- $technicien --}}
<div class="row">
  <div class="col-10">
    <h3>Techniciens :</h3>
  </div>
  <div class="col-2">
    <a href="/technicien/create">  <button type="button" class="btn btn-outline-primary">Nouveau</button></a>
  </div>
</div>
<br>
<div class="row">
@foreach ($techniciens as $technicien)
  <div class="col">
    <div class="col-2">
      <center>
        @if ($technicien->sexe == 'F')
          <img class="img "    src="{{URL::asset('/img/doctor.png')}}" style="width:50px;height:50px"   alt="Card image cap">
        @else
          <img class="img "    src="{{URL::asset('/img/doctor_male.png')}}" style="width:50px;height:50px"       alt="Card image cap">
        @endif
      </center>
    </div>
    <div class="col-10">
      <h5 class="">{{$technicien->nom}} {{$technicien->prenom}} </h5>
      <h6><img class="img"    src="{{URL::asset('/img/smartphone.png')}}"       alt="Card image cap">{{$technicien->telephone}}</h6>
      <h6><img class="img"    src="{{URL::asset('/img/gmail.png')}}"       alt="Card image cap"> {{$technicien->user->email}}</h6>
      <!-- Modal -->
<div class="modal fade" id="info{{$technicien->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">
          @if ($technicien->sexe == 'F')
            <img class="img "    src="{{URL::asset('/img/doctor.png')}}" style="width:50px;height:50px"   alt="Card image cap">
          @else
            <img class="img "    src="{{URL::asset('/img/doctor_male.png')}}" style="width:50px;height:50px"       alt="Card image cap">
          @endif
            {{$technicien->nom}} {{$technicien->prenom}}
         </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
              {{--  info sart here --}}

                <div class="row">
                    <div class="col-6">
                          <h5>Cin</h5>
                    </div>
                    <div class="col-6">
                        <h6>{{$technicien->cin}}</h6>
                    </div>
                </div>

                <div class="row">
                    <div class="col-6">
                          <h5>Adresse</h5>
                    </div>
                    <div class="col-6">
                        <h6>{{$technicien->adrresse}}</h6>
                    </div>
                </div>

                <div class="row">
                    <div class="col-6">
                          <h5>Date de début</h5>
                    </div>
                    <div class="col-6">
                        <h6>{{$technicien->date_debut}}</h6>
                    </div>
                </div>

                <div class="row">
                    <div class="col-6">
                          <h5>Date de naissance</h5>
                    </div>
                    <div class="col-6">
                        <h6>{{$technicien->naissance}}</h6>
                    </div>
                </div>

                {{--  info sart here --}}
      </div>

    </div>
  </div>
</div>
      <hr>
      <div class="row">{{-- Buttons info edit / delete --}}
        <div class="col-4">
            <a href="#"><img src="{{URL::asset('/img/info.png')}}" alt="profile Pic" data-toggle="modal" data-target="#info{{$technicien->id}}"></a>
        </div>
        <div class="col-4">
          <a href="{{url('technicien/'.$technicien->id.'/edit')}}">
            <button type="button" name="button">
              <img src="{{URL::asset('/img/wrench.png')}}" alt="profile Pic" >
            </button>
            </a>
        </div>
        <div class="col-4">
          <form class="" action="{{url('technicien/'.$technicien->id)}}" method="post">
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
    </div>
  </div>
  <br>
@endforeach
</div>
</div>{{-- end container --}}

@endsection
