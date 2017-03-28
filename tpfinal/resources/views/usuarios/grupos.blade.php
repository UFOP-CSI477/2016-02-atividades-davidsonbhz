@extends('layouts.dashboard')
@section('content')


<style>

    .table-striped>tr:nth-child(odd){
        background-color:red;
    }
</style>

<h1>Grupos do Usu&aacute;rio: {{$usuario->nome}}</h1>
<div>
    Grupo primário: {{$usuario->grupo}}
</div>

@if(Session::has('alert'))
<div class="alert-box alert-danger">
    <h2>{{ Session::get('alert') }}</h2>
</div>
@endif

<div class="container-fluid">
    <div class="row">
        
        <div class="col-md-12">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>
                            #
                        </th>
                        <th>
                            Nome
                        </th>
                        <th>

                        </th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($lista as $e) 

                    <tr>
                        <td>
                            {{$e->grupo}}
                        </td>
                        <td>
                            {{$e->nomegrupo}}
                        </td>
                        <td>
                            <a href="/admin/grupos/sair/{{$e->usuario}}/{{$e->grupo}}"> Sair do grupo </a>,
                            <a href="/admin/grupos/primario/{{$e->usuario}}/{{$e->grupo}}"> Definir como primário </a>
                            
                        </td>
                    </tr>


                    @endforeach

                </tbody>
            </table>
        </div>
        
        Grupos disponíveis
        
         <div class="col-md-12">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>
                            #
                        </th>
                        <th>
                            Nome
                        </th>
                        <th>

                        </th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($listanao as $e) 

                    <tr>
                        <td>
                            {{$e->grupo}}
                        </td>
                        <td>
                            {{$e->nomegrupo}}
                        </td>
                        <td>
                            <a href="/admin/grupos/ingressar/{{$usuario->usuario}}/{{$e->grupo}}"> Entrar no grupo </a>
                            
                        </td>
                    </tr>


                    @endforeach

                </tbody>
            </table>
        </div>
        
      

    </div>
    
    
    
    
</div>
</div>
@endsection

