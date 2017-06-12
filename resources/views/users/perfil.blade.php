@extends('layouts.app')

@section('content')
<div class="content text-blue">
    <div class="">
      <h1>Cadastrar Currículo</h1>
      <form id="form" class="form-horizontal">
        {{csrf_field()}}
        <div class="form-group">
          <label for="nome" class="col-sm-2 control-label">Nome completo</label>
          <div class="col-sm-8">
            <input id="nome" class="form-control"  type="text" name="nome" value="{{$c->nome}}" readonly="true"/>
          </div>
        </div>
        <div class="form-group">
          <label for="cpf" class="col-sm-2 control-label">CPF</label>
          <div class="col-sm-3">
            <input id="cpf" class="form-control"  type="text" name="cpf" value="{{$c->cpf}}" readonly="true"/>
          </div>
          <label for="email" class="col-sm-1 control-label">E-mail</label>
          <div class="col-sm-4">
            <input id="email" class="form-control"  type="email" name="email" value="{{$c->email}}" readonly="true"/>
          </div>
        </div>
        <div class="form-group">
          <label for="nacionalidade" class="col-sm-2 control-label">Nacionalidade</label>
          <div class="col-sm-2">
            <input id="nacionalidade" class="form-control"  type="text" name="nacionalidade" value="{{$c->nacionalidade}}" readonly="true"/>
          </div>
          <label for="sexo" class="col-sm-1 control-label">Sexo</label>
          <div class="col-sm-2">
            <input id="sexo" class="form-control"  type="text" name="sexo" value="{{$c->sexo=='M'?'Masculino':'Feminino'}}" readonly="true"/>
          </div>
          <label for="idade" class="col-sm-1 control-label">Idade</label>
          <div class="col-sm-2">
            <input id="idade" class="form-control"  type="number" name="idade" value="{{$c->idade}}" readonly="true"/>
          </div>
        </div>
        <div class="form-group">
          <label for="estadocivil" class="col-sm-2 control-label">Estado Civil</label>
          <div class="col-sm-3">
            <select id="estadocivil" class="form-control" name="estadocivil" required>
              <input id="estadocivil" class="form-control"  type="text" name="estadocivil" value="{{$c->estadocivil}}" readonly="true"/>
          </div>
          <label for="filhos" class="col-sm-1 control-label">Tem Filho(s)?</label>
          <div class="col-sm-2">
            <input id="filhos" class="form-control"  type="text" name="filhos" value="{{$c->filhos?'Sim':'Não'}}" readonly="true"/>
          </div>
        </div>
        <div class="form-group">
          <label for="endereco" class="col-sm-2 control-label">Endereço</label>
          <div class="col-sm-8">
            <input id="endereco" class="form-control"  type="text" name="endereco" value="{{$c->endereco}}" readonly="true" />
          </div>
        </div>
        <div class="form-group">
          <label for="uf" class="col-sm-2 control-label">Estado</label>
          <div class="col-sm-1">
            <input id="uf" class="form-control"  type="text" name="uf" value="{{$c->estado}}" readonly="true" />
          </div>
          <label for="cidade" class="col-sm-1 control-label">Cidade</label>
          <div class="col-sm-3">
            <input id="cidade" class="form-control"  type="text" name="cidade" value="{{$c->cidade}}" readonly="true" />
          </div>
          <label for="tel" class="col-sm-1 control-label">Telefone</label>
          <div class="col-sm-2">
            <input id="tel" class="form-control date"  type="text" name="tel"  value="{{$c->telefone}}" readonly="true" />
          </div>
        </div>
        <div class="form-group">
          <label for="rd" class="col-sm-2 control-label">Redes Sociais</label>
          <div class="col-sm-8">
            <textarea id="rd" name="xp" class="form-control" rows="4" style="resize:none"  readonly="true">{{$c->rd}}</textarea>
          </div>
        </div>
        <div class="form-group">
          <label for="arquivo" class="col-sm-2 control-label">Anexar arquivo</label>
          <div class="col-sm-8">
          <input id="arquivo" class="form-control"  type="text" name="arquivo"  value="{{$c->arquivo}}" readonly="true"  />
          </div>
        </div>
        <div class="form-group">
          <label for="atividades" class="col-sm-2 control-label">Qualificações e atividades complementares</label>
          <div class="col-sm-8">
            <textarea id="atividades" name="atividades" class="form-control" rows="4" style="resize:none"  readonly="true">{{$c->atividades}}</textarea>
          </div>
        </div>
        <div class="form-group">
          <label for="xp" class="col-sm-2 control-label">Experiência profissional</label>
          <div class="col-sm-8">
            <textarea id="xp" name="xp" class="form-control" rows="4" style="resize:none"  readonly="true">{{$c->xp}}</textarea>
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