@extends('layouts.dashboard')
@section('content')

<h1>Editar Disciplina</h1>
<form method="post" action="/disciplinas/{{$disciplina->id}}">

  {{method_field('PATCH')}} <!-- http nao implementa -->
  {{csrf_field()}}

      <div class="form-group">
        <label for="descricao"> Descrição </label>
        <input type="text" class="form-control" name="descricao" value="{{$disciplina->descricao}}"/>
      </div>
      <div class="form-group">
        <label for="codigo"> Código </label>
        <input type="text" class="form-control" name="codigo" value="{{$disciplina->codigo}}"/>
      </div>
      <div class="form-group">
          <label for="notamedia"> Nota média </label>
        <input type="text" class="form-control" name="notamedia" value="{{$disciplina->notamedia}}"/>
      </div>
      <div class="form-group">
          <label for="peso"> Peso </label>
        <input type="text" class="form-control" name="peso" value="{{$disciplina->peso}}"/>
      </div>
      <div class="form-group">
          <label for="notamedia"> Ordem </label>
        <input type="text" class="form-control" name="ordem" value="{{$disciplina->ordem}}"/>
      </div>

  <input type="submit" class="btn btn-primary" value="Salvar" /> <br>
</form>
@endsection
