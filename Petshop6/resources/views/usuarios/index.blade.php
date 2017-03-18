
@extends('layouts.lte')

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
                Lista de produtos
            </div>
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
                            Email
                        </th>
                        <th>
                            Tipo
                        </th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($usuarios as $e) 

                    <tr>
                        <td>
                            {{$e->id}}
                        </td>
                        <td>
                            <a href="#"> {{$e->name}} </a>
                        </td>
                        <td>
                            {{$e->email}}
                        </td>
                        <td>
                            {{$e->type}}
                        </td>
                    </tr>


                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>













@endsection

