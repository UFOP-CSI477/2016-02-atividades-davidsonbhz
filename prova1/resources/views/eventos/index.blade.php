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
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
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
    <body style="background-image: url('/img/background.jpg'); background-repeat: no-repeat; background-size:cover;">
        <div class="flex-center position-ref ">
            @if (Route::has('login'))
            <div class="top-right links">
                @if (Auth::check())
                <a href="{{ url('/home') }}">Home</a>
                @else
                <a href="{{ url('/login') }}">Login</a>
                <a href="{{ url('/register') }}">Register</a>

                @endif
                <a href="#eventos">Eventos</a>
                <a href="#atletas">Atletas</a>
                <a href="#inscricoes">Inscricoes</a>

            </div>
            @endif
        </div>




        <section id="eventos" style="min-height: 100%; height: 100%;">
            <h3>Eventos</h3>
            <hr>
            @foreach($eventos as $e)
            <div style="color: black; font-weight: bolder;" >
                {{$e->nome}} em {{$e->data}}
            </div>
            @endforeach
        </section>

        <section id="atletas" style="min-height: 100%; height: 100%;background-image: url('/img/atletas.png'); background-repeat: no-repeat; background-size:cover;">
            <h3>Atletas</h3>
            <hr>
            @foreach($atletas as $e)
            <div style="color: black; font-weight: bolder;" >
                {{$e->nome}} 
            </div>
            @endforeach
        </section>

        <section id="inscricoes" style="min-height: 100%; height: 100%;background-image: url('/img/inscricoes.jpg'); background-repeat: no-repeat; background-size:cover;">
            <h3>Inscricoes</h3>
            <hr>
            @foreach($inscricoes as $e)
            <div style="color: black; font-weight: bolder;" >
                {{$e->name}} evento: {{$e->nome}} em {{$e->data}}
            </div>
            @endforeach
        </section>







    </body>
</html>
