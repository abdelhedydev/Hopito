@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Mes rendez-vous</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

              @if (!isset($parameters['rdv']))
                <b>pas de rdv aujourd'hui</b>
              @else
                    <div class="card-header"><h4>Mes rendez-vous ajourd'hui</h4></div>
                    <table class="table table-striped table-condensed">
                         <thead>
                         <tr>
                                   <th>Nom</th>
                                   <th>Date</th>
                                   <th>Time</th>
                                   <th>Valeur </th>
                                   <th>Etape</th>

                               </tr>
                           </thead>
                           <tbody>
                             @foreach($parameters['rdv'] as $rdv )
                             @if($rdv->date==$parameters['mydate'])


                             <tr>
                                 <td>heni</td>
                                 <td>{{$rdv->date}}</td>
                                 <td>{{$rdv->time}}</td>
                                 <td>{{$rdv->valeur}}</td>
                                 <td>
                                   @if($rdv->etape==1)
                                    sain
                                   @else
                                    malade
                                   @endif

                                 </td>
                                 <td>
                                    <form class="" action ='{{ url("rende/$rdv->id")}}'  method="post">
                                      <input name="_method" type="hidden" value="DELETE">
                                      {{ csrf_field() }}
                                      <input type="submit" class="btn btn-sm btn-primary btn-block" role="button"/></td>
                                    </form>
                                 </td>
                              </tr>
                              @endif
                             @endforeach

                                </tbody>
                              </div>
                            </div>
                          </div>
                         </div>
                     </div>
                     </form>
                   </table>

            @endif


            @if (!isset($parameters['rdv']))
            @else

            <br><br><br>
              <div class="card-header"><h4>Tout mes rdv</h4></div>
                  <table class="table table-striped table-condensed">
                       <thead>
                       <tr>
                                 <th>Nom</th>
                                 <th>Date</th>
                                 <th>Time</th>
                                 <th>Valeur </th>
                                 <th>Etape</th>

                             </tr>
                         </thead>
                         <tbody>
                           @foreach($parameters['rdv'] as $rdv )


                           <tr>
                               <td>heni</td>
                               <td>{{$rdv->date}}</td>
                               <td>{{$rdv->time}}</td>
                               <td>{{$rdv->valeur}}</td>
                               <td>
                                 @if($rdv->etape==1)
                                  sain
                                 @else
                                  malade
                                 @endif

                               </td>
                               <td>
                                 <form class="" action ='{{ url("rende/$rdv->id")}}'  method="post">
                                 <input name="_method" type="hidden" value="DELETE">
                                  {{ csrf_field() }}
                                 <input type="submit" class="btn btn-sm btn-primary btn-block" role="button"/></td>
                               </form>
                              </td>
                               </td>
                            </tr>
                           @endforeach

                              </tbody>
                            </div>
                          </div>
                        </div>
                       </div>
                   </div>
                   </form>
                 </table>

          @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
