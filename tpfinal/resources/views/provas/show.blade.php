@extends('layouts.dashboard')
@section('content')

<h1>Dados da Prova</h1>
<div align="center">
    <form method="post" action="/p/{{$p->prova}}">
        {{method_field('DELETE')}}
        {{csrf_field()}}

        <?php
            $dataprova = date('Y-m-d', strtotime($p->data));
            $d = date('Y-m-d');
        ?>

        Título: {{ $p->titulo }}</br>
        Data da prova: {{ $dataprova }}</br>
        Tipo:
        @if($p->tipo == "PROVA") Processo Seletivo @endif
        @if($p->tipo == "SIMULADO") Simulado @endif
        </br>

        <br><br>
        @if(Auth::check())
           @if(Auth::user()->grupo == 1 || Auth::user()->grupo == 2)
               @if(strtotime($dataprova) > strtotime($d))
                  <a href="/pi/create" class="btn btn-primary fa fa-user-plus"> Adicionar Questão </a>
                  <a href="/p/{{$p->prova}}/edit" class="btn btn-primary fa fa-edit"> Editar Prova </a>
               @endif
           @endif
           @if(Auth::user()->grupo == 1)
               <button type="submit" class="btn btn-danger fa fa-eraser"> Excluir Prova </button>
           @endif
        @endif
        <a href="/p" class="btn btn-primary fa fa-mail-reply"> Voltar </a>
    </form>
    <br><br>
</div>

<table class="table table-striped">
  <thead>
    <tr>
      <th>Questão</th>
      <th>Enunciado</th>
      <th>Disciplina</th>
      <th>Resposta correta</th>
      <th>Valor</th>
    </tr>
  </thead>
<tbody>
    @if($dados != NULL)
      @if($dados[0]->questao == 0) <?php $i = 1; ?>
      @else <?php $i = 0; ?>
      @endif
    @else <?php $i = 0; ?>
    @endif

    @foreach ($dados as $d)
      <tr>
        <td>{{ $d->questao + $i }}</td>
        <td><a href="/pi/{{$d->pi}}">{{ $d->enunciado }}</a></td>
        <td>{{ $d->disciplina }}</td>
        <td>{{ $d->resposta }}</td>
        @if($d->tipo == "PROVA")
            <td>{{ $d->valor * $d->peso }}</td>
        @endif
        @if($d->tipo == "SIMULADO")
            <td>{{ $d->valor }}</td>
        @endif
      </tr>
    @endforeach
    </tbody>
</table>
@endsection
