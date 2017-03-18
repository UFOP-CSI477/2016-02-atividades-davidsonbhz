
@extends('layouts.lte')

@section('conteudo')

<?php
$usuario = \Illuminate\Support\Facades\Auth::user();
$id = $usuario->id;
$img = "/dist/img/user2-160x160.jpg";
$fname = public_path() . "/img/user_$id.jpg";
//dd($fname);
if (file_exists($fname)) {
    $img = "/img/user_$id.jpg";
}
?>

<div class="alert alert-success" role="alert">
    {{ $usuario->name }}
</div>



<form class="form-horizontal" method="post" action="/profileupdate"  enctype="multipart/form-data"> 
    <input type="hidden" name="_route" value="profileupdate">
    <input type="hidden" name="_method" value="GET">
    <input type="hidden" name="id" value="{{$usuario->id}}">
    {{ csrf_field() }}

    <fieldset>

        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-4 control-label" for="nome">Nome completo</label>  
            <div class="col-md-4">
                <input id="nome" name="name" type="text" value="{{$usuario->name}}"
                       placeholder="Nome" class="form-control input-md" required="">

            </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-4 control-label" for="email">Email</label>  
            <div class="col-md-4">
                <input id="preco" name="email" type="text" value="{{$usuario->email}}"
                       placeholder="R$" class="form-control input-md" required="">

            </div>
        </div>

        @if($usuario->tipo==2)
         <!-- Text input-->
        <div class="form-group">
            <label class="col-md-4 control-label" for="type">Tipo</label>  
            <div class="col-md-4">
                <input id="type" name="type" type="text" value="{{$usuario->type}}"
                       class="form-control input-md" required="">

            </div>
        </div>
        
        @endif

        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-4 control-label" for="senha">Senha</label>  
            <div class="col-md-4">
                <input id="preco" name="senha" type="password"
                       class="form-control input-md" required="">

            </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-4 control-label" for="imagem">Imagem</label>  
            <div class="col-md-4">
                <input id="imagem" name="imagem" type="file" placeholder="placeholder" class="form-control input-md">

            </div>
        </div>

        <div class="form-group">
            <label class="col-md-4 control-label"></label>  
            <div class="col-md-4">

                <img src="{{$img}}" class="imgmostruario">

            </div>
        </div>




        <!-- Button -->
        <div class="form-group">
            <label class="col-md-4 control-label" for="singlebutton"></label>
            <div class="col-md-4">
                <button id="singlebutton" name="singlebutton" class="btn btn-primary">Salvar</button>
            </div>
        </div>
    </fieldset>
</form>

@endsection


