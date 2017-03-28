<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    $usuario = $_REQUEST['usuario'];
    $senha = $_REQUEST['senha'];
    if (($usuario == "nace") && ($senha == "confirmanacevest")) {
        //session_register("usuario", $usuario);
        $_SESSION['usuario'] = $usuario;
    } 
}
?>


<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Inscric&atilde;o</title>

        <!-- Bootstrap -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <style type="text/css">

            .no-display {
                display: none;
            }

            .mg-top{
                margin-top: 10px;
            }

            #footer {
                position: fixed;
                height: 80px;
                bottom: 0px;
                left: 0px;
                right: 0px;
                margin-bottom: 0px;
            }

            body {
                margin-bottom: 0px;
            }

        </style>

    </head>
    <body>

        <div class="container col-md-12 alert alert-info" style="text-align: center; margin-bottom: 70px;">
            <h1>Confirma&ccedil;&atilde;o de inscri&ccedil;&atilde;o - Processo Seletivo 2017-01</h1>
        </div>

        <?php
        if (!isset($_SESSION['usuario'])) {
            ?>

            <div class="container" id="dvcpf">

                <div class="row ">

                    <div class="col-md-4"></div>
                    <div class="col-md-4">


                        <form method="post" id="formlogin">
                            <div class="input-group">
                                <span class="input-group-addon" id="basic-addon1">Usuario: </span>
                                <input type="text" class="form-control" name="usuario" placeholder="Usuario" aria-describedby="basic-addon1">
                            </div>

                            <div class="input-group">
                                <span class="input-group-addon" id="basic-addon1">Senha: </span>
                                <input type="password" class="form-control" id="senha" name="senha" placeholder="Senha" aria-describedby="basic-addon1">
                            </div>
                            <center>
                                <input type="submit" id="verificar" class="btn btn-primary" style="margin-top: 10px;" value="Acessar">
                            </center>
                        </form>
                    </div>
                    <div class="col-md-4"></div>

                </div>

            </div>

            <?php
        } else {
            ?>

            <div class="container mg-top" style="width: 800px; margin-bottom: 60px;">

                <form action="buscainscricao.php" method="post" id="formbusca">
                    <div class="input-group">
                        <span class="input-group-addon" id="basic-addon1">CPF do candidato: </span>
                        <input type="text" class="form-control" id="cpf" name="cpf" placeholder="CPF" aria-describedby="basic-addon1">
                    </div>

                    <div class="input-group">
                        <span class="input-group-addon" id="basic-addon1">ou N&uacute;mero da inscri&ccedil;&atilde;o: </span>
                        <input type="text" class="form-control" id="senha" name="inscricao" placeholder="Inscricao" aria-describedby="basic-addon1">
                    </div>
                    <center>    
                        <input type="submit" id="verificar" class="btn btn-primary" style="margin-top: 10px;" value="Procurar">
                    </center>
                </form>
            </div>

            <?php
        }
        ?>
        <footer style="margin-top: 100px;" id="footer"> 
            <hr>
            <p style="margin:10px;">&copy; 2016 Pr&eacute;-Vestibular: Rumo &agrave; Universidade.</p>
        </footer>

        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
 <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.16.0/jquery.validate.js" type="text/javascript"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.16.0/additional-methods.min.js" type="text/javascript"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js" type="text/javascript"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.3.1/jquery.maskedinput.min.js" type="text/javascript"></script>
        <script src="js/formulario.js" type="text/javascript"></script>

        <script type="text/javascript">

            jQuery(function ($) {
                $("#cpf").mask("999.999.999-99");
            });

        </script>

    </body>
</html>




