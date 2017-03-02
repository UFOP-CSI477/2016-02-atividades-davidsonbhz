
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
                Lista de produtos
            </div>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>
                            #
                        </th>
                        <th>
                            Item
                        </th>
                        <th>
                            Pre&ccedil;o
                        </th>
                        <th>
                            Imagem
                        </th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($produtos as $e) 

                    <tr>
                        <td>
                            {{$e->id}}
                        </td>
                        <td>
                            <a href="/produtos/{{$e->id}}/edit"> {{$e->nome}} </a>
                        </td>
                        <td>
                            {{$e->preco}}
                        </td>
                        <td>
                            img
                        </td>
                    </tr>


                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>













@endsection

