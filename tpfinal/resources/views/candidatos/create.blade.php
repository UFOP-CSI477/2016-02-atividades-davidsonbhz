@extends('layouts.bemvindo')
@section('content')

      <h1>Inscrição do Candidato</h1>
      <form class="w3-form" action="/candidatos" method="post">

        {{csrf_field()}}


        <div id="dvformulario" class="form-horizontal" style="margin-bottom: 60px;" algin="center">

                    <div class="row ">

                        <div class="col-md-12">

                          <div align="center" class="form-5 clearfix">
                            @if(Session::has('info'))
                                <br>
                                <div class="col-md-4 col-md-offset-4 alert alert-danger" align="center">{{ Session::get('info') }}</div>
                            @endif

                          </div>

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
                                    <label for="nascimento" class="col-md-4 control-label">Data de Nascimento*</label>
                                        <div class="col-md-6">
                                            <input type="date" class="form-control" id="date" name="nascimento" required="true"
                                           placeholder="Data de nascimento" aria-describedby="basic-addon7">
                                           </div>
                                    </label>
                                </div>

                                <div class="form-group">
                                    <label for="rg" class="col-md-4 control-label">RG*</label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" id="rg" name="rg" required="true"
                                           placeholder="RG, ex: MG-00.000.000" aria-describedby="basic-addon8">
                                           </div>
                                    </label>
                                </div>

                                <div class="form-group">
                                    <label for="cpf" class="col-md-4 control-label">CPF*</label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" id="cpf"  name="cpf"  aria-describedby="basic-addon8">
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
                                    <label for="nomedopai" class="col-md-4 control-label">Nome do Pai*</label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" id="nomedopai" name="nomedopai" required="true"
                                           placeholder="" aria-describedby="basic-addon3">
                                           </div>
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label for="nomedamae" class="col-md-4 control-label">Nome da Mãe*</label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" id="nomedamae" name="nomedamae" required="true"
                                           placeholder="" aria-describedby="basic-addon3">
                                           </div>
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label for="endereco" class="col-md-4 control-label">Endereço*</label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" id="endereco" name="endereco" required="true"
                                           placeholder="Rua/Av, n&uacute;mero" aria-describedby="basic-addon3">
                                           </div>
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label for="bairro" class="col-md-4 control-label">Bairro*</label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" id="bairro" name="bairro" required="true"
                                           placeholder="Informe seu bairro" aria-describedby="basic-addon4">
                                           </div>
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label for="cidade" class="col-md-4 control-label">Cidade*</label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" id="cidade" name="cidade"  required="true"
                                           placeholder="Informe sua cidade" aria-describedby="basic-addon5">
                                           </div>
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label for="cep" class="col-md-4 control-label">Cep*</label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" id="cep" name="cep" placeholder="CEP"  aria-describedby="basic-addon5">
                                            </div>
                                    </label>
                                </div>

                                <div class="form-group">
                                    <label for="escolaensinofundamental" class="col-md-4 control-label">Escola de Ensino Fundamental*</label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" id="escolaensinofundamental"  required="true"
                                           name="escolaensinofundamental" placeholder="Institui&ccedil;&atilde;o na qual cursou o Ensino Fundamental" aria-describedby="basic-addon9">
                                           </div>
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label for="escolaensinomedio" class="col-md-4 control-label">Escola de Ensino Médio*</label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" id="escolaensinomedio" name="escolaensinomedio"  required="true"
                                           placeholder="Institui&ccedil;&atilde;o na qual cursou o Ensino M&eacute;dio" aria-describedby="basic-addon10">
                                           </div>
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label for="tipoensinomedio" class="col-md-4 control-label">Estudou o Ensino Médio em Escola Pública?*</label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" id="tipoensinomedio" name="tipoensinomedio"  required="true"
                                           placeholder="Sim ou Não" aria-describedby="basic-addon10">
                                           </div>
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label for="email" class="col-md-4 control-label">E-mail*</label>
                                        <div class="col-md-6">
                                            <input type="email" class="form-control" id="email" name="email"
                                           placeholder="Informe seu email" aria-describedby="basic-addon12">
                                           </div>
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label for="telefone" class="col-md-4 control-label">Telefone Fixo*</label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" id="telefone" name="telefone"
                                           placeholder="Telefone fixo" aria-describedby="basic-addon13">
                                           </div>
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label for="celular" class="col-md-4 control-label">Celular*</label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" id="celular" name="celular"  required="true"
                                           placeholder="Celular" aria-describedby="basic-addon14">
                                           </div>
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label for="possuideficiencia" class="col-md-4 control-label">Possui deficiência?*</label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control"  name="possuideficiencia"  required="true"
                                           placeholder="Sim ou Não" aria-describedby="basic-addon14">
                                           </div>
                                    </label>

                                </div>
                                <div class="form-group">
                                    <label for="descricaodeficiencia" class="col-md-4 control-label">Descrição da Deficiência*</label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" id="desc" name="descricaodeficiencia" aria-describedby="basic-addon16">
                                            </div>
                                    </label>
                                </div>

                                <div class="form-group">
                                    <label for="senha" class="col-md-4 control-label">Senha*</label>
                                        <div class="col-md-6">
                                            <input type="password" class="form-control" id="senha" name="senha" required="true"
                                           placeholder="Mínimo 6 dígitos" aria-describedby="basic-addon16">
                                            </div>
                                    </label>
                                </div>

                                <div class="form-group">
                                    <label for="senhaconfirm" class="col-md-4 control-label">Confirmação da Senha*</label>
                                        <div class="col-md-6">
                                            <input type="password" class="form-control" id="senhaconfirm" name="senhaconfirm" required="true"
                                           placeholder="Digite novamente a senha" aria-describedby="basic-addon16">
                                            </div>
                                    </label>
                                </div>

                                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                <center>
                                    <input type="submit" id="enviarInscricao" class="btn btn-primary" style="margin-top: 10px; margin-bottom: 50px;" value="Confirmar Inscri&ccedil;&atilde;o">
                                </center>
                            </form>

                        </div>
                        <div class="col-md-2"></div>

                    </div>

                </div>



        <!--
        <a href="/candidatos" class="btn btn-primary"> Voltar </a>
        -->
        </form>
@endsection
