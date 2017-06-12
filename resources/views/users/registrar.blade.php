@extends('layouts.app')

@section('content')
<div class="content text-blue">
    <div class="">
      <h1>Cadastrar Currículo</h1>
      <form id="form" class="form-horizontal" role="form" method="POST" action="{{ route('registrarcv') }}">
        {{csrf_field()}}
        <div class="form-group">
          <label for="nome" class="col-sm-2 control-label">Nome completo</label>
          <div class="col-sm-8">
            <input id="nome" class="form-control"  type="text" name="nome" placeholder="Informe o seu nome completo." title="Informe o seu nome completo." required />
          </div>
        </div>
        <div class="form-group">
          <label for="cpf" class="col-sm-2 control-label">CPF</label>
          <div class="col-sm-3">
            <input id="cpf" class="form-control"  type="text" name="cpf" placeholder="Informe o seu CPF." title="Informe o seu CPF." data-mask="000.000.000-00" required />
          </div>
          <label for="email" class="col-sm-1 control-label">E-mail</label>
          <div class="col-sm-4">
            <input id="email" class="form-control"  type="email" name="email" placeholder="Informe o seu nome completo." title="Informe o seu nome completo." required />
          </div>
        </div>
        <div class="form-group">
          <label for="nacionalidade" class="col-sm-2 control-label">Nacionalidade</label>
          <div class="col-sm-2">
            <input id="nacionalidade" class="form-control"  type="text" name="nacionalidade" placeholder="Informe a sua nascionalidade." title="Informe a sua nascionalidade." value="Brasileiro" />
          </div>
          <label for="sexo" class="col-sm-1 control-label">Sexo</label>
          <div class="col-sm-2">
            <select id="sexo" class="form-control" name="sexo" required>
              <option value=""></option>
              <option value="F">Feminino</option>
              <option value="M">Masculino</option>
            </select>
          </div>
          <label for="idade" class="col-sm-1 control-label">Idade</label>
          <div class="col-sm-2">
            <input id="idade" class="form-control"  type="number" name="idade" placeholder="Informe a sua idade." title="Informe a sua idade." min=14 max=99 required />
          </div>
        </div>
        <div class="form-group">
          <label for="estadocivil" class="col-sm-2 control-label">Estado Civil</label>
          <div class="col-sm-3">
            <select id="estadocivil" class="form-control" name="estadocivil" required>
              <option value=""></option>
              <option value="Solteiro(a)">Solteiro(a)</option>
              <option value="Casado(a)">Casado(a)</option>
              <option value="União Estável">União Estável</option>
              <option value="Separado(a)">Separado(a)</option>
              <option value="Divorciado(a)">Divorciado(a)</option>
              <option value="Viúvo(a)">Viúvo(a)</option>
            </select>
          </div>
          <label for="filhos" class="col-sm-1 control-label">Tem Filho(s)?</label>
          <div class="col-sm-2">
            <select id="filhos" class="form-control" name="filhos" required>
              <option value=""></option>
              <option value="1">Sim</option>
              <option value="0">Não</option>
            </select>
          </div>
        </div>
        <div class="form-group">
          <label for="endereco" class="col-sm-2 control-label">Endereço</label>
          <div class="col-sm-8">
            <input id="endereco" class="form-control"  type="text" name="endereco" placeholder="Informe o seu endereço." title="Informe o seu endereço." required />
          </div>
        </div>
        <div class="form-group">
          <label for="uf" class="col-sm-2 control-label">Estado</label>
          <div class="col-sm-1">
            <select id="uf" class="form-control" name="uf" required>
              <option value=""></option>
            </select>
          </div>
          <label for="contrato" class="col-sm-1 control-label">Cidade</label>
          <div class="col-sm-3">
            <span class="carregando">Aguarde, carregando...</span>
            <select id="cidade" name="cidade" class="form-control" required>
              <option id="escolhaEstado" value="">-- Escolha um estado --</option>
            </select>
          </div>
          <label for="tel" class="col-sm-1 control-label">Telefone</label>
          <div class="col-sm-2">
            <input id="tel" class="form-control date"  type="text" name="tel" placeholder="(00) 90000-0000" data-mask="(00) 0000-00009" title="Informe um telefone de contato."  />
          </div>
        </div>
        <div class="form-group">
            <label for="arquivo" class="col-sm-2 control-label">Anexar arquivo</label>
          <div class="col-sm-8">
            <input id="arquivo" class="form-control"  type="file" name="arquivo"  />
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-offset-6 col-sm-2">
            <button class="btn btn-default btn-block" id="btnReset" type="reset" value="Reset" title="Limpar">Limpar</button>
          </div>
          <div class="col-sm-2">
            <button class="btn btn-primary btn-block" id="btnSubmit" type="submit" value="Submit" title="Enviar">Enviar</button>
          </div>
        </div>
      </form>
    </div>
</div>
@endsection
@section('script')

  <script type="text/javascript" src="js/helperVagas.js"></script>
  <script type="text/javascript" src="jQuery-Mask-Plugin/dist/jquery.mask.min.js"></script>
@endsection