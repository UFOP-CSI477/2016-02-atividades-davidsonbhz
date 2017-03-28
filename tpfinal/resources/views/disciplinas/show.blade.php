@extends('layouts.dashboard')
@section('content')

<h1>Informações da Disciplina</h1>
  <form method="post" action="/disciplinas/{{$disciplina->id}}">

  {{method_field('DELETE')}} <!-- http nao implementa -->
  {{csrf_field()}}
  <div class="form-group">
    <p><b>Descrição:</b>   {{ $disciplina->descricao }}</p>
    <p><b>Codigo:</b>   {{ $disciplina->codigo }}</p>
    <p><b>Nota média:</b>   {{ $disciplina->notamedia}}</p>
    <p><b>Peso:</b>   {{ $disciplina->peso}}</p>
    <p><b>Ordem:</b>   {{ $disciplina->ordem}}</p>
  </div>
  <a href="/disciplinas/{{$disciplina->disciplina}}/edit" class="btn btn-primary"> Editar </a>

  <input type="submit" class="btn btn-danger" value="Excluir" />

  <a href="/disciplinas" class="btn btn-primary"> Voltar </a>


</form>
@endsection
