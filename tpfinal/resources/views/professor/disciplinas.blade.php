@extends('layouts.dashboard')
@section('content')


<style>

    .table-striped>tr:nth-child(odd){
        background-color:red;
    }
</style>

<h1>Disciplinas de {{$usuario->nome}}</h1>


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
                            {{$e->disciplina}}
                        </td>
                        <td>
                            {{$e->descricao}}
                        </td>
                        <td>
                            <a href="/admin/professor/disciplinas/desassociar/{{$usuario->usuario}}/{{$e->disciplina}}"> Desassociar </a>
                        </td>
                    </tr>


                    @endforeach

                </tbody>
            </table>
        </div>
        
        Disciplinas disponíveis
        
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
                            {{$e->disciplina}}
                        </td>
                        <td>
                            {{$e->descricao}}
                        </td>
                        <td>
                            <a href="/admin/professor/disciplinas/associar/{{$usuario->usuario}}/{{$e->disciplina}}"> Associar </a>
                            
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

