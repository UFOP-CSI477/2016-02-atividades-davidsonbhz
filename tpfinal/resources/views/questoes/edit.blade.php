@extends('layouts.dashboard')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading" align="center"><b>Editar Questão<b></div>
                <div class="panel-body">

                    <form method="post" action="/pi/{{$pr[0]->provaitem}}">
                        {{method_field('PATCH')}}
                        {{csrf_field()}}

                        <input type="hidden" name="prova" value="{{$pr[0]->prova}}">

                        <div class="col-md-12">
                            <div class="form-group{{ $errors->has('disciplina') ? ' has-error' : '' }}">
                                <div class="form-group">
                                    <label for="disciplina" class="col-md-4 control-label"> Disciplina </label>

                                    <select id="disciplina" class="form-control" name="disciplina" required>
                                        @foreach($disciplinas as $d)
                                            @if($d->disciplina == $pr[0]->disciplina)
                                                <option selected="true" value="{{$d->disciplina}}"> {{ $d->descricao }}</option>
                                            @else
                                                <option value="{{$d->disciplina}}"> {{ $d->descricao }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <input type="hidden" name="supervisor" value="{{$pr[0]->supervisor}}">

                        <div class="col-md-12">
                            <div class="form-group{{ $errors->has('enunciado') ? ' has-error' : '' }}">
                                <div class="form-group">
                                    <label for="enunciado" class="col-md-4 control-label"> Enunciado </label>
                                    <input type="text" class="form-control" name="enunciado" value="{{$pr[0]->enunciado}}" required autofocus/>
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
                                        @if($pr[0]->resposta == "A")
                                            <option selected="true" value="A">A</option>
                                            <option value="B">B</option>
                                            <option value="C">C</option>
                                            <option value="D">D</option>
                                            <option value="E">E</option>
                                        @endif
                                        @if($pr[0]->resposta == "B")
                                            <option value="A">A</option>
                                            <option selected="true" value="B">B</option>
                                            <option value="C">C</option>
                                            <option value="D">D</option>
                                            <option value="E">E</option>
                                        @endif
                                        @if($pr[0]->resposta == "C")
                                            <option value="A">A</option>
                                            <option value="B">B</option>
                                            <option selected="true" value="C">C</option>
                                            <option value="D">D</option>
                                            <option value="E">E</option>
                                        @endif
                                        @if($pr[0]->resposta == "D")
                                            <option value="A">A</option>
                                            <option value="B">B</option>
                                            <option value="C">C</option>
                                            <option selected="true" value="D">D</option>
                                            <option value="E">E</option>
                                        @endif
                                        @if($pr[0]->resposta == "E")
                                            <option value="A">A</option>
                                            <option value="B">B</option>
                                            <option value="C">C</option>
                                            <option value="D">D</option>
                                            <option selected="true" value="E">E</option>
                                        @endif

                                    </select>
                                </div>
                            </div>
                        </div>

                        <input type="hidden" name="valor" value="{{$pr[0]->valor}}">
                        <input type="hidden" name="status" value="{{$pr[0]->status}}">
                        <input type="hidden" name="ordemq" value="{{$pr[0]->ordemq}}">

                        <input type="hidden" name="pi" value="{{$pr[0]->provaitem}}">
                        <input type="hidden" name="pio1" value="{{$pr[0]->provaitemopcao}}">
                        <input type="hidden" name="pio2" value="{{$pr[1]->provaitemopcao}}">
                        <input type="hidden" name="pio3" value="{{$pr[2]->provaitemopcao}}">
                        <input type="hidden" name="pio4" value="{{$pr[3]->provaitemopcao}}">
                        <input type="hidden" name="pio5" value="{{$pr[4]->provaitemopcao}}">

                        <div class="col-md-12">
                            <div class="form-group{{ $errors->has('a') ? ' has-error' : '' }}">
                                <div class="form-group">
                                    <label for="a" class="col-md-12 control-label"> Letra A </label>
                                    <input type="text" class="form-control" name="a" value="{{$pr[0]->descricao}}" required autofocus/>
                                </div>
                            </div>

                            @if ($errors->has('a'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('a') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="col-md-12">
                            <div class="form-group{{ $errors->has('b') ? ' has-error' : '' }}">
                                <div class="form-group">
                                    <label for="b" class="col-md-12 control-label"> Letra B </label>
                                    <input type="text" class="form-control" name="b" value="{{$pr[1]->descricao}}" required autofocus/>
                                </div>
                            </div>

                            @if ($errors->has('b'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('b') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="col-md-12">
                            <div class="form-group{{ $errors->has('c') ? ' has-error' : '' }}">
                                <div class="form-group">
                                    <label for="c" class="col-md-12 control-label"> Letra C </label>
                                    <input type="text" class="form-control" name="c" value="{{$pr[2]->descricao}}" required autofocus/>
                                </div>
                            </div>

                            @if ($errors->has('c'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('c') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="col-md-12">
                            <div class="form-group{{ $errors->has('d') ? ' has-error' : '' }}">
                                <div class="form-group">
                                    <label for="d" class="col-md-12 control-label"> Letra D </label>
                                    <input type="text" class="form-control" name="d" value="{{$pr[3]->descricao}}" required autofocus/>
                                </div>
                            </div>

                            @if ($errors->has('d'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('d') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="col-md-12">
                            <div class="form-group{{ $errors->has('e') ? ' has-error' : '' }}">
                                <div class="form-group">
                                    <label for="e" class="col-md-12 control-label"> Letra E </label>
                                    <input type="text" class="form-control" name="e" value="{{$pr[4]->descricao}}" required autofocus/>
                                </div>
                            </div>

                            @if ($errors->has('e'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('e') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="col-md-9">
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-6">
                                    <button type="submit" class="btn btn-primary fa fa-check"> Salvar </button>
                                    <a href="/pi/{{$pr[0]->provaitem}}" class="btn btn-primary fa fa-mail-reply"> Voltar </a>
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
