@extends('layouts.app')

@section('content')
<div class="container">
  <form class="" action ="{{ url('patient') }}"  method="post">
   {{csrf_field()}}
   <h1>Ajouter un rdv au patient x</h1>
  <div class="form-row">
    <div class="form-group col-md-6">
        <label for="inputZip">Date de naissance</label>
        <input type="date" class="form-control" id="naissance" name="naissance">
    </div>
  </div>
  <div style="overflow:hidden;">
    <div class="form-group">
        <div class="row">
            <div class="col-md-8">
                <div id="datetimepicker12"></div>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript">
        $(function () {
            $('#datetimepicker12').datetimepicker({
                inline: true,
                sideBySide: true
            });
        });
    </script>
</div>
  <button type="submit" class="btn btn-success">Enregistrer</button>
</form>
</div>
@endsection
