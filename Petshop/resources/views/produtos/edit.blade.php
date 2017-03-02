
@extends('admin.admin_template')

@section('conteudo')

<?php
$img = 'img/' . $prod->imagem;
?>

<div class="alert alert-success" role="alert">
    {{ $prod->nome }}
</div>



<form class="form-horizontal" method="post" action="/produtos/{{$prod->id}}"> 
    <input type="hidden" name="_route" value="produtos.update">
    <input type="hidden" name="_method" value="PUT">



    {{ csrf_field() }}

    <fieldset>

        <!-- Form Name -->
        <legend>Dados do novo produto</legend>

        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-4 control-label" for="nome">Nome do produto</label>  
            <div class="col-md-4">
                <input id="nome" name="nome" type="text" value="{{$prod->nome}}"
                       placeholder="Nome" class="form-control input-md" required="">

            </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-4 control-label" for="preco">Pre&ccedil;o do produto</label>  
            <div class="col-md-4">
                <input id="preco" name="preco" type="text" value="{{$prod->preco}}"
                       placeholder="R$" class="form-control input-md" required="">

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

                {{ Html::image($img, '', array('class' => 'imgmostruario')) }}

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


