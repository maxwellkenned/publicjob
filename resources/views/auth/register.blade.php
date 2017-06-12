@extends('layouts.app')

@section('content')
<div class="container text-blue">
  <h1>Cadastrar usuário</h1>
  <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
      {{ csrf_field() }}

      <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
          <label for="name" class="col-md-2 control-label">Nome</label>

          <div class="col-md-8">
              <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>
              @if ($errors->has('name'))
                  <span class="help-block">
                      <strong>{{ $errors->first('name') }}</strong>
                  </span>
              @endif
          </div>
      </div>
      <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
          <label for="email" class="col-md-2 control-label">E-mail</label>

          <div class="col-md-8">
              <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

              @if ($errors->has('email'))
                  <span class="help-block">
                      <strong>{{ $errors->first('email') }}</strong>
                  </span>
              @endif
          </div>
      </div>

      <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
          <label for="password" class="col-md-2 control-label">Senha</label>

          <div class="col-md-3">
              <input id="password" type="password" class="form-control" name="password" required>

              @if ($errors->has('password'))
                  <span class="help-block">
                      <strong>{{ $errors->first('password') }}</strong>
                  </span>
              @endif
          </div>

          <label for="password-confirm" class="col-md-2 control-label">Confirmar senha</label>

          <div class="col-md-3">
              <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
          </div>
      </div>
      @if (Isset(Auth::user()->is_admin) && Auth::user()->is_admin)
          <div class="form-group">
              <label class="col-md-2 control-label">Administrador</label>
              <div class="col-md-2" style="margin-left: -30px;">
                  <div class="radio">
                      <label class="radio-inline"><input type="radio" id="is_admin" name="is_admin" value="0" checked>Não</label>
                      <label class="radio-inline"><input type="radio" id="is_admin" name="is_admin" value="1" >Sim</label>
                  </div>
              </div>
          </div>
        @endif
      <div class="form-group">
          <div class="col-md-3 col-md-offset-7">
              <button type="submit" class="btn btn-primary btn-block">
                  Registrar
              </button>
          </div>
      </div>
  </form>
</div>
@endsection
