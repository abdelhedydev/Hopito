@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-10">
      <h3>Tests</h3>
      <br>
      <div class="row">
        {{-- list of Exams --}}
        @if (count($exams))
            <div class="list-group">
                @foreach ($exams as $exam)
                    <div class="row">

                      <div class="col-10">
                        <button type="button" class="list-group-item list-group-item-action" >  {{$exam->id}} / {{$exam->id}}
                        </button>

                      </div>

                    </div>
                      <br>
                @endforeach
            </div>
        @else
          <h6>0 test a été affecté</h6>
        @endif
      </div>
    </div>
    <div class="col-2">
        <div class="list-group" >
           <h6 >Choissir un test</h6>
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
                                  @foreach ($test->item as $item)
                                    {{$item->nom}}
                                  @endforeach
                              @else
                                <h6 class="text-primary">Ce Test n'a pas encore des elements</h6>
                              @endif

                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
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



@endsection
