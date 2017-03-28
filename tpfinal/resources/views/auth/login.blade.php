<!DOCTYPE html>
<html lang="en">
    <head>
		<meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rumo a Universidade</title>
    <link rel="stylesheet" type="text/css" href="/css/style.css" />
		<script src="/js/modernizr.custom.63321.js"></script>
		<!--[if lte IE 7]><style>.main{display:none;} .support-note .note-ie{display:block;}</style><![endif]-->
		<style>
			@import url(http://fonts.googleapis.com/css?family=Montserrat:400,700|Handlee);
			body {
				background: #eedfcc url(/imagens/ufop1.jpg) no-repeat center top;
				-webkit-background-size: cover;
				-moz-background-size: cover;
				background-size: cover;
			}
			.container > header h1,
			.container > header h2 {
				color: #fff;
				text-shadow: 0 1px 1px rgba(0,0,0,0.5);
			}

		</style>
    </head>
    <body>
    <div class="container">
    		<header>

    		</header>

    		<section class="main">
          <div class="col-md-1 col-md-offset-1">
              <div align="center">
                  <img src="{{URL::asset("/imagens/logo1.png")}}" width="250" height="250"><br>
              </div>
          </div>

    			<form class="form-5 clearfix" role="form" method="POST" action="{{ url('/login') }}">
            {{ csrf_field() }}
    				<p>
    					<input type="email" id="email" name="email" placeholder="Email" required autofocus>
    				  <input type="password" name="password" id="password" placeholder="Senha" required autofocus>
    				</p>
    				<button type="submit" name="submit">
    					<i class="icon-arrow-right"></i>
    				    <span>Entrar</span>
    				</button>
                    <a href="{{ url('/password/reset') }}">Esqueci minha senha</a><br>
                    <a href="{{ url('/candidatos/create') }}">Inscrever em Processo Seletivo</a>
    			</form>​​​​


              <div align="center" class="form-5 clearfix">
                @if ($errors->has('email') || $errors->has('password'))
                    <span class="help-block">
                        Email e/ou senha inválidos
                    </span>
                @endif
                @if(Session::has('info'))
                    <br>
                    <div class="col-md-4 col-md-offset-4 alert alert-danger" align="center">{{ Session::get('info') }}</div>
                @endif
              </div>

    		</section>
    </div>

		<!-- jQuery if needed -->
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
    <script type="text/javascript" src="/js/jquery.placeholder.min.js"></script>
		<script type="text/javascript">
		$(function(){
			$('input, textarea').placeholder();
		});
		</script>
    </body>
</html>
