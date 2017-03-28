@extends('layouts.dashboard')
@section('content')

<div algin="center"><h1>Processos seletivos</h1></div>
@if(Auth::check())
   @if(Auth::user()->grupo == 1 || Auth::user()->grupo == 2)
      <a href="/ps/create" class="btn btn-primary fa fa-user-plus"> Adicionar </a>
   @endif
@endif

@if(Session::has('info'))
    <br>
    <div class="col-md-4 col-md-offset-4 alert alert-danger" align="center">{{ Session::get('info') }}</div>
@endif

<table class="table table-striped">
  @if(Auth::check())
  <?php
    $id = Auth::user()->id;
    $grupo = Auth::user()->grupo;
  ?>
  <thead>
    <tr>
      <th>Título</th>
      <th>Ano/Período</th>
      @if($grupo == 5)
      <th>Status</th>
      @endif

    </tr>
  </thead>
<tbody>
    @foreach ($ps as $p)
    <?php
      $status = $p->status;
    ?>
      <tr>
        @if($grupo == 1 || $grupo == 2)
            <td><a href="/ps/{{ $p->processoseletivo }}">{{ $p->titulo }}</a></td>
        @else
            <td>{{ $p->titulo }}</td>
        @endif

        <td>{{ $p->ano }} / {{ $p->periodo }}</td>

        @if($grupo == 5)
        <td>
          @if($status == 'ABERTO')

          <form action="/inscrever" method="POST">

          {{csrf_field()}}
              <input type="hidden" name="_route" value="candidatos.inscrever">
              <input type="hidden" name="_method" value="GET">
              <input id="processoseletivo" type="hidden" name="processoseletivo" value="{{ $p->processoseletivo }}" autofocus>

              <input type="submit" class="btn btn-primary" value="Inscrever" />
          </form>
          @else
            {{ $p->status }}
          @endif
        </td>
        @endif
      </tr>
    @endforeach
    </tbody>
    @endif
</table>
@endsection
