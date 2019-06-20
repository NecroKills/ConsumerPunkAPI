@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
      <div class="col-md-12">
        @if (session('alert'))
            <div class="col-md-12 alert alert-danger alert-block">
                {{ session('alert') }}
            </div>
        @endif
        <div class="panel panel-default">
          <div class="panel-heading"><strong>FILTRO DE BUSCA - PUNK API</strong></div>
          <div class="panel-body">
            <form class="" action="{{route('beers.name')}}" method="get">
              {{ csrf_field() }}
              <!-- DADOS DE PESQUISA -->
              <div class="form-group row" >
                <label for="name" class="col-md-6 col-form-label">Nome da Cerveja:
                  <hr class="mt">
                </label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" name="name" id="name" maxlength="100" required>
                </div>
              </div>
              <button id="pesquisar" type="submit">Filtrar<i class="fas fa-search"></i></button>
            </form>
          </div>
        </div>
      </div>
  </div>
  <div class="row">
    <div class="row"id="tabela">
      <div class="col-md-12">
        <table class="table table-bordered" id="table_id" width="100%" cellspacing="0">
          <thead class="bg-white">
            <tr>
              <th>Id</th>
              <th>Name</th>
              <th>description</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($beers as $beer)
            <tr>
              <td> {{ $beer->id }} </td>
              <td><a href="/beer/{{ $beer->id }}">{{$beer->name}}</a></td>
              <td> {{ $beer->description }} </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection
