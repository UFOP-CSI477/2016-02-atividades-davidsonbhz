@extends('layouts.dashboard')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading" align="center"><b>Adicionar Processo Seletivo<b></div>
                <div class="panel-body">

                    <form method="post" action="/ps/">
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

                        <div class="col-md-6">
                            <div class="form-group{{ $errors->has('dataprova') ? ' has-error' : '' }}">
                                <div class="form-group">
                                    <label for="dataprova" class="col-md-12 control-label"> Data da prova </label>
                                    <input type="date" class="form-control" name="dataprova" required autofocus/>
                                </div>
                            </div>

                            @if ($errors->has('dataprova'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('dataprova') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="col-md-6">
                            <div class="form-group{{ $errors->has('hora') ? ' has-error' : '' }}">
                                <div class="form-group">
                                    <label for="hora" class="col-md-12 control-label"> Hora </label>
                                    <input type="time" class="form-control" name="hora" required autofocus/>
                                </div>
                            </div>

                            @if ($errors->has('hora'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('hora') }}</strong>
                                </span>
                            @endif
                        </div>

                        <input type="hidden" name="local" value="ICEA">
                        <input type="hidden" name="status" value="ABERTO">

                        <div class="col-md-6">
                            <div class="form-group{{ $errors->has('inicioinscricao') ? ' has-error' : '' }}">
                                <div class="form-group">
                                    <label for="inicioinscricao" class="col-md-12 control-label"> Data de ínicio das incrições </label>
                                    <input type="date" class="form-control" name="inicioinscricao" required autofocus/>
                                </div>
                            </div>

                            @if ($errors->has('inicioinscricao'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('inicioinscricao') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="col-md-6">
                            <div class="form-group{{ $errors->has('terminoinscricao') ? ' has-error' : '' }}">
                                <div class="form-group">
                                    <label for="terminoinscricao" class="col-md-12 control-label"> Data de término das incrições </label>
                                    <input type="date" class="form-control" name="terminoinscricao" required autofocus/>
                                </div>
                            </div>

                            @if ($errors->has('terminoinscricao'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('terminoinscricao') }}</strong>
                                </span>
                            @endif
                        </div>

                        <input type="hidden" name="envioemail" value="NAOENVIADO">

                        <div class="col-md-6">
                            <div class="form-group{{ $errors->has('ano') ? ' has-error' : '' }}">
                                <div class="form-group">
                                    <label for="ano" class="col-md-12 control-label"> Ano </label>

                                    <select id="ano" class="form-control" name="ano" required>
                                        @for( $i = 2017; $i <= 2035; $i += 1 ) {
                                            <option value="{{ $i }}"> {{ $i }}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group{{ $errors->has('periodo') ? ' has-error' : '' }}">
                                <div class="form-group">
                                    <label for="periodo" class="col-md-12 control-label"> Período </label>

                                    <select id="periodo" class="form-control" name="periodo" required>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <input type="hidden" name="qtdaprovados" value="45">

                        <div class="col-md-6">
                            <div class="form-group{{ $errors->has('iniciomatricula') ? ' has-error' : '' }}">
                                <div class="form-group">
                                    <label for="iniciomatricula" class="col-md-12 control-label"> Data de ínicio das matrículas </label>
                                    <input type="date" class="form-control" name="iniciomatricula" required autofocus/>
                                </div>
                            </div>

                            @if ($errors->has('iniciomatricula'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('iniciomatricula') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="col-md-6">
                            <div class="form-group{{ $errors->has('fimmatricula') ? ' has-error' : '' }}">
                                <div class="form-group">
                                    <label for="fimmatricula" class="col-md-12 control-label"> Data de término das matrículas </label>
                                    <input type="date" class="form-control" name="fimmatricula" required autofocus/>
                                </div>
                            </div>

                            @if ($errors->has('fimmatricula'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('fimmatricula') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="col-md-6">
                            <div class="form-group{{ $errors->has('matriculaexcedente') ? ' has-error' : '' }}">
                                <div class="form-group">
                                    <label for="matriculaexcedente" class="col-md-12 control-label"> Data de matrículas dos excedentes </label>
                                    <input type="date" class="form-control" name="matriculaexcedente" required autofocus/>
                                </div>
                            </div>

                            @if ($errors->has('matriculaexcedente'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('matriculaexcedente') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="col-md-9">
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-6">
                                    <button type="submit" class="btn btn-primary fa fa-check"> Salvar </button>
                                    <a href="/ps" class="btn btn-primary fa fa-mail-reply"> Voltar </a>
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
