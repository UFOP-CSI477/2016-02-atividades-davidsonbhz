<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                xcolor: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>

        <div class="flex-center position-ref">
            @if (Route::has('login'))
            <div class="top-right links">
                @if (Auth::check())

                <?php
                $carrinho = Session::get('carrinho', "");
                $t = count(explode(",", $carrinho));
                //$t = 0;
                if($carrinho=="") $t = 0;
                if (sizeof($t) > 0) {
                    echo "<a href='/finaliza'>Finalizar compra ($t)</a>";
                }
                //echo $carrinho;
                ?>


                <a href="{{ url('/home') }}">Home</a>
                @else
                <a href="{{ url('/login') }}">Login</a>
                <a href="{{ url('/register') }}">Register</a>
                @endif
            </div>
            @endif

        </div>

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


            @if(Session::has('info'))
            <div class="alert-box success">
                <h2>{{ Session::get('info') }}</h2>
            </div>
            @endif
            
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
                                        @if (Auth::check())
                                        <form method="post" action="/carrinho">
                                            {{ csrf_field() }}

                                            <p>
                                                <input type="hidden" name="produto" value="{{$p->id}}" />
                                                <input type="number" name="quantidade" min="1" max="50">
                                                <input type="submit" class="btn btn-primary" value="Adicionar ao carrinho" />
                                            </p>
                                        </form>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <?php
                            if (($i + 1) >= $collectionLength)
                                break;
                            $p = $produtos[$i + 1];
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
                                        @if (Auth::check())
                                        <form method="post" action="/carrinho">
                                            {{ csrf_field() }}

                                            <p>
                                                <input type="hidden" name="produto" value="{{$p->id}}" />
                                                <input type="number" name="quantidade" min="1" max="50">
                                                <input type="submit" class="btn btn-primary" value="Adicionar ao carrinho" />
                                            </p>
                                        </form>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <?php
                            if (($i + 2) >= $collectionLength)
                                break;
                            $p = $produtos[$i + 2];
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
                                        @if (Auth::check())
                                        <form method="post" action="/carrinho">
                                            {{ csrf_field() }}

                                            <p>
                                                <input type="hidden" name="produto" value="{{$p->id}}" />
                                                <input type="number" name="quantidade" min="1" max="50">
                                                <input type="submit" class="btn btn-primary" value="Adicionar ao carrinho" />
                                            </p>
                                        </form>
                                        @endif
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


    </body>
</html>
