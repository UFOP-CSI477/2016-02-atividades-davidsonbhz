
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
                            Data
                        </th>
                        <th>
                            Item
                        </th>
                        <th>
                            Pre&ccedil;o
                        </th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($lista as $e) 

                    <tr>
                        
                        <td>
                            {{$e->datacompra}}
                        </td>
                        <td>
                            <a href="#"> {{$e->nome}} </a>
                        </td>
                        <td>
                            {{$e->preco}}
                        </td>
                    </tr>


                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>



@endsection

