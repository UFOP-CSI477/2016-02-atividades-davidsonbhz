@extends('layouts.dashboard')

@section('content')

      <h1>Editar Turma</h1>
        <form method="post" action="/turmas/{{$turma->id}}">

        {{method_field('PATCH')}} <!-- http nao implementa -->
        {{csrf_field()}}
        <div class="form-group">
          <label for="diasdasemana"> Dias da semana </label>
          <input type="text" class="form-control" name="diasdasemana" value="{{$turma->diasdasemana}}"/>
        </div>
        <div class="form-group">
          <label for="horario"> Horário </label>
          <input type="text" class="form-control" name="horario" value="{{$turma->horario}}"/>
        </div>
        <div class="form-group">
          <label for="datainicio"> Início </label>
          <input type="date" class="form-control" name="datainicio" value="{{$turma->datainicio}}"/>
        </div>
        <div class="form-group">
          <label for="datatermino"> Término </label>
          <input type="date" class="form-control" name="datatermino" value="{{$turma->datatermino}}"/>
        </div>
        <div class="form-group">
          <label for="capacidade"> Capacidade </label>
          <input type="text" class="form-control" name="capacidade" value="{{$turma->capacidade}}"/>
        </div>
        <div class="form-group">
          <label for="sala"> Sala</label>
          <input type="text" class="form-control" name="sala" value="{{$turma->sala}}"/>
        </div>
        <div class="form-group">
          <label for="status"> Status </label>
          <select name="status">
              <option value='ATIVO'> Ativo</option>
              <option value='INATIVO'> Inativo</option>
          </select>
        </div>
        <div class="form-group">
          <label for="notamedia">Nota média</label>
          <input type="text" class="form-control" name="notamedia" value="{{$turma->notamedia}}"/>
        </div>
        <div class="form-group">
          <label for="descricao">Descrição</label>
          <input type="text" class="form-control" name="descricao" value="{{$turma->descricao}}"/>
        </div>

          <input type="submit" class="btn btn-primary" value="Salvar" /> <br>
        </form>
  @endsection
