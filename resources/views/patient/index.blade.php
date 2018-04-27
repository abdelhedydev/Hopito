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
      <th scope="col">Interlocuteur</th>
      <th scope="col">Date de naissance</th>
      <th scope="col">Telephone</th>
      <th scope="col">Lettre</th>
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
        <td>{{$patient->responsable_full_name}} / {{$patient->responsable}}</td>
        <td>{{$patient->naissance}} </td>
        <td>{{$patient->telephone}}</td>
        <td>{{$patient->lettre}}</td>
        <td>
          <a href="#"><img src="{{URL::asset('/img/info.png')}}" alt="profile Pic" data-toggle="modal" data-target="#info{{$patient->id}}" ></a>
          <!-- Modal Info-->
          <div class="modal fade" id="info{{$patient->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">{{$patient->nom}} {{$patient->prenom}}</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <h4><img src="{{URL::asset('/img/parent.png')}}" alt="profile Pic" > <u>Interlocuteur</u> :  {{$patient->responsable_full_name}}</h4>
                      <h5>Telephone : {{$patient->telephone}}</h5>
                      <h5>Cin : {{$patient->telephone}}</h5>
                      <h5>Role : {{$patient->responsable}}</h5>
                      <br>
                  <h4><img src="{{URL::asset('/img/child.png')}}" alt="profile Pic" ><u>Patient</u></h4>
                  <h5>Date  : {{$patient->naissance}}</h5>
                  <h5>Adresse : {{$patient->adresse}}</h5>
                  <h5>Sexe : @if ($patient->responsable == 'F') Femme @else Homme @endif</h5>
                  <h5>Nbre fr & Sr : {{$patient->nbre_fr_sr}}</h5>
                  <h5>Garde : {{$patient->garde}}</h5>
                </div>

              </div>
            </div>
            </div>
            {{-- end Modal --}}
        </td>
        <td>
          <a href="#"><img src="{{URL::asset('/img/calendar.png')}}" alt="profile Pic" data-toggle="modal" data-target="#myModal{{$patient->id}}" ></a>
          <!-- Modal RDV-->
            <div class="modal fade" id="myModal{{$patient->id}}" >
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Ajouter rendez-vous</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                  </div>
                  <div class="modal-body">
                    <form class="form-horizontal" action ="{{ url('rende') }}"  method="post" id="form{{$patient->id}}">
                      {{csrf_field()}}
                        <fieldset>
                        <!-- Password input-->
                        <div class="form-group">
                          <label class="col-lg-4 control-label" for="passwordinput" >Date</label>
                          <div class="col-md-12">
                            <input required name="date" type="date" placeholder="" class="form-control input-md">
                          </div>
                        </div>

                        <!-- Text input-->
                        <div class="form-group">
                          <label class="col-md-4 control-label" for="textinput">Time</label>
                          <div class="col-12">
                            <input required class="form-control" name="time" type="time" value="10:05:00" id="example-time-input">
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="col-md-4 control-label" for="textinput">Valeur</label>
                          <div class="col-12">
                          @if (count($query)>0)
                              @foreach ($query as $k)
                              @if ($k->patient_id == $patient->id)
                              <input required class="form-control" type="number" value="{{$k->valeur}}" name="valeur">
                              <small id="passwordHelpInline" class="text-muted">
                                  nombre des anciens rendez-vous  {{$k->nbr}} / Etape  {{$k->etape}}
                                </small>
                              @break;
                              {{-- Patient n'a ps de rdv--}}
                            @endif
                          @endforeach
                {{-- no query --}}
                        @else
                            <input required class="form-control" type="number" name="valeur" placeholder="000">
                            @endif

                            </div>
                        </div>


          <div class="form-group">

    <label class="col-md-4 control-label" for="exampleFormControlSelect1">Etape  Traitement</label>
    <div class="col-12">
      @if(count($query)>0)
          @foreach ($query as $k)
              @if  (($k->patient_id == $patient->id)&&($k->nbr == $k->valeur))
                <input class="form-control " id="disabledInput" type="text" placeholder="Etape" value="{{$k->etape+1}}" name="etape"  >
                @break;
              @elseif (($k->patient_id == $patient->id)&&($k->nbr < $k->valeur))
                <input class="form-control" id="disabledInput" type="text" placeholder="Etape" value="{{$k->etape}}" name="etape"  >
                @break;

              @endif
        @endforeach
      {{-- no query (pas de rendez vous) --}}
    @else
      <input class="form-control" id="disabledInput" type="text" placeholder="Etape" value="1" name="etape"  >
    @endif
  </div>
  </div>
                        </fieldset>
                        <input type="hidden" name="id_patient" value="{{$patient->id}}"/>
                      </form>

                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
                    <button type="submit" form="form{{$patient->id}}" class="btn btn-primary">Ajouter</button>
                  </div>
                </div>
              </div>
            </div>
            {{-- end Modal --}}
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
