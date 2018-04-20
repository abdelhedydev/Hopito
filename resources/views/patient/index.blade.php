@extends('layouts.app')

@section('content')
<div class="container">
<a href="/patient/create">  <button type="button" class="btn btn-outline-primary">Ajouter un Patient</button>
</a>
<br>
<br>
<table class="table">
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
          <a href="#"><img src="{{URL::asset('/img/calendar.png')}}" alt="profile Pic" data-toggle="modal" data-target="#myModal{{$patient->id}}" ></a>
          <!-- Modal -->
            <div class="modal fade" id="myModal{{$patient->id}}" >
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Ajouter rdv</h4>
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
                            <input required name="date" type="date" placeholder="+216 97 555 666" class="form-control input-md">
                          </div>
                        </div>

                        <!-- Text input-->
                        <div class="form-group">
                          <label class="col-md-4 control-label" for="textinput">Time</label>
                          <div class="col-12">
                            <input required class="form-control" name="time" type="time" value="13:45:00" id="example-time-input">
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="col-md-4 control-label" for="textinput">Valeur</label>
                          <div class="col-12">
                            <input required class="form-control" type="number" name="valeur">
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="col-md-4 control-label" for="textinput">Etape</label>
                          <div class="col-12">
                            <input required class="form-control" type="number" min="0" max="1" name="etape">
                          </div>
                        </div>
                        </fieldset>
                        <input type="hidden" name="id_patient" value="{{$patient->id}}"/>
                      </form>

                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" form="form{{$patient->id}}" class="btn btn-primary">Save changes</button>
                  </div>
                </div>
              </div>
            </div>
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
