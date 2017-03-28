@extends('layouts.dashboard')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading" align="center"><b>Adicionar Questão<b></div>
                <div class="panel-body">

                    <form method="post" action="/pi/">
                        {{csrf_field()}}

                        <div class="col-md-12">
                            <div class="form-group{{ $errors->has('prova') ? ' has-error' : '' }}">
                                <div class="form-group">
                                    <label for="prova" class="col-md-4 control-label"> Prova </label>

                                    <select id="prova" class="form-control" name="prova" required>
                                        @foreach($provas as $p)
                                            <option value="{{$p->prova}}"> {{ $p->titulo }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group{{ $errors->has('disciplina') ? ' has-error' : '' }}">
                                <div class="form-group">
                                    <label for="disciplina" class="col-md-4 control-label"> Disciplina </label>

                                    <select id="disciplina" class="form-control" name="disciplina" required>
                                        @foreach($disciplinas as $d)
                                            <option value="{{$d->disciplina}}"> {{ $d->descricao }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <input type="hidden" name="supervisor" value=1>

                        <div class="col-md-12">
                            <div class="form-group{{ $errors->has('enunciado') ? ' has-error' : '' }}">
                                <div class="form-group">
                                    <label for="enunciado" class="col-md-4 control-label"> Enunciado </label>
                                    <input type="text" class="form-control" name="enunciado" required autofocus/>
                                </div>
                            </div>

                            @if ($errors->has('enunciado'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('enunciado') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="col-md-12">
                            <div class="form-group{{ $errors->has('resposta') ? ' has-error' : '' }}">
                                <div class="form-group">
                                    <label for="resposta" class="col-md-4 control-label"> Resposta </label>

                                    <select id="resposta" class="form-control" name="resposta" required>
                                        <option value="A">A</option>
                                        <option value="B">B</option>
                                        <option value="C">C</option>
                                        <option value="D">D</option>
                                        <option value="E">E</option>
                                    </select>
                                </div>
                            </div>
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
