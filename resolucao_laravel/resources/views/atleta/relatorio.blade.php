@extends('layouts.lte')


@section('conteudo')



<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <table class="table">
                <thead>
                    <tr>
                        <th>
                            #
                        </th>
                        <th>
                            Evento
                        </th>
                        <th>
                            Valor
                        </th>
                        <th>
                            Pago
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php $total=0; ?>
                    @foreach($eventos as $e)
                    <tr>
                        <td>
                            {{$e->id}}
                        </td>
                        <td>
                            {{$e->nome}}
                        </td>
                        <td>
                            {{$e->preco}}
                        </td>
                        <td>
                            {{$e->pago}}
                            
                        </td>
                    </tr>
                        <?php if($e->pago>0) {$total+=$e->preco;} ?>
                    @endforeach

                    <tr>
                        <td></td><td></td>
                        <td>
                            Total: {{$total}}
                        </td>
                    </tr>
                    
                </tbody>
            </table>
        </div>
    </div>
</div>


@endsection