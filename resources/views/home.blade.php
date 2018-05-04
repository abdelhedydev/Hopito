@extends('layouts.app')

@section('content')


<div class="container">
  <p>

  </p>
<h4>Aujourd'hui</h4>


@if (count($parameters['rdv'])<=0)
  <h6>Pas de rendez-vous ...</h6>
@else
<div class="card-deck">
    @foreach($parameters['rdv_today'] as $rdv )
  {{-- rdv aujourd'jui  --}}
  <div class="col-3">
    <div class="card border-light mb-3 " style="width: 12rem;">
      <div class="card-header">
        {{ $rdv->patient->nom}} {{ $rdv->patient->prenom}}
</div>
      <div class="card-body text-center">

          @if ($rdv->etape ==1)
            <p class="card-text text-success">Étape {{$rdv->etape}}  </p>
          @elseif ($rdv->etape == 2)
              <p class="card-text text-danger">Étape {{$rdv->etape}}  </p>
          @elseif ($rdv->etape > 2)
                <p class="card-text text-warning ">Étape {{$rdv->etape}}  </p>
          @endif
          {{-- progressbar --}}
        <div class="progress">
          @foreach ($parameters['query'] as $k)
          @if ($k->patient_id == $rdv->patient_id)
<div class="progress-bar" role="progressbar" style="width:{{ floor(($k->nbr / $rdv->valeur)*100)+10}}%;" aria-valuenow="{{ $k->nbr}}" aria-valuemin="0" aria-valuemax="{{$rdv->valeur}}">{{ floor(($k->nbr / $rdv->valeur)*100)}}%</div>
@break;
          @endif
          @endforeach
        </div>
<br>
        <center>
          <a href="#" class="btn btn-outline-light text-dark">
            <img src="{{URL::asset('/img/clock.png')}}" alt="profile Pic" >{{$rdv->time}}</a>
            <p>Total : {{$rdv->valeur}}</p>
        </center>

      </div>
      {{-- card footer --}}
      <div class="card-footer text-center">
  <a href="{{$rdv->id}}/exam">Test</a>
</div>
    </div>{{--end crd  --}}
    <br>
  </div>

    @endforeach

</div>
@endif {{-- end of rdv ajrd'hui --}}
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
             <td>{{ $rdv->patient->nom}} {{ $rdv->patient->prenom}}</td>
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
