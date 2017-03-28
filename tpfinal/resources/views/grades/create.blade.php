@extends('layouts.dashboard')
@section('content')

<h1>Grade de horários</h1>
  <form method="post" action="/grades">

    {{csrf_field()}}
    <div class="form-group">
      <label for="semestre"> Semestre </label>
      <input type="text" class="form-control" name="semestre"/>
    </div>
    <table class="table table-striped">
      <thead>
        <tr>
          <th>Horário</th>
          <th>Segunda-feira</th>
          <th>Terça-feira</th>
          <th>Quarta-feira</th>
          <th>Quinta-feira</th>
          <th>Sexta-feira</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>
            <div class="form-group">
              <input type="text" class="form-control" name="horario" value="1º Horário"/>
            </div>
          </td>
          <td>
            <div class="form-group">
              <input type="text" class="form-control" name="horario" value="2º Horário"/>
            </div>
          </td>
          <td>
            <div class="form-group">
              <input type="text" class="form-control" name="horario" value="3º Horário"/>
            </div>
          </td>
          <td>
            <div class="form-group">
              <input type="text" class="form-control" name="horario" value="4º Horário"/>
            </div>
          </td>
          <td>
            <div class="form-group">
              <input type="text" class="form-control" name="horario" value="5º Horário"/>
            </div>
          </td>
          <td>
            <div class="form-group">
              <input type="text" class="form-control" name="horario" value="6º Horário"/>
            </div>
          </td>
          <td>
            <div class="form-group">
              <label for="disciplina"> Disciplina </label>
              <select name="disciplina">

              </select>
            </div>
          </td>





        </tr>
      </tbody>
    </table>


    <input type="submit" class="btn btn-primary" value="Salvar" />

    <a href="/grades" class="btn btn-primary"> Voltar </a>
  </form>





@endsection
