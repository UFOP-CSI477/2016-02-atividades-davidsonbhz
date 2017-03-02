<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Sistema Academico    </title>


        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Bootstrap 101 Template</title>

        <!-- Bootstrap -->
        <link href="/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4">
                    <h3>
                        Sistema Academico UFOP
                    </h3>
                </div>
                <div class="col-md-4">
                </div>
                <div class="col-md-4">

                    <button type="button" class="btn btn-block btn-sm btn-link">
                        <a href="/admin">Acesso do admin</a>
                    </button>
                </div>
            </div>
            <div class="col-md-4">
                <h4>
                    Disciplinas
                </h4>
            </div>
            <div class="row">
                <div class="col-md-12">
                    
                    <table class="table">
                        <thead>
                            <tr>
                                <th>
                                    #
                                </th>
                                <th>
                                    Disciplina
                                </th>
                                <th>
                                    Creditos
                                </th>
                            </tr>
                        </thead>
                        
                        <tbody>
                        @foreach ($disciplinas as $e) 
                        
                            <tr>
                                <td>
                                    {{$e->id}}
                                </td>
                                <td>
                                    {{$e->nome}}
                                </td>
                                <td>
                                    {{$e->creditos}}
                                </td>
                            </tr>
                            
       
                            @endforeach
                        </tbody>
                        
                        
                    </table>
                </div>
            </div>
        </div>


    </body>