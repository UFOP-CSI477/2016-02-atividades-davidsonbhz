@extends('layouts.dashboard')
@section('content')

<h1>Provas</h1>
@if(Auth::check())
   @if(Auth::user()->grupo == 1 || Auth::user()->grupo == 2)
      <a href="/p/create" class="btn btn-primary fa fa-user-plus"> Adicionar </a>
   @endif
@endif

@if(Session::has('info'))
    <br>
    <div class="col-md-4 col-md-offset-4 alert alert-danger" align="center">{{ Session::get('info') }}</div>
@endif

<table class="table table-striped">
  <thead>
    <tr>
      <th>Título</th>
      <th>Tipo</th>
      <th>Data</th>
    </tr>
  </thead>
<tbody>
    @foreach ($pr as $p)
      <tr>
        <td><a href="/p/{{ $p->prova }}">{{ $p->titulo }}</a></td>
        <td>
          @if($p->tipo == "PROVA") Processo Seletivo @endif
          @if($p->tipo == "SIMULADO") Simulado @endif
        </td>
        <?php $data = date('d/m/Y', strtotime($p->data)); ?>
        <td>{{ $data }}</td>
      </tr>
    @endforeach
    </tbody>
</table>
@endsection
