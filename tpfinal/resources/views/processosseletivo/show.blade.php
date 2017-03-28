@extends('layouts.dashboard')
@section('content')

<h1>Dados do Processo Seletivo</h1>
<div align="center">
    <form method="post" action="/ps/{{$p->processoseletivo}}">
        {{method_field('DELETE')}}
        {{csrf_field()}}

        <?php
            $dataprova = date('d/m/Y', strtotime($p->dataprova));
            $datainicioinscricao = date('d/m/Y', strtotime($p->inicioinscricao));
            $dataterminoinscricao = date('d/m/Y', strtotime($p->terminoinscricao));
            $datainiciomatricula = date('d/m/Y', strtotime($p->iniciomatricula));
            $datafimmatricula = date('d/m/Y', strtotime($p->fimmatricula));
            $datamatriculaexcedente = date('d/m/Y', strtotime($p->matriculaexcedente));
        ?>

        <a href="/p/{{ $p->prova }}">Prova</a><br>
        Título: {{ $p->titulo }}</br>
        Data da prova: {{ $dataprova }}</br>
        Hora: {{ $p->hora }}</br>
        Local: {{ $p->local }}</br>
        Status: {{ $p->status }}</br>
        Data de início da inscrição: {{ $datainicioinscricao }}</br>
        Data de término da inscrição: {{ $dataterminoinscricao }}</br>
        Ano/Período: {{ $p->ano }}/{{ $p->periodo }}</br>
        Quantidade de aprovados: {{ $p->qtdaprovados }}</br>
        Data de início das matrículas: {{ $datainiciomatricula }}</br>
        Data de término das matrículas: {{ $datafimmatricula }}</br>
        Data da matrícula dos excedentes: {{ $datamatriculaexcedente }}</br>

        <br><br>
        @if(Auth::check())
           @if(Auth::user()->grupo == 1 || Auth::user()->grupo == 2)
               <a href="/ps/{{$p->processoseletivo}}/edit" class="btn btn-primary fa fa-edit"> Editar </a>
           @endif
           @if(Auth::user()->grupo == 1)
               <button type="submit" class="btn btn-danger fa fa-eraser"> Excluir </button>
           @endif
        @endif
        <a href="/ps" class="btn btn-primary fa fa-mail-reply"> Voltar </a>
    </form>
</div>
@endsection
