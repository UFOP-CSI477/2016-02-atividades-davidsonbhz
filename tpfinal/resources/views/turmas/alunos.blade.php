@extends('layouts.dashboard')
@section('content')

<h1>{{$turma->descricao}}</h1>

<table class="table table-striped">
  <thead>
    <tr>
      <th>Nome</th>
      <th>Email</th>
      <th>Status</th>
    </tr>
  </thead>
  <tbody>
  @foreach ($alunos as $a)
  <tr>
      <td><a href="/profile/{{$a->usuario}}"> {{ $a->nome }} </a></td>
    <td>{{ $a->email }}</td>
    <td>{{ $a->status }}</td>
  </tr>

  @endforeach
  </tbody>
</table>

@endsection
