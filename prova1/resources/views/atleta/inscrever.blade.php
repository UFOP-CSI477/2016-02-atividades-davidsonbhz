@extends('layouts.lte')


@section('conteudo')




<div class="container-fluid">
    <div class="row">
        <div class="col-md-12" class="alert alert-success" role="alert">
            <h3>
                Inscrever no evento
            </h3>
            <form role="form" method="post" action="/atleta">
                <input type="hidden" name="atleta_id" value="{{Auth::id()}}" />
                {{ csrf_field() }}

                <div class="btn-group">

                    <select class="form-control" name="evento_id">

                        @foreach($eventos as $e)
                        <option value="{{ $e->id }}">{{$e->nome}}</option>

                        @endforeach
                    </select>
                </div>

                <div class="form-group">

                    <label for="datapagamento">
                        Data pagamento
                    </label>
                    <input type="date"  class="form-control" name="data" id="datapagamento" />
                </div>


                <div class="checkbox">

                    <label>
                        <input type="hidden" name="pago" value="0"/>
                        <input type="checkbox" name="pago" value="1" /> A inscrição já foi paga
                        
                    </label>
                </div> 
                <button type="submit" class="btn btn-default">
                    Registrar
                </button>
            </form>
        </div>
    </div>
</div>





@endsection