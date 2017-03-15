


@extends('layout.loja')

@extends('layouts.app')
@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-4">
            <h3>
                MyPetshop
            </h3>
        </div>
        <div class="col-md-4">
        </div>
        <div class="col-md-4">
            
        </div>
    </div>


    <div class="row">



        <div class="col-md-12">
            <div class="row">


                <?php
                $collectionLength = count($produtos);

                for ($i = 0; $i < $collectionLength; $i+=3):
                    $p = $produtos[$i];
                    ?>

                    <div class="col-md-4">
                        <div class="thumbnail">
                            <img alt="Bootstrap Thumbnail First" src="img/{{$p->imagem}}" style="height: 160px; width: 160px;" />
                            <div class="caption">
                                <h3>
                                    {{$p->nome}}
                                </h3>
                                <p>
                                    Pre&ccedil;o: {{$p->preco}}
                                </p>
                                <p>
                                    <a class="btn btn-primary" href="#">Action</a> <a class="btn" href="#">Action</a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <?php
                    if(($i+1)>=$collectionLength) break;
                    $p = $produtos[$i+1];
                    ?>
                    <div class="col-md-4">
                        <div class="thumbnail">
                            <img alt="Bootstrap Thumbnail First" src="img/{{$p->imagem}}" style="height: 160px; width: 160px;" />
                            <div class="caption">
                                <h3>
                                    {{$p->nome}}
                                </h3>
                                <p>
                                    Pre&ccedil;o: {{$p->preco}}
                                </p>
                                <p>
                                    <a class="btn btn-primary" href="#">Action</a> <a class="btn" href="#">Action</a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <?php
                    if(($i+2)>=$collectionLength) break;
                    $p = $produtos[$i+2];
                    ?>
                    <div class="col-md-4">
                        <div class="thumbnail">
                            <img alt="Bootstrap Thumbnail First" src="img/{{$p->imagem}}" style="height: 160px; width: 160px;" />
                            <div class="caption">
                                <h3>
                                    {{$p->nome}}
                                </h3>
                                <p>
                                    Pre&ccedil;o: {{$p->preco}}
                                </p>
                                <p>
                                    <a class="btn btn-primary" href="#">Action</a> <a class="btn" href="#">Action</a>
                                </p>
                            </div>
                        </div>
                    </div>


    <?php
endfor;
?>
            </div>
        </div>
    </div>

</div>


@endsection



<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        
    </head>
    <body>
        
    </body>
</html>
