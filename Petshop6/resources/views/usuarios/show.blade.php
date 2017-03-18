
@extends('layouts.lte')

@section('conteudo')

<?php
$img = 'img/' . $prod->imagem;
?>

<div class="alert alert-success" role="alert">
    {{ $prod->nome }}
</div>

<fieldset>

<!-- Form Name -->
<legend>Dados do novo produto</legend>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="nome">Nome do produto</label>  
  <div class="col-md-4">
  <input id="nome" name="nome" type="text" placeholder="Nome" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
    <label class="col-md-4 control-label" for="preco">Pre&ccedil;o do produto</label>  
  <div class="col-md-4">
  <input id="preco" name="preco" type="text" placeholder="R$" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="imagem">Imagem</label>  
  <div class="col-md-4">
  <input id="imagem" name="imagem" type="file" placeholder="placeholder" class="form-control input-md">
    
  </div>
</div>

{{ Html::image($img, '', array('class' => 'imgmostruario')) }}


<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="singlebutton"></label>
  <div class="col-md-4">
    <button id="singlebutton" name="singlebutton" class="btn btn-primary">Salvar</button>
  </div>
</div>
</fieldset>

@endsection


