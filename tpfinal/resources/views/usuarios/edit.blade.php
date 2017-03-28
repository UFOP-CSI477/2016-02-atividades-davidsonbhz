
@extends('layouts.dashboard')

@section('content')

<?php
$id = $usuario->id;
$img = "/dist/img/user2-160x160.jpg";
$fname = public_path() . "/perfil/user_$id.jpg";
//dd($fname);
if (file_exists($fname)) {
    $img = "/img/user_$id.jpg";
}
?>

<form class="form-horizontal" method="post" action="/profileupdate"  enctype="multipart/form-data">
    <input type="hidden" name="_route" value="profileupdate">
    <input type="hidden" name="_method" value="GET">
    <input type="hidden" name="usuario" value="{{$usuario->usuario}}">
    {{ csrf_field() }}

    <fieldset>

        <div class="form-group">
            <label class="col-md-4 control-label" for="nome">Nome completo</label>
            <div class="col-md-4">
                <input id="nome" name="nome" type="text" value="{{$usuario->nome}}"
                       placeholder="Nome" class="form-control input-md" required="">
            </div>
        </div>

        <div class="form-group">
            <label for="sexo" class="col-md-4 control-label">Sexo</label>
            <div class="col-md-4">
                <select name="sexo" class="form-control">
                    @if($usuario->sexo == "M")
                        <option selected="true" value='M'>Masculino</option>
                        <option value='F'>Feminino</option>
                    @endif
                    @if($usuario->sexo == "F")
                        <option value='M'>Masculino</option>
                        <option selected="true" value='F'>Feminino</option>
                    @endif
                </select>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-4 control-label" for="cpf">CPF</label>
            <div class="col-md-4">
                <input id="cpf" name="cpf" type="text" value="{{$usuario->cpf}}" class="form-control input-md" required="">
            </div>
        </div>

        <div class="form-group">
            <label for="nome" class="col-md-4 control-label">RG</label>
            <div class="col-md-4">
                <input type="text" class="form-control" id="rg" name="rg" value="{{$usuario->rg}}"
                required="true" aria-describedby="basic-addon7">
            </div>
            </label>
        </div>

        <div class="form-group">
            <label for="nome" class="col-md-4 control-label">Data de Nascimento</label>
            <div class="col-md-4">
                <input type="date" class="form-control" id="datanascimento" name="datanascimento" value="{{$usuario->datanascimento}}"
                required="true" aria-describedby="basic-addon7">
            </div>
            </label>
        </div>

        <div class="form-group">
            <label for="nome" class="col-md-4 control-label">Email</label>
            <div class="col-md-4">
                <input type="text" class="form-control" id="email" name="email" value="{{$usuario->email}}"
                required="true" aria-describedby="basic-addon7">
            </div>
            </label>
        </div>

        <div class="form-group">
            <label class="col-md-4 control-label" for="foto">Imagem</label>
            <div class="col-md-4">
                <input id="foto" name="foto" type="file" placeholder="placeholder" class="form-control input-md">

            </div>
        </div>

        <div class="form-group">
            <label class="col-md-4 control-label"></label>
            <div class="col-md-4">
              @if($usuario->foto == NULL)
                <img src="{{ asset("/bower_components/admin-lte/dist/img/user.jpg") }}" class="imgmostruario" width="150" height="150">
              @else
                <img src="{{$usuario->foto}}" class="imgmostruario" width="150" height="150">
              @endif
            </div>
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

<form method="post" action="/usuarios/{{$usuario->usuario}}">
    {{method_field('DELETE')}}
    {{csrf_field()}}

    @if(Auth::check())
       @if(Auth::user()->grupo == 1)
           <button type="submit" class="btn btn-danger fa fa-eraser"> Excluir </button>
       @endif
    @endif
    <a href="/usuarios" class="btn btn-primary fa fa-mail-reply"> Voltar </a>
</form>

@endsection
