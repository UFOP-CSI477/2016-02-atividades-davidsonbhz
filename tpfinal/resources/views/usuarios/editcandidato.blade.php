@extends('layouts.dashboard')
@section('content')

<form class="w3-form" action="/" method="post">

    {{csrf_field()}}


    <div class="row ">

        <div class="col-md-12">

            <form action="" id="fdados">

                <div class="form-group">
                    <label for="nome" class="col-md-4 control-label">Nome*</label>
                    <div class="col-md-6">
                        <input type="text" class="form-control" id="nome" name="nome" required="true"
                               placeholder="Informe seu nome completo" aria-describedby="basic-addon2">
                    </div>
                    </label>
                </div>
                <div class="form-group">
                    <label for="sexo" class="col-md-4 control-label">Sexo*</label>

                    <div class="col-md-6">
                        <select name="sexo" class="form-control">
                            <option value='M'>Masculino</option>
                            <option value='F'>Feminino</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="nome" class="col-md-4 control-label">Data de Nascimento*</label>
                    <div class="col-md-6">
                        <input type="date" class="form-control" id="date" name="nascimento" required="true"
                               placeholder="Data de nascimento" aria-describedby="basic-addon7">
                    </div>
                    </label>
                </div>

                <div class="form-group">
                    <label for="nome" class="col-md-4 control-label">RG*</label>
                    <div class="col-md-6">
                        <input type="text" class="form-control" id="rg" name="rg" required="true"
                               placeholder="RG, ex: MG-00.000.000" aria-describedby="basic-addon8">
                    </div>
                    </label>
                </div>

                <div class="form-group">
                    <label for="nome" class="col-md-4 control-label">CPF*</label>
                    <div class="col-md-6">
                        <input type="text" class="form-control" id="vcpf"  name="cpf"  aria-describedby="basic-addon8">
                    </div>
                    </label>
                </div>
                <div class="form-group">
                    <label for="estadocivil" class="col-md-4 control-label">Estado Civil*</label>

                    <div class="col-md-6">
                        <select name="estadocivil" class="form-control">
                            <option value='SOLTEIRO'>Solteiro(a)</option>
                            <option value='CASADO'>Casado(a)</option>
                            <option value='DIVORCIADO'>Divorciado(a)</option>
                            <option value='SEPARADO'>Separado(a)</option>
                            <option value='VIUVO'>Viúvo(a)</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="nome" class="col-md-4 control-label">Nome do Pai*</label>
                    <div class="col-md-6">
                        <input type="text" class="form-control" id="nomedopai" name="nomedopai" required="true"
                               placeholder="" aria-describedby="basic-addon3">
                    </div>
                    </label>
                </div>
                <div class="form-group">
                    <label for="nome" class="col-md-4 control-label">Nome da Mãe*</label>
                    <div class="col-md-6">
                        <input type="text" class="form-control" id="nomedamae" name="nomedamae" required="true"
                               placeholder="" aria-describedby="basic-addon3">
                    </div>
                    </label>
                </div>
                <div class="form-group">
                    <label for="nome" class="col-md-4 control-label">Endereço*</label>
                    <div class="col-md-6">
                        <input type="text" class="form-control" id="endereco" name="endereco" required="true"
                               placeholder="Rua/Av, n&uacute;mero" aria-describedby="basic-addon3">
                    </div>
                    </label>
                </div>
                <div class="form-group">
                    <label for="nome" class="col-md-4 control-label">Bairro*</label>
                    <div class="col-md-6">
                        <input type="text" class="form-control" id="bairro" name="bairro" required="true"
                               placeholder="Informe seu bairro" aria-describedby="basic-addon4">
                    </div>
                    </label>
                </div>
                <div class="form-group">
                    <label for="nome" class="col-md-4 control-label">Cidade*</label>
                    <div class="col-md-6">
                        <input type="text" class="form-control" id="cidade" name="cidade"  required="true"
                               placeholder="Informe sua cidade" aria-describedby="basic-addon5">
                    </div>
                    </label>
                </div>
                <div class="form-group">
                    <label for="nome" class="col-md-4 control-label">Cep*</label>
                    <div class="col-md-6">
                        <input type="text" class="form-control" id="cep" name="cep" placeholder="CEP"  aria-describedby="basic-addon5">
                    </div>
                    </label>
                </div>

                <div class="form-group">
                    <label for="nome" class="col-md-4 control-label">Escola de Ensino Fundamental*</label>
                    <div class="col-md-6">
                        <input type="text" class="form-control" id="fundamental"  required="true"
                               name="escolaensinofundamental" placeholder="Institui&ccedil;&atilde;o na qual cursou o Ensino Fundamental" aria-describedby="basic-addon9">
                    </div>
                    </label>
                </div>
                <div class="form-group">
                    <label for="nome" class="col-md-4 control-label">Escola de Ensino Médio*</label>
                    <div class="col-md-6">
                        <input type="text" class="form-control" id="medio" name="escolaensinomedio"  required="true"
                               placeholder="Institui&ccedil;&atilde;o na qual cursou o Ensino M&eacute;dio" aria-describedby="basic-addon10">
                    </div>
                    </label>
                </div>
                <div class="form-group">
                    <label for="nome" class="col-md-4 control-label">Estudou o Ensino Médio em Escola Pública?*</label>
                    <div class="col-md-6">
                        <input type="text" class="form-control" id="tipoensinomedio" name="tipoensinomedioaensinomedio"  required="true"
                               placeholder="Sim ou Não" aria-describedby="basic-addon10">
                    </div>
                    </label>
                </div>
                <div class="form-group">
                    <label for="nome" class="col-md-4 control-label">E-mail*</label>
                    <div class="col-md-6">
                        <input type="email" class="form-control" id="email" name="email"
                               placeholder="Informe seu email" aria-describedby="basic-addon12">
                    </div>
                    </label>
                </div>
                <div class="form-group">
                    <label for="nome" class="col-md-4 control-label">Telefone Fixo*</label>
                    <div class="col-md-6">
                        <input type="text" class="form-control" id="telefone" name="telefone"
                               placeholder="Telefone fixo" aria-describedby="basic-addon13">
                    </div>
                    </label>
                </div>
                <div class="form-group">
                    <label for="nome" class="col-md-4 control-label">Celular*</label>
                    <div class="col-md-6">
                        <input type="text" class="form-control" id="celular" name="celular"  required="true"
                               placeholder="Celular" aria-describedby="basic-addon14">
                    </div>
                    </label>
                </div>
                <div class="form-group">
                    <label for="nome" class="col-md-4 control-label">Possui deficiência?*</label>
                    <div class="col-md-6">
                        <input type="text" class="form-control"  name="possuideficiencia"  required="true"
                               placeholder="Sim ou Não" aria-describedby="basic-addon14">
                    </div>
                    </label>

                </div>
                <div class="form-group">
                    <label for="nome" class="col-md-4 control-label">Descrição da Deficiência*</label>
                    <div class="col-md-6">
                        <input type="text" class="form-control" id="desc" name="descricaodeficiencia" aria-describedby="basic-addon16">
                    </div>
                    </label>
                </div>

                <div class="form-group">
                    <label for="nome" class="col-md-4 control-label">Senha*</label>
                    <div class="col-md-6">
                        <input type="password" class="form-control" id="desc" name="senha" aria-describedby="basic-addon16">
                    </div>
                    </label>
                </div>

                <center>
                    <input type="submit" id="enviarInscricao" class="btn btn-primary" style="margin-top: 10px; margin-bottom: 50px;" value="Confirmar Inscri&ccedil;&atilde;o">
                </center>
            </form>

        </div>
        <div class="col-md-2"></div>

    </div>




</form>
@endsection
