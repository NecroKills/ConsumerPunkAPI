@extends('layouts.app')

@section('content')
<div class="container">
      <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
          <div class="panel-heading">Meu Perfil: {{ Auth::user()->name }}</div>
          <form class="" action="{{route('user.update', $registro->id)}}" method="post">
            <div class="panel-body">
                {{ csrf_field() }}
                <input type="hidden" name="_method" value="put">
                <div class="row">
                  <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    <label for="name" class="col-md-4 control-label">Name</label>
                    <div class="col-md-6">
                      <input id="name" type="text" class="form-control" name="name" value="{{isset($registro->name) ? $registro->name : ''}}" autofocus>
                      @if ($errors->has('name'))
                        <span class="help-block">
                          <strong>{{ $errors->first('name') }}</strong>
                        </span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="email" class="col-md-4 control-label">E-Mail Address</label>
                    <div class="col-md-6">
                      <input id="email" type="email" class="form-control" name="email" value="{{isset($registro->email) ? $registro->email : ''}}" disabled>
                      @if ($errors->has('email'))
                        <span class="help-block">
                          <strong>{{ $errors->first('email') }}</strong>
                        </span>
                      @endif
                    </div>
                  </div>
                </div>
                <!-- Footer - Botões -->
            </div>
            <div class="panel-footer">
              <div class="row">
                <div class="col-md-2" id="primeiro">
                  <button type="submit" class="btn btn-success">Atualizar</button>
                </div>
              </form>
              <div class="col-md-10" id="ultimo">
                <button type="button" id="voltar" class="btn btn-primary">
                  <i class="fas fa-arrow-left font-color-footer"></i>Voltar</button>
                </div>
              </div>
            </div>
        </div>
      </div>
</div>
<!-- CSS -->
<style media="screen">
  /* troca a ordem das divs */
div#primeiro    {order: 2;}
div#ultimo      {order: 1;}
  /* fim trocar ordem das div */
</style>
@endsection
