@extends('layouts.app')

@section('content')
<div class="container" id="app">
  <div class="row">
    <div class="col-9">
      <h3>Tests</h3>
      <br>
      <div class="row">
        {{-- list of Exams --}}
        @if (count($exams)>0 )
          <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Score</th>
                <th scope="col">Tech</th>
                <th scope="col">Examen</th>
                <th scope="col">Date</th>
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody>
            
           @foreach ($exams as $exam)
             @if ($exam->rdv_id == $id)
               <tr>
                 <th scope="row">{{$exam->id}}</th>
                 <td>{{$exam->score}} / {{$exam->max}}</td>
                 <td>{{$exam->user->name}}  </td>
                 <td>{{$exam->test->nom}} / {{$exam->test->category}}  </td>
                 <td>{{$exam->created_at}}</td>
                 <td>
                   <form class="" action="{{url('exam/'.$exam->id)}}" method="post">
                         {{csrf_field()}}
                       <input type="hidden" name="_method" value="DELETE" >
                       <a href="" >
                         <button type="submit" class="btn btn-outline-primary" name="button">
                           <img src="{{URL::asset('/img/garbage.png')}}" alt="profile Pic" >
                         </button>
                       </a>
                     </form>
                 </td>
               </tr>
             @endif
                @endforeach
              </tbody>
            </table>
        @else
          <h6>0 test a été affecté</h6>
        @endif
      </div>
    </div>
    <div class="col-3">
        <div class="list-group" >
           <h6>Faire un test :</h6>
          @if (count($tests))
            @foreach ($tests as $test)
                  <button class="list-group-item list-group-item-action" type="button" data-toggle="modal" data-target="#info{{$test->id}}" type="button"> {{$test->nom}} / {{$test->category}}</button>
                <!-- Modal -->
                <div class="modal fade" id="info{{$test->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Examen</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                              @if (count($test->item))
                                <table class="table table-striped">
                                                         <thead>
                                                           <tr>
                                                             <th scope="col">#</th>
                                                             <th scope="col">Test</th>
                                                             <th scope="col">Réponse</th>
                                                           </tr>
                                                         </thead>
                                                         <tbody>
                                                              <!-- Test -->
                                                              @foreach ($test->item as $item)
                                                             <tr>
                                                               <th scope="row">{{$item->nom}}</th>
                                                               <td>
                                                                 @if ($item->icon)
                                                                   <img style="width:40px;height:40px;" src="{{asset('storage/img/'.$item->icon)}}" alt="">
                                                                 @else
                                                                   <img style="width:40px;height:40px;" src="{{URL::asset('/img/to-do.png')}}" alt="">
                                                                 @endif
                                                               <td>
                                                            <input type="checkbox" name="" id="{{$item->id}}" onclick="calcul(this)" value="">
                                                               </td>
                                                             </tr>
                                                              @endforeach


                                                         </tbody>
                                  </table>
                                  {{-- form new exam --}}
                                  <form class="form-horizontal" action ="{{ url('exam') }}" enctype="multipart/form-data"  method="post" id="form{{$test->id}}">
                                    {{csrf_field()}}
                                      <!-- Password input-->
                                      <div class="input-group mb-3">
                                                  <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1">
                                                      Score
                                                    </span>
                                                  </div>
                                                  <input type="number" class="form-control"  id="score_val" placeholder="0"  name="score" required />
                                                  </div>

                                      <input type="hidden" name="rdv_id" value="{{$id}}" name="rdv_id"/>
                                      <input type="hidden" name="test_id" value="{{$test->id}}" name="test_id"/>
                                      <input type="hidden" name="max" value="{{count($test->item)*10}}" name="max"/>

                                    </form>

                              @else
                                <h6 class="text-primary">Ce Test n'a pas encore des elements</h6>
                              @endif

                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">fermer</button>
                            <button type="submit" form="form{{$test->id}}" class="btn btn-primary" >Ajouter</button>
                          </div>
                        </div>
                      </div>
                    </div>
            @endforeach
          @else
            <h4>Pas de Test</h4>
          @endif
        </div>
    </div>


  </div>
<br>


</div>
<script>
var score = 0;

function calcul(cb){
  if (cb.checked) {
    score += 10;
    document.getElementById("score_val").value = score;
  }
  else {
    score -=10;
    document.getElementById("score_val").value = score;
  }

}
function affiche(){
  document.getElementById("score_val").value = score;
}
</script>


@endsection
