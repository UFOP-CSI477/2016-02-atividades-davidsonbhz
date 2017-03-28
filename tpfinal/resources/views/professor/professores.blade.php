@extends('layouts.dashboard')
@section('content')

<h1>Professores</h1>

<table class="table table-striped">
  <thead>
    <tr>
      <th>Nome</th>
      <th>Email</th>
      <th> </th>
    </tr>
  </thead>
  <tbody>
  @foreach ($lista as $a)
  <tr>
      <td><a href="/profile/{{$a->usuario}}"> {{ $a->nome }} </a></td>
    <td>{{ $a->email }}</td>
    <td> <a href="/admin/professor/disciplinas/{{$a->usuario}}">Disciplinas</a> </td>
  </tr>

  @endforeach
  </tbody>
</table>

@endsection
