
@extends('admin.admin_template')

@section('conteudo')


<div class="alert alert-success" role="alert">
    Cadastrar nova cidade
</div>

<form class="form-horizontal" method="post" action="/cidades"  enctype="multipart/form-data"> 
    {{ csrf_field() }}
    <fieldset>

        <!-- Form Name -->
        <legend>Dados do nova cidade</legend>

        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-4 control-label" for="nome">Nome da cidade</label>  
            <div class="col-md-4">
                <input id="nome" name="nome" type="text" placeholder="Nome" class="form-control input-md" required="">

            </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-4 control-label" for="estado">Estado</label>  
            <div class="col-md-4">
                                
                <select name="estado" id="estado">
                    @foreach($estados as $e)
                    <option value="{ { $e->id } }">{{$e->nome}}</option>
                    @endforeach


                </select>


            </div>
        </div>


        <!-- Button -->
        <div class="form-group">
            <label class="col-md-4 control-label" for="singlebutton"></label>
            <div class="col-md-4">
                <button id="singlebutton" name="singlebutton" class="btn btn-primary">Salvar</button>
            </div>
        </div>
    </fieldset>
</form>


@endsection