@extends('layouts.app')

@section('content')


<div class="container">
  <p>

  </p>
<h4>Aujourd'hui</h4>
@if (!isset($parameters['rdv']))
  <b>pas de rdv aujourd'hui</b>
@else
<div class="row">
    @foreach($parameters['rdv_today'] as $rdv )
      @if($rdv->date==$parameters['mydate'])
  {{-- crd  --}}
  <div class="col-sm-3">
    <div class="card text-center" style="width: 12rem;">
      <div class="card-body">
        <h5 class="card-title">
          {{ $rdv->patient->nom}}
          {{ $rdv->patient->prenom}}
          </h5>
        <p class="card-text text-primary">Etape {{$rdv->etape}}  </p>
        <div class="progress">
  <div class="progress-bar" role="progressbar" style="width: 25%;" aria-valuenow="5" aria-valuemin="0" aria-valuemax="{{$rdv->valeur}}">5%</div>
</div>
<br>
        <a href="#" class="btn btn-outline-light text-dark">
          <img src="{{URL::asset('/img/clock.png')}}" alt="profile Pic" >{{$rdv->time}}</a>
          <p>Total : {{$rdv->valeur}}</p>
      </div>
    </div>
  </div>
  {{--end crd  --}}
      @endif
    @endforeach
</div>
@endif
<br>
<h4>Tous Les RDV</h4>
<table class="table table-striped table-condensed">
     <thead>
     <tr>
               <th>Nom</th>
               <th>Date</th>
               <th>Time</th>
               <th>Valeur </th>
               <th>Etape</th>
               <th></th>

           </tr>
       </thead>
       <tbody>
         @foreach($parameters['rdv'] as $rdv )


         <tr>
             <td>{{ $rdv->patient->nom}}</td>
             <td>{{$rdv->date}}</td>
             <td>{{$rdv->time}}</td>
             <td>{{$rdv->valeur}}</td>
             <td>
               {{$rdv->etape}}


             </td>
             <td>
               <form class="" action ='{{ url("rende/$rdv->id")}}'  method="post">
               <input name="_method" type="hidden" value="DELETE">
                {{ csrf_field() }}
                <input type="hidden" name="_method" value="DELETE" >
                <a href="" >
                  <button type="submit" name="button">
                    <img src="{{URL::asset('/img/garbage.png')}}" alt="profile Pic" >
                  </button>
                </a>
               </form>
            </td>
             </td>
          </tr>
         @endforeach

            </tbody>
</table>
</div>
@endsection
