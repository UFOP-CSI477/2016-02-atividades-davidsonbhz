@extends('layouts.dashboard')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading" align="center"><b>Adicionar Prova<b></div>
                <div class="panel-body">

                    <form method="post" action="/p/">
                        {{csrf_field()}}

                        <input type="hidden" name="professor" value="1">

                        <div class="col-md-12">
                            <div class="form-group{{ $errors->has('data') ? ' has-error' : '' }}">
                                <div class="form-group">
                                    <label for="data" class="col-md-12 control-label"> Data da prova </label>
                                    <input type="date" class="form-control" name="data" required autofocus/>
                                </div>
                            </div>

                            @if ($errors->has('data'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('data') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="col-md-12">
                            <div class="form-group{{ $errors->has('tipo') ? ' has-error' : '' }}">
                                <div class="form-group">
                                    <label for="tipo" class="col-md-4 control-label"> Tipo </label>

                                    <select id="tipo" class="form-control" name="tipo" required>
                                        <option value="PROVA"> Processo seletivo </option>
                                        <option value="SIMULADO"> Simulado </option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group{{ $errors->has('titulo') ? ' has-error' : '' }}">
                                <div class="form-group">
                                    <label for="titulo" class="col-md-4 control-label"> Título </label>
                                    <input type="text" class="form-control" name="titulo" required autofocus/>
                                </div>
                            </div>

                            @if ($errors->has('titulo'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('titulo') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="col-md-9">
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-6">
                                    <button type="submit" class="btn btn-primary fa fa-check"> Salvar </button>
                                    <a href="/p" class="btn btn-primary fa fa-mail-reply"> Voltar </a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
