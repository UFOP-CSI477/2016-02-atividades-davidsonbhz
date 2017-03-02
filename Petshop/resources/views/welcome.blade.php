
@extends('layout.loja')

@section('conteudo')

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
            <form class="form-horizontal" role="form">
                <div class="form-group">

                    <label for="name" class="col-sm-2 control-label">
                        Usuario
                    </label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="name" id="name" />
                    </div>
                </div>
                <div class="form-group">

                    <label for="password" class="col-sm-2 control-label">
                        Password
                    </label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" id="password" name="password" />
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">

                        <button type="submit" class="btn btn-default">
                            Entrar
                        </button>
                    </div>
                </div>
            </form>
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

