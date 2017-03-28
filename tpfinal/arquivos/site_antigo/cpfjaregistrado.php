<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=ISO-8859-1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Inscric&atilde;o</title>

        <!-- Bootstrap -->
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">


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

        <div class="container" id="dvok">

            <div class="row ">

                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <h3>
                        CPF ja registrado!
                    </h3>
                </div>
                <div class="col-md-4"></div>

            </div>

        </div>


        <footer style="margin-top: 100px;" id="footer"> 
            <hr>
            <p style="margin:10px;">&copy; 2016 Pr&eacute;-Vestibular: Rumo &agrave; Universidade.</p>
        </footer>


        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.16.0/jquery.validate.js" type="text/javascript"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.16.0/additional-methods.min.js" type="text/javascript"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js" type="text/javascript"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.3.1/jquery.maskedinput.min.js" type="text/javascript"></script>
        <script src="js/formulario.js" type="text/javascript"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

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




