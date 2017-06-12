@extends('layouts.app')

@section('content')

<div class="content text-blue">
    <div class="">
      <h1>Cadastrar Vaga</h1>
      <form id="form" class="form-horizontal" action="{{ route('postcadastrarVaga')}}" method="POST">
        {{csrf_field()}}
        <div class="form-group">
          <label for="empresa" class="col-sm-2 control-label">Empresa</label>
          <div class="col-sm-8">
            <input id="empresa" class="form-control"  type="text" name="empresa" placeholder="Informe o nome da empresa." title="Informe o nome da empresa." required />
          </div>
        </div>
        <div class="form-group">
          <label for="titulo" class="col-sm-2 control-label">Título da vaga</label>
          <div class="col-sm-8">
            <input id="titulo" class="form-control"  type="text" name="titulo" placeholder="Informe o título da vaga. Ex: Analista Programador PHP" title="Informe o título da vaga. Ex: Analista Programador PHP"required />
          </div>
        </div>
        <div class="form-group">
          <label for="jornada" class="col-sm-2 control-label">Jornada</label>
          <div class="col-sm-3">
            <input id="jornada" class="form-control"  type="text" name="jornada" placeholder="Informe a jornada de trabalho. Ex: Período Integral, Matutino, Vespertino, a Combinar" title="Informe a jornada de trabalho. Ex: Período Integral, Matutino, Vespertino, a Combinar" required/>
          </div>
          <label for="contrato" class="col-sm-2 control-label">Tipo de contrato</label>
          <div class="col-sm-3">
            <input id="contrato" class="form-control"  type="text" name="contrato" placeholder="Informe o tipo de contrato. Ex: Efetivo – CLT, Freelancer, a combinar" title="Informe o tipo de contrato. Ex: Efetivo – CLT, Freelancer, a combinar" required/>
          </div>
        </div>
        <div class="form-group">
          <label for="salario" class="col-sm-2 control-label">Salário</label>
          <div class="col-sm-3">
            <input id="salario" class="form-control"  type="text" name="salario" placeholder="Informe o salario oferecido. Ex: inicial de 1.200,00, a Combinar" title="Informe o salario oferecido. Ex: inicial de 1.200,00, a Combinar" required />
          </div>
          <label for="uf" class="col-sm-1 control-label">UF</label>
          <div class="col-sm-1">
            <select id="uf" class="form-control" name="uf" required>
              <option value=""></option>
              <!--@if(isset($state))-->
              <!--  @foreach($state as $st)-->
              <!--    <option value="{{$st->abbr}}" title="{{$st->name}}">{{$st->abbr}}</option>-->
              <!--  @endforeach-->
              <!--@endif-->
            </select>
          </div>
          <label for="cidade" class="col-sm-1 control-label">Cidade</label>
          <div class="col-sm-2">
            <span class="carregando">Aguarde, carregando...</span>
            <select id="cidade" name="cidade" class="form-control" required>
              <option id="escolhaEstado" value="">-- Escolha um estado --</option>
            </select>
          </div>
        </div>
        <div class="form-group">
          <label for="dtini" class="col-sm-2 control-label">Data de início</label>
          <div class="col-sm-3">
            <input id="dtini" class="form-control date"  type="text" name="dtini" placeholder="dd/mm/aaaa" data-mask="00/00/0000" title="Informe a data de início para a vaga. Ex: {{ date('d/m/Y') }}" required pattern="[0-9]{2}\/[0-9]{2}\/[0-9]{4}$" />
          </div>
          <label for="dtfin" class="col-sm-2 control-label">Data Final</label>
          <div class="col-sm-3">
            <input id="dtfin" class="form-control date"  type="text" name="dtfin" placeholder="dd/mm/aaaa" data-mask="00/00/0000" title="Informe a data final para a vaga. Ex: {{ date('d/m/Y') }}" required pattern="[0-9]{2}\/[0-9]{2}\/[0-9]{4}$"  />
          </div>
        </div>
        <div class="form-group">
          <label for="descricao" class="col-sm-2 control-label">Descrição</label>
          <div class="col-sm-8">
            <textarea id="descricao" name="descricao" class="form-control" rows="4" style="resize:none" required></textarea>
          </div>
        </div>
        <div class="form-group">
          <label for="exigencias" class="col-sm-2 control-label">Exigências</label>
          <div class="col-sm-8">
            <textarea id="exigencias" name="exigencias" class="form-control" rows="2" style="resize:none" ></textarea>
          </div>
        </div>
        <div class="form-group">
          <label for="beneficios" class="col-sm-2 control-label">Benefícios adicionais</label>
          <div class="col-sm-8">
            <textarea id="beneficios" name="beneficios" class="form-control" rows="2" style="resize:none" ></textarea>
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
  </script>
@endsection