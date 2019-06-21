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
                <label for="name" class="col-md-2 col-form-label"><span class="required" style="color: red;">*</span> Nome da Cerveja:
                  <hr class="mt">
                </label>
                <div class="col-md-7 col-sm-6">
                  <input type="text" class="form-control" name="name" id="name" maxlength="100" required>
                </div>
                <div class="col-md-1 col-sm-6">
                  <button type="submit" class="btn btn-success">buscar</button>
                </div>
              </div>
            </form>

            <form class="" action="{{route('beers.filtro')}}" method="get">
              {{ csrf_field() }}
              <!-- DADOS DE PESQUISA -->
              <div class="form-group" >
                <div class="row">
                  <label for="tipo1" class="col-md-4 col-form-label"><span class="required" style="color: red;">*</span> Selecione uma opção:</label>
                  <label for="tipo2" class="col-md-4 col-form-label"><span class="required" style="color: red;">*</span> Selecione uma opção:</label>
                  <label for="valor" class="col-md-4 col-form-label"><span class="required" style="color: red;">*</span> Valor:</label>
                </div>
                <div class="row">
                  <div class="col-md-4 col-sm-6">
                    <select class="form-control" name="tipo1">
                      <option disabled="disabled" selected="selected">selecione</option>
                      <option value="abv_">ABV</option>
                      <option value="mother_">IBU</option>
                      <option value="ebc_">EBC</option>
                    </select>
                  </div>
                  <div class="col-md-4 col-sm-6">
                    <select class="form-control" name="tipo2">
                      <option disabled="disabled" selected="selected">selecione</option>
                      <option value="gt">Valor maior que</option>
                      <option value="lt">Valor menor que</option>
                    </select>
                  </div>
                  <div class="col-md-4 col-sm-6">
                    <input type="text" class="form-control" name="valor" maxlength="100" required>
                  </div>
                </div>
              </div>
              <button type="submit" class="btn btn-success">Filtrar</button>
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
              <th>Name</th>
              <th>description</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($beers as $beer)
            <tr>
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
