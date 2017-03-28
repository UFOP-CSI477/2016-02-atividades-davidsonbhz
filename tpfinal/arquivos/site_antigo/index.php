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

        <?php
        
        die("<center><h1>Processo encerrado</h1></center>");
        
        ?>
        
        <?php
        $fx = $_REQUEST['fx'];
        if (!isset($_REQUEST['fx'])) {
            $visibilidade1 = 'visible';
            $visibilidade2 = 'hidden';
            $fx = 2;
        }
        
        if ($fx == 1) {
            //verifica o cpf
            $visibilidade1 = 'visible';
            $visibilidade2 = 'hidden';
            include './conexao.php';
            include './verificacpf.php';

            if ($status == 1) {
                echo "<div class='alert-info'>Cpf com impedimento!</div>";
                $visibilidade1 = 'visible';
                $visibilidade2 = 'hidden';
            } else if ($status == 2) {
                echo "<div class='alert-info'>Cpf ja cadastrado!</div>";
                $visibilidade1 = 'visible';
                $visibilidade2 = 'hidden';
            } else if ($status == 0) {
                $visibilidade1 = 'hidden';
                $visibilidade2 = 'visible';
            }
        } 
        //echo "$fx - $status";
        ?>


        <div class="container col-md-12 alert alert-info" style="text-align: center; margin-bottom: 70px;">
            <h1>Inscri&ccedil;&atilde;o - Processo Seletivo 2017-01</h1>
        </div>

<?php if ($fx == 2): ?>
            <div class="container" id="dvcpf">

                <div class="row ">

                    <div class="col-md-4"></div>
                    <div class="col-md-4">

                        <form action="" method="post" id="formcpf">
                            <input type="hidden" name="fx" value="1">
                            <div class="input-group">
                                <span class="input-group-addon" id="basic-addon1">CPF*: </span>
                                <input type="text" class="form-control" id="xcpf" name="cpf" placeholder="Informe seu CPF" aria-describedby="basic-addon1">
                            </div>

                            <center>
                                <input type="submit" id="verificar" class="btn btn-primary" style="margin-top: 10px;" value="Verificar">
                                <input type="reset" class="btn btn-warning mg-top" style="margin-top: 10px;" value="Limpar">
                            </center>



                        </form>

                    </div>
                    <div class="col-md-4"></div>

                </div>

            </div>

<?php endif; ?>

        <div id="dvformulario" class="container mg-top" style="width: 800px; margin-bottom: 60px; visibility: <?= $visibilidade2 ?>">

            <div class="row ">

                <div class="col-md-2"></div>
                <div class="col-md-8">

                    <form action="salvarinscricao.php" id="fdados" method="post">
                        <input type="hidden" name="fx" value="2">
                        <div class="input-group mg-top">
                            <span class="input-group-addon" id="basic-addon2">Nome*: </span>
                            <input type="text" class="form-control" id="nome" name="nome" required="true"
                                   onblur="this.value = retira_acentos(this.value);"
                                   placeholder="Informe seu nome completo" aria-describedby="basic-addon2">
                        </div>
                        <div class="input-group mg-top">
                            <span class="input-group-addon" id="basic-addon3">Endere&ccedil;o*: </span>
                            <input type="text" class="form-control" id="endereco" name="endereco"  required="true"
                                   onblur="this.value = retira_acentos(this.value);"
                                   placeholder="Rua/Av, n&uacute;mero" aria-describedby="basic-addon3">
                        </div>
                        <div class="input-group mg-top">
                            <span class="input-group-addon" id="basic-addon4">Bairro*: </span>
                            <input type="text" class="form-control" id="bairro" name="bairro"  required="true"
                                   onblur="this.value = retira_acentos(this.value);"
                                   placeholder="Informe seu bairro" aria-describedby="basic-addon4">
                        </div>
                        <div class="input-group mg-top">
                            <span class="input-group-addon" id="basic-addon5">Cidade*: </span>
                            <input type="text" class="form-control" id="cidade" name="cidade"  required="true"
                                   onblur="this.value = retira_acentos(this.value);"
                                   placeholder="Informe sua cidade" aria-describedby="basic-addon5">
                        </div>
                        <div class="input-group mg-top">
                            <span class="input-group-addon" id="basic-addon5">CEP*: </span>
                            <input type="text" class="form-control" id="cep" name="cep" placeholder="CEP" aria-describedby="basic-addon5">
                        </div>


                        <div class="input-group mg-top">
                            <span class="input-group-addon" id="basic-addon6">Sexo*: </span>
                            <select class="form-control" aria-describedby="basic-addon6" name="sexo"  required="true">
                                <option selected no-display>Selecione</option>
                                <option value ="M">Masculino</option>
                                <option value ="F">Feminino</option>
                            </select>
                        </div>
                        <div class="input-group mg-top">
                            <span class="input-group-addon" id="basic-addon7">Data de Nascimento*: </span>
                            <input type="text" class="form-control" id="date" name="nascimento"  required="true"
                                   placeholder="Data de nascimento" aria-describedby="basic-addon7">
                        </div>

                        <div class="input-group mg-top">
                            <span class="input-group-addon" id="basic-addon8">RG*: </span>
                            <input type="text" class="form-control" id="rg" name="rg"  required="true"
                                   placeholder="RG, ex: MG-00.000.000" aria-describedby="basic-addon8">
                        </div>

                        <div class="input-group mg-top">
                            <span class="input-group-addon" id="basic-addon8">CPF: </span>
                            <input type="text" class="form-control" id="vcpf" readonly="true" name="cpf" value="<?=$cpf?>" aria-describedby="basic-addon8">
                        </div>


                        <div class="input-group mg-top">
                            <span class="input-group-addon" id="basic-addon9">Ensino Fundamental*: </span>
                            <input type="text" class="form-control" id="fundamental"  required="true"
                                   onblur="this.value = retira_acentos(this.value);"
                                   name="escolaensinofundamental" placeholder="Institui&ccedil;&atilde;o na qual cursou o ensino fundamental" aria-describedby="basic-addon9">
                        </div>
                        <div class="input-group mg-top">
                            <span class="input-group-addon" id="basic-addon10">Ensino M&eacute;dio*: </span>
                            <input type="text" class="form-control" id="medio" name="escolaensinomedio"  required="true"
                                   onblur="this.value = retira_acentos(this.value);"
                                   placeholder="Institui&ccedil;&atilde;o na qual cursou o ensino m&eacute;dio" aria-describedby="basic-addon10">
                        </div>
                        <div class="input-group mg-top">
                            <span class="input-group-addon" id="basic-addon11">Cursou o ensino m&eacute;dio em*: </span>
                            <select class="form-control" aria-describedby="basic-addon11"  required="true" name="tipoensinomedio">
                                <option selected no-display>Selecione</option>
                                <option value ="Escola Municipal">Escola Municipal</option>
                                <option value ="Escola Estadual">Escola Estadual</option>
                                <option value ="Escola Estadual">Escola Particular</option>
                                <option value ="Instituto Federal">Instituto Federal</option>
                            </select>
                        </div>
                        <div class="input-group mg-top">
                            <span class="input-group-addon" id="basic-addon12">Email*: </span>
                            <input type="email" class="form-control" id="email" name="email"  required="true"
                                   placeholder="Informe seu email" aria-describedby="basic-addon12">
                        </div>
                        <div class="input-group mg-top">
                            <span class="input-group-addon" id="basic-addon13">Telefone: </span>
                            <input type="text" class="form-control" id="telefone" name="telefone" placeholder="Telefone fixo" aria-describedby="basic-addon13">
                        </div>
                        <div class="input-group mg-top">
                            <span class="input-group-addon" id="basic-addon14">Celular*: </span>
                            <input type="text" class="form-control" id="celular" name="celular"  required="true"
                                   placeholder="Celular" aria-describedby="basic-addon14">
                        </div>
                        <div class="input-group mg-top">
                            <span class="input-group-addon" id="basic-addon15">Possui defici&ecirc;ncia*: </span>
                            <select class="form-control" aria-describedby="basic-addon15"  required="true"
                                    name="possuideficiencia">
                                <option selected no-display>Selecione</option>
                                <option value ="N">N&atilde;o</option>
                                <option value ="S">Sim</option>
                            </select>
                        </div>
                        <div class="input-group mg-top">
                            <span class="input-group-addon" id="basic-addon16">Se sim, especifique*: </span>
                            <input type="text" class="form-control" id="desc" name="descricaodeficiencia"
                                   onblur="this.value = retira_acentos(this.value);"
                                   aria-describedby="basic-addon16">
                        </div>

                        <center>
                            <input type="submit" id="enviarInscricao" class="btn btn-primary" style="margin-top: 10px; margin-bottom: 50px;" value="Enviar Inscri&ccedil;&atilde;o">
                        </center>
                    </form>



                </div>
                <div class="col-md-2"></div>

            </div>

        </div>

        <div class="container" id="dvok">


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




