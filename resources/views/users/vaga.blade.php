@extends('layouts.app')

@section('content')

<div class="content text-blue">
    <div class="">
      <h1>Cadastrar Vaga</h1>
      <form id="form" class="form-horizontal">
        {{csrf_field()}}
        <div class="form-group">
          <label for="empresa" class="col-sm-2 control-label">Empresa</label>
          <div class="col-sm-8">
            <input id="empresa" class="form-control"  type="text" name="empresa" value="{{$vaga->empresa}}" />
          </div>
        </div>
        <div class="form-group">
          <label for="titulo" class="col-sm-2 control-label">Título da vaga</label>
          <div class="col-sm-8">
            <input id="titulo" class="form-control"  type="text" name="titulo"  value="{{$vaga->titulo}}" readonly="true" />
          </div>
        </div>
        <div class="form-group">
          <label for="jornada" class="col-sm-2 control-label">Jornada</label>
          <div class="col-sm-3">
            <input id="jornada" class="form-control"  type="text" name="jornada" value="{{$vaga->jornada}}" readonly="true"/>
          </div>
          <label for="contrato" class="col-sm-2 control-label">Tipo de contrato</label>
          <div class="col-sm-3">
            <input id="contrato" class="form-control"  type="text" name="contrato" value="{{$vaga->contrato}}" readonly="true"/>
          </div>
        </div>
        <div class="form-group">
          <label for="salario" class="col-sm-2 control-label">Salário</label>
          <div class="col-sm-3">
            <input id="salario" class="form-control"  type="text" name="salario" value="{{$vaga->salario}}" readonly="true" />
          </div>
          <label for="uf" class="col-sm-1 control-label">UF</label>
          <div class="col-sm-1">
            <input id="uf" class="form-control"  type="text" name="uf" value="{{$vaga->UF}}" readonly="true" />
          </div>
          <label for="cidade" class="col-sm-1 control-label">Cidade</label>
          <div class="col-sm-2">
            <input id="cidade" class="form-control"  type="text" name="cidade" value="{{$vaga->cidade}}" readonly="true" />
          </div>
        </div>
        <div class="form-group">
          <label for="dtini" class="col-sm-2 control-label">Data de início</label>
          <div class="col-sm-3">
            <input id="dtini" class="form-control date"  type="text" name="dtini"  value="{{ Carbon\Carbon::parse($vaga->dt_ini)->format('d/m/Y')  }}" data-mask="00/00/0000"  readonly="true" />
          </div>
          <label for="dtfin" class="col-sm-2 control-label">Data Final</label>
          <div class="col-sm-3">
            <input id="dtfin" class="form-control date"  type="text" name="dtfin" value="{{Carbon\Carbon::parse($vaga->dt_fin)->format('d/m/Y')}}" data-mask="00/00/0000" readonly="true" />
          </div>
        </div>
        <div class="form-group">
          <label for="descricao" class="col-sm-2 control-label">Descrição</label>
          <div class="col-sm-8">
            <textarea id="descricao" name="descricao" class="form-control" rows="4" style="resize:none" readonly="true" >{{$vaga->descricao}}</textarea>
          </div>
        </div>
        <div class="form-group">
          <label for="exigencias" class="col-sm-2 control-label">Exigências</label>
          <div class="col-sm-8">
            <textarea id="exigencias" name="exigencias" class="form-control" rows="2" style="resize:none"  readonly="true" >{{$vaga->exigencias}}</textarea>
          </div>
        </div>
        <div class="form-group">
          <label for="beneficios" class="col-sm-2 control-label">Benefícios adicionais</label>
          <div class="col-sm-8">
            <textarea id="beneficios" name="beneficios" class="form-control" rows="2" style="resize:none"  readonly="true">{{$vaga->beneficios}}</textarea>
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-8 col-md-offset-2">
            <a href="/enviarcv/{{$vaga->id}}" class="btn btn-warning btn-block enviar-cv">Enviar Curriculo</a>
          </div>
        </div>
      </form>
    </div>
</div>
@endsection
@section('script')
  <script type="text/javascript" src="/jQuery-Mask-Plugin/dist/jquery.mask.min.js"></script>
  <script type="text/javascript">
  $(function(){
      console.log($('#dtini')+'asdasd');
  });
    function formatarData(date){
      var dateSplit = date.split('-');
      var ano = dateSplit[0];
      var mes = dateSplit[1];
      var dia = dateSplit[2];
      
      return dia+'/'+mes+'/'+ano;
    };
  </script>
@endsection