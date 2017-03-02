
@extends('admin.admin_template')

@section('conteudo')

<style>

    .table-striped>tr:nth-child(odd){
        background-color:red;
    }
</style>


<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="alert alert-success" role="alert">
                Lista de cidades
            </div>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>
                            #
                        </th>
                        <th>
                            Cidade
                        </th>
                       
                    </tr>
                </thead>
                <tbody>

                    @foreach ($cidades as $e) 

                    <tr>
                        <td>
                            {{$e->id}}
                        </td>
                        <td>
                            <a href="/cidades/{{$e->id}}/edit"> {{$e->nome}} </a>
                        </td>
                        
                    </tr>


                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>













@endsection

