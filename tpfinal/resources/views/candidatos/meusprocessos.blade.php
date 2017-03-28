@extends('layouts.dashboard')
@section('content')

<h1>Meus Processos</h1>



  @if(Session::has('info'))
      <br>
      <div class="col-md-4 col-md-offset-4 alert alert-danger" align="center">{{ Session::get('info') }}</div>
  @endif

  <table class="table table-striped">
    <thead>
      <tr>
        <th>Título</th>
        <th>Status</th>
        <th>Comprovante de Inscrição</th>

      </tr>
    </thead>
    <tbody>
        @foreach($var as $v)
      <tr>
        <td>{{ $v->titulo }}</td>
        <td>{{ $v->status }}</td>
        <td><a href="">Download</a></td>
      </tr>
        @endforeach
      </tbody>
  </table>
@endsection
