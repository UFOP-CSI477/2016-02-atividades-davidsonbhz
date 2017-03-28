<?php
include './conexao.php';
session_start();

if (!isset($_SESSION['usuario'])) {
    header('Location: confirma.php');
    exit();
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
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

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
            <h1>Inscri&ccedil;&atilde;o - Processo Seletivo 2017-01</h1>
        </div>

      
        <div id="dvformulario" class="container mg-top" style="width: 800px; margin-bottom: 60px;">

            <h3>Inscri&ccedil;&atilde;o n&atilde;o encontrada!</h3>
            <a href="confirma.php">Voltar</a>
        </div>

  

        <footer style="margin-top: 100px;" id="footer"> 
            <hr>
            <p style="margin:10px;">&copy; 2016 Pr&eacute;-Vestibular: Rumo &agrave; Universidade.</p>
        </footer>

        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="js/jquery.min.js"></script>

        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="js/bootstrap.min.js"></script>

        <script src="js/jquery-3.0.0.min.js" type="text/javascript"></script>
        <script src="js/jquery.maskedinput.js" type="text/javascript"></script>

        <script src="js/jquery.validate.min.js" type="text/javascript"></script>

        <script type="text/javascript">

            jQuery(function ($) {

                $("#xcpf").mask("999.999.999-99");
                $("#date").mask("99/99/9999");
                $("#telefone").mask("(99) 9999-9999");
                $("#celular").mask("(99) 99999-9999");
                $("#cep").mask("99999-999");
            });

        </script>

    </body>
</html>




