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
				background: #eedfcc url(/imagens/ufop3.jpg) no-repeat center top;
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

    			<form class="form-7 clearfix" role="form" method="POST" action="{{ url('/password/reset') }}">
            {{ csrf_field() }}

            <input type="hidden" name="token" value="{{ $token }}">

    				<p>
    					<input type="email" id="email" name="email" placeholder="Email" value="{{ $email or old('email') }}" required autofocus>
    				  <input type="password" name="password" id="password" placeholder="Senha" required>
              <input type="password" name="password_confirmation" id="password-confirm" placeholder="Confirmar senha" required>
    				</p>
    				<button type="submit" name="submit">
    					<i class="icon-arrow-right"></i>
    				    <span>Resetar</span>
    				</button>
    			</form>​​​​


              <div align="center" class="form-7 clearfix">
                @if ($errors->has('email') || $errors->has('password') || $errors->has('password-confirm'))
                    <span>
                        <strong>Email e/ou senha inválidos</strong>
                    </span>
                @endif
                @if (session('status'))
                    <div class="alert alert-success">
                        <span>
                            <strong>{{ session('status') }}</strong>
                        </span>
                    </div>
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
