
@extends('layouts.lte')

@section('conteudo')

<style>

    .table-striped>tr:nth-child(odd){
        background-color:red;
    }
</style>
<?php
$user = Auth::user();
$type = $user->type;
?>


<div class="container-fluid">
    @if(Session::has('info'))
    <div class="alert-box success ">
        <h4>{{ Session::get('info') }}</h4>
    </div>
    @endif
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
                        <th>
                            -
                        </th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($produtos as $e) 
                    <?php $img = $e->imagem; ?>
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
                            <img src="/img/{{$img}}" style="width: 128px; height: 128px;" />

                        </td>
                        <td>
                            @if($type==2)
                            <form action="{{ URL::route('produtos.destroy',$e->id) }}" method="POST">
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <button class="btn btn-danger">Excluir</button>
                            </form>

                            @endif
                        </td>
                    </tr>


                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>













@endsection

