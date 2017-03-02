<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

    <body>
        <?php
        $img = 'img/' . $produto->imagem;
        ?>

        {{ Html::style('css/petshop.css') }}
        Produto: 
        <hr>
        <p>Nome: {{$produto->nome}}</p>

        {{ Html::image($img, '', array('class' => 'imgmostruario')) }}
        

    </body>


</html>



