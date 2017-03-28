
@extends('layouts.dashboard')
@section('content')


@if(empty($chamadas))

  <div class="alert alert-danger" role="alert">
    Ainda não há resultados para lista de presença.
  </div>

@else
<!--
<div class="panel panel-default">
  <div class="panel-body"><h4><strong> </strong></h4></div>
-->
  <div class="panel-body">

    <table class="table table-responsive table-striped">
      <thead>
        <tr>
          <th>Disciplina</th>
          <th>Data</th>
          <th>Falta</th>


         </tr>

      </thead>
      <tbody>
        @foreach($chamadas as $chamada)

          <tr>
            <td>{{ $chamada->descricao }}</td>
            <td>{{ $chamada->dataaula }}</td>
            <td>{{ $chamada->status }}</td>

          </tr>
          @endforeach

        </tbody>
    </table>
  </div>
<!--</div>-->
@endif

@endsection
