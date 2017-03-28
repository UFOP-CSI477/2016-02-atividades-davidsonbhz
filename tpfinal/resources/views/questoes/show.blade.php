@extends('layouts.dashboard')
@section('content')

<h1>Dados da Questão</h1>
<div align="center">
    <form method="post" action="/pi/{{$dados[0]->provaitem}}">
        {{method_field('DELETE')}}
        {{csrf_field()}}

        <div align="left"><h4>{{$dados[0]->enunciado}}</h4><br></div>

        <table class="table table-striped">
          <thead>
            <tr>
              <th>Letra</th>
              <th>Descrição</th>
            </tr>
          </thead>
        <tbody>
            @foreach ($dados as $d)
              <tr>
                <td>{{ $d->letra }}</td>
                <td>{{ $d->descricao }}</td>
              </tr>
            @endforeach
            </tbody>
        </table>

        <br><br>
        @if(Auth::check())
           @if(Auth::user()->grupo == 1 || Auth::user()->grupo == 2)
               <?php
                   $dataprova = date('Y-m-d', strtotime($dados[0]->data));
                   $d = date('Y-m-d');
               ?>
              @if(strtotime($dataprova) > strtotime($d))
                  <a href="/pi/{{$dados[0]->provaitem}}/edit" class="btn btn-primary fa fa-edit"> Editar Questão </a>
              @endif
           @endif
           @if(Auth::user()->grupo == 1)
               <button type="submit" class="btn btn-danger fa fa-eraser"> Excluir Questão </button>
           @endif
        @endif
        <a href="/p/{{$dados[0]->prova}}" class="btn btn-primary fa fa-mail-reply"> Voltar </a>
    </form>
    <br><br>
</div>
@endsection
