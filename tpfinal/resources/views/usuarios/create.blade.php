@extends('layouts.dashboard')

@section('content')

<form class="form-horizontal" method="post" action="/usuarios">
    {{ csrf_field() }}

    <fieldset>

        <div class="form-group">
            <label class="col-md-4 control-label" for="nome">Nome completo</label>
            <div class="col-md-4">
                <input id="nome" name="nome" type="text"
                       placeholder="Nome" class="form-control input-md" required="">
            </div>
        </div>

        <div class="form-group">
            <label for="sexo" class="col-md-4 control-label">Sexo</label>
            <div class="col-md-4">
                <select name="sexo" class="form-control">
                    <option value='M'>Masculino</option>
                    <option value='F'>Feminino</option>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-4 control-label" for="cpf">CPF</label>
            <div class="col-md-4">
                <input id="cpf" name="cpf" type="text" class="form-control input-md" required="">
            </div>
        </div>

        <div class="form-group">
            <label for="nome" class="col-md-4 control-label">RG</label>
            <div class="col-md-4">
                <input type="text" class="form-control" id="rg" name="rg"
                required="true" aria-describedby="basic-addon7">
            </div>
            </label>
        </div>

        <div class="form-group">
            <label for="nome" class="col-md-4 control-label">Data de Nascimento</label>
            <div class="col-md-4">
                <input type="date" class="form-control" id="datanascimento" name="datanascimento"
                required="true" aria-describedby="basic-addon7">
            </div>
            </label>
        </div>

        <div class="form-group">
            <label for="nome" class="col-md-4 control-label">Email</label>
            <div class="col-md-4">
                <input type="text" class="form-control" id="email" name="email"
                required="true" aria-describedby="basic-addon7">
            </div>
            </label>
        </div>

        <!-- Button -->
        <div class="form-group">
            <label class="col-md-4 control-label" for="singlebutton"></label>
            <div class="col-md-4">
                <button id="singlebutton" name="singlebutton" class="btn btn-primary">Salvar</button>
            </div>
        </div>

        @if(Session::has('info'))
            <br>
            <div class="col-md-4 col-md-offset-4 alert alert-danger" align="center">{{ Session::get('info') }}</div>
        @endif
    </fieldset>
</form>

@endsection
