@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard Punk API</div>
                <div class="panel-body">
                  <form class="" action="" method="get">
                    {{ csrf_field() }}
                    <!-- DADOS DE PESQUISA -->
                    <div class="form-group row" >
                      <label for="id" class="col-md-6 col-form-label">ID:
                        <hr class="mt">
                      </label>
                      <div class="col-sm-6">
                        <input type="text" class="form-control" name="id" id="id" maxlength="100">
                      </div>
                    </div>
                    <div class="form-group row" >
                      <label for="nome" class="col-md-6 col-form-label">Nome Cerveja:
                        <hr class="mt">
                      </label>
                      <div class="col-sm-6">
                        <input type="text" class="form-control" name="nome" id="nome" maxlength="100">
                      </div>
                    </div>
                  </div>
                <div class="panel-footer">
                  <button id="pesquisar" type="submit">
                    Filtrar
                    <i class="fas fa-search"></i>
                  </button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <div class="row">
      <div class="row"id="tabela">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Lista de cervejas</div>
                  <table class="table table-bordered" id="table_id" width="100%" cellspacing="0">
                    <thead>
                      <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>description</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($beers as $beer)
                      <tr>
                        <td>{{$beer->id}}</td>
                      <a href="/beers/{{ $beer->id }}">  <td>{{$beer->name}}</td> </a>
                        <td>{{$beer->description}}</td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
            </div>
          </div>
        </div>
@endsection
