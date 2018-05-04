@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-10">
      <h3>Tests</h3>
    </div>
    <div class="col-2">
      <!-- Button trigger modal -->
  <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#newtest">
    Nouveau
    </div>
</button>

  </div>
<br>
@if (count($tests))
    <div class="list-group">
        @foreach ($tests as $test)
            <div class="row">

              <div class="col-10">
                <button type="button" class="list-group-item list-group-item-action" >  {{$test->nom}} / {{$test->category}}
                </button>
                @foreach ($items as $item)
                  @if ($item->test_id == $test->id)
                      <div class="card-body">
                          <div class="row">
                              <div class="col-2">
                                @if ($item->icon)
                                  <img style="width:40px;height:40px;" src="{{asset('storage/img/'.$item->icon)}}" alt="">
                                @else
                                  <img style="width:40px;height:40px;" src="{{URL::asset('/img/to-do.png')}}" alt="">
                                @endif
                              </div>
                              <div class="col-9">
                                  {{$item->nom}}
                              </div>
                              <div class="col-1">
                                <form class="" action="{{url('item/'.$item->id)}}" method="post">
                                      {{csrf_field()}}
                                    <input type="hidden" name="_method" value="DELETE" >
                                    <a href="" >
                                      <button type="submit" class="btn btn-outline-primary" name="button">
                                        <img src="{{URL::asset('/img/garbage.png')}}" alt="profile Pic" >
                                      </button>
                                    </a>
                                  </form>
                              </div>
                          </div>
                      </div>
                  @endif
                @endforeach

              </div>

              {{-- Item --}}
              <div class="col-1">
                <a href="#"><img src="{{URL::asset('/img/to-do.png')}}" style="width:25px;height:25px" alt="profile Pic" data-toggle="modal" data-target="#info{{$test->id}}" ></a>
                <!-- Modal new item -->
                <div class="modal fade" id="info{{$test->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Nouveau Question</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        {{-- form new test --}}
                        <form class="form-horizontal" action ="{{ url('item') }}" enctype="multipart/form-data"  method="post" id="newitemform">
                          {{csrf_field()}}
                            <!-- Password input-->
                            <div class="form-group">
                              <label class="col-lg-4 control-label" for="passwordinput" >Nom</label>
                              <div class="col-md-12">
                                <input required name="nom" type="text" placeholder="Nom du Test" class="form-control input-md">
                              </div>
                            </div>

                            <!-- Text input-->
                            <div class="form-group">
                              <label class="col-md-4 control-label" for="textinput">Icon</label>
                              <div class="col-12">
                                <input  class="form-control" name="icon" type="file"  placeholder="icon du question"  id="example-time-input">
                              </div>
                            </div>

                            <input type="hidden" name="test_id" value="{{$test->id}}"/>

                          </form>
                        {{-- end form new test --}}
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                        <button type="submit" form="newitemform" class="btn btn-primary">Ajouter</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-1">
                <form class="" action="{{url('test/'.$test->id)}}" method="post">
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
              <br>
        @endforeach
    </div>
@else
  <h6>Pas encours des Tests</h6>
@endif

</div>
<!-- Modal new test -->
<div class="modal fade" id="newtest" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Nouveau Test</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        {{-- form new test --}}
        <form class="form-horizontal" action ="{{ url('test') }}"  method="post" id="newtestform">
          {{csrf_field()}}
            <!-- Password input-->
            <div class="form-group">
              <label class="col-lg-4 control-label" for="passwordinput" >Nom</label>
              <div class="col-md-12">
                <input required name="nom" type="text" placeholder="Nom du Test" class="form-control input-md">
              </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
              <label class="col-md-4 control-label" for="textinput">Catégorie</label>
              <div class="col-12">
                <input required class="form-control" name="category" type="text"  placeholder="Categorie de test"  id="example-time-input">
              </div>
            </div>


          </form>
        {{-- end form new test --}}
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
        <button type="submit" form="newtestform" class="btn btn-primary">Ajouter</button>
      </div>
    </div>
  </div>
</div>


@endsection
