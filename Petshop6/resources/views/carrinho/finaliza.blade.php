
@extends('layouts.lte')

@section('conteudo')

<?php
$id = Auth::user()->id;
?>



    <?php
    $carrinho = Session::get('carrinho');

    $carrinho = str_replace("x", "", $carrinho);


    if ($carrinho != "") {
        $itens = DB::select(DB::raw("select * from produtos where id in($carrinho)"));
        $t = DB::select(DB::raw("select sum(preco) as total from produtos where id in($carrinho) "));
        $total = $t[0]->total;
        $qtds = array_count_values(explode(",", $carrinho));
    }
    ?>

    @if ($carrinho=="")
    <div class="alert alert-success" role="alert">
        O carrinho está vazio!
    </div>
    @else

    <div class="alert alert-success" role="alert">
        Finalizar compra
    </div>

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
                                Item
                            </th>
                            <th>
                                Pre&ccedil;o
                            </th>
                            <th>
                                Quantidade
                            </th>
                            <th>
                                Total
                            </th>
                            <td>
                                -
                            </td>

                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($itens as $e) 

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
                                {{ $qtds[$e->id] }}
                            </td>
                            <td>
                                <?php
                                echo ($e->preco * $qtds[$e->id]);
                                ?>
                            </td>
                            <td>
                                <?php
                                $url = route('removecarrinho', ['id' => $e->id]);
                                ?>

                                <a class="btn-primary btn" href="{{$url}}">Retirar</a>
                            </td>


                        </tr>


                        @endforeach

                        <tr>
                            <td></td><td></td>
                            <td>
                                <?= $total ?>
                            </td>
                        </tr>

                    </tbody>


                </table>
                <a class="btn btn-primary" href="{{route('finalizacompra')}}">Confirmar compra</a>
            </div>
        </div>
    </div>

    @endif



@endsection