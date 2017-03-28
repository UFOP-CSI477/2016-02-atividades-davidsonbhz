@extends('layouts.dashboard')
@section('content')

<h1>Disciplinas</h1>

  <a href="/disciplinas/create" class="btn btn-default">Inserir Disciplina</a>
    <table class="table table-striped">
      <thead>
        <tr>
          <th>Descrição</th>
          <th>Código</th>
        </tr>
      </thead>
    <tbody>
    @foreach ($disciplinas as $d)
      <tr>
        <td><a href="/disciplinas/{{ $d->disciplina }}">{{ $d->descricao }}</a> </td>
        <td>{{ $d->codigo }}</td>
      </tr>
    @endforeach
    </tbody>
  </table>
@endsection
