@extends('layouts.dashboard')
@section('content')

<h1>Minhas Notas</h1>

@if(empty($gabaritos))

  <div class="alert alert-danger" role="alert">
    Ainda não há notas para o simulado.
  </div>

@else
@foreach($gabaritos as $gabarito)
<div class="panel panel-default">
  <div class="panel-body"><h4><strong>Simulado {{ $gabarito->gabarito }}</strong></h4></div>
  <div class="panel-body">
    <table class="table table-responsive table-striped">
      <thead>
        <tr>
        	<th>Data</th>
        	<th>Nota</th>
         </tr>
        
      </thead>
      <tbody>  
          <tr>
          	<td>{{ $gabarito->data }}</td>
          	<td>{{ $gabarito->nota }}</td>
          </tr>
        </tbody>
    </table>
  </div>

  <div class="panel-body"><h4><strong>Redação: {{ $gabarito->redacao }}<strong><h4></div>
  <div class="panel-body">
    <table class="table table-responsive table-striped">
      <thead>
        <tr>
            <th>Competência 1</th>
            <th>Competência 2</th>
            <th>Competência 3</th>
            <th>Competência 4</th>
            <th>Competência 5</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>{{ $gabarito->competencia1 }}</td>
          <td>{{ $gabarito->competencia2 }}</td>
          <td>{{ $gabarito->competencia3 }}</td>
          <td>{{ $gabarito->competencia4 }}</td>
          <td>{{ $gabarito->competencia5 }}</td>
        </tr>
      </tbody>
    </table>
  </div>
</div>
@endforeach
@endif
@endsection
