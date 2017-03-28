
@extends('layouts.dashboard')
@section('content')

<div class="panel panel-default">
  <div class="panel-body"><h4><strong>Lista de chamada</strong></h4></div>
    <div class="panel-body">
      <form method="post" action="/home">

        {{csrf_field()}}

        <div class="form-group">
          <label for="disciplina"> Disciplina: </label>
          <select name="disciplina">
            @foreach($disciplinas as $c)
              <option value="{{$c->disciplina}}"> {{$c->descricao}}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group">
          <label for="data"> Data </label><br>
          <input type="date" class="form-control" name="data"/>
        </div>
        <table class="table table-responsive table-striped">
          <thead>
            <tr>
              <th>Alunos</th>
              <th>Presença</th>
              <th>Justificativa</th>
           </tr>

          </thead>
          <tbody>
            @foreach($alunos as $a)
              <tr>
                <td>
                  <input type="hidden" name="aluno" value="{{ $a->aluno }}">
                  {{ $a->nome }}
                </td>
                <td>
                  <input type="checkbox" name="status" value='P'>Presente<br>
                  <input type="checkbox" name="status" value='A'>Ausente</br>
                  <input type="checkbox" name="status" value='J'>Falta justificada</br>
                </td>
                <td>
                  <input type="text" class="form-control" name="justificativa"/>
                </td>
              </tr>
           @endforeach
            </tbody>
        </table>

    <input type="submit" class="btn btn-primary" value="Salvar" />
  </form>
</div>
</div>

@endsection
