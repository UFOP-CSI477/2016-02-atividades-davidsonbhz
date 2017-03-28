@extends('layouts.dashboard')
@section('content')

<h1>Inserir Disciplinas</h1>
  <form method="post" action="/disciplinas">

    {{csrf_field()}}

    <div class="form-group">
      <label for="descricao"> Descrição </label>
      <input type="text" class="form-control" name="descricao"/>
    </div>
    <div class="form-group">
      <label for="codigo"> Código </label>
      <input type="text" class="form-control" name="codigo"/>
    </div>
    <div class="form-group">
        <label for="notamedia"> Nota média </label>
      <input type="text" class="form-control" name="notamedia"/>
    </div>
    <div class="form-group">
        <label for="peso"> Peso </label>
      <input type="text" class="form-control" name="peso"/>
    </div>
    <div class="form-group">
        <label for="notamedia"> Ordem </label>
      <input type="text" class="form-control" name="ordem"/>
    </div>


    <input type="submit" class="btn btn-primary" value="Salvar" />

    <a href="/disciplinas" class="btn btn-primary"> Voltar </a>
  </form>
@endsection
