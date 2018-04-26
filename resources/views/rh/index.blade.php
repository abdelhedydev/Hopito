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
        <p class="">#{{$secretaire->id}}</p>

      </center>
    </div>
    <div class="col-10">
      <h5 class="">{{$secretaire->nom}} {{$secretaire->prenom}} </h5>
      <h6><img class="img"    src="{{URL::asset('/img/smartphone.png')}}"       alt="Card image cap">{{$secretaire->telephone}}</h6>
      <h6 class="">{{$secretaire->naissance}}</h6>
      <a data-toggle="modal" data-target="#info{{$secretaire->id}}" ><span class="badge badge-success">login</span></a>
      <!-- Modal -->
<div class="modal fade" id="info{{$secretaire->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ajouter un utilisateur </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            {{-- form login sart here --}}


                            <div class="card-body">
                                <form method="POST" action="{{ route('register') }}">
                                    @csrf

                                    <div class="form-group row">
                                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                        <div class="col-md-6">
                                            <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{$secretaire->nom}}" required autofocus>

                                            @if ($errors->has('name'))
                                                <span class="invalid-feedback">
                                                    <strong>{{ $errors->first('name') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                        <div class="col-md-6">
                                            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                            @if ($errors->has('email'))
                                                <span class="invalid-feedback">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                        <div class="col-md-6">
                                            <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                            @if ($errors->has('password'))
                                                <span class="invalid-feedback">
                                                    <strong>{{ $errors->first('password') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                        <div class="col-md-6">
                                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                        </div>
                                    </div>

                                    <div class="form-group row mb-0">
                                        <div class="col-md-6 offset-md-4">
                                            <button type="submit" class="btn btn-primary">
                                                {{ __('Register') }}
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>

            {{-- form login end here --}}
      </div>

    </div>
  </div>
</div>
      <hr>
      <div class="row">{{-- Buttons edit / delete --}}
        <div class="col">
          <a href="{{url('secretaire/'.$secretaire->id.'/edit')}}">
            <button type="button" name="button">
              <img src="{{URL::asset('/img/wrench.png')}}" alt="profile Pic" >
            </button>
            </a>
        </div>
        <div class="col">
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
      <p class="text-center">#{{$technicien->id}}</p>
    </div>
    <div class="col-10">
      <h5 class="">{{$technicien->nom}} {{$technicien->prenom}} </h5>
      <h6><img class="img"    src="{{URL::asset('/img/smartphone.png')}}"       alt="Card image cap">{{$technicien->telephone}}
</h6>
      <p class="">{{$technicien->naissance}}</p>
      <div class="row">{{-- Buttons edit / delete --}}
        <div class="col">
          <a href="{{url('technicien/'.$technicien->id.'/edit')}}">
            <button type="button" name="button">
              <img src="{{URL::asset('/img/wrench.png')}}" alt="profile Pic" >
            </button>
            </a>
        </div>
        <div class="col">
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
