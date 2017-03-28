@extends('layouts.dashboard')

@section('content')

<h1>Turma</h1>
  <form method="post" action="/turmas/{{$turma->id}}">

  {{method_field('DELETE')}} <!-- http nao implementa -->
  {{csrf_field()}}

    <p><b>Dias da semana: </b>{{ $turma->diasdasemana }}</p>
    <p><b>Horário: </b>{{ $turma->horario }}</p>
    <p><b>Status: </b>{{ $turma->status }}</p>
    <p><b>Capacidade: </b>{{ $turma->capacidade }}</p>
    <p><b>Sala: </b>{{ $turma->sala }}</p>
    <p><b>Nota média: </b>{{ $turma->notamedia }}</p>
    <p><b>Data de início: </b>{{ $turma->datainicio }}</p>
    <p><b>Data de término:</b>{{ $turma->datatermino }}</p>
    <p><b>Descrição: </b>{{ $turma->descricao }}</p>
    <br>
    <br>
    <a href="/turmas/{{$turma->turma}}/edit" class="btn btn-primary"> Editar </a>

    <input type="submit" class="btn btn-danger" value="Excluir" />

    <a href="/turmas" class="btn btn-primary"> Voltar </a>


  </form>
  @endsection
