@extends('layouts.dashboard')
@section('content')

<h1>Turmas</h1>

<a href="/turmas/create" class="btn btn-default">Inserir</a>

<table class="table table-striped">
  <thead>
    <tr>
      <th>Turma</th>
      <th>Status</th>
      <th>Nota média</th>
      <th>Início</th>
      <th>Término</th>
      <th>Alunos</th>
    </tr>
  </thead>
  <tbody>
  @foreach ($turmas as $t)
  <tr>
    <td><a href="/turmas/{{ $t->turma }}">{{ $t->descricao }}</a> </td>
    <td>{{ $t->status }}</td>
    <td>{{ $t->notamedia }}</td>
    <td>{{ $t->datainicio }}</td>
    <td>{{ $t->datatermino }}</td>
    <td><a href="/listalunos/{{ $t->turma }}">{{ $t->alunos }}</a></td>
  </tr>

  @endforeach
  </tbody>
</table>

@endsection
