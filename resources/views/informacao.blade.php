@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
      <div class="row"id="tabela">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Descrição da cerveja</div>
                  <table class="table table-bordered" id="table_id" width="100%" cellspacing="0">
                    <thead>
                      <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>tagline</th>
                        <th>first_brewed</th>
                        <th>description</th>
                        <th>image_url</th>
                        <th>abv</th>
                        <th>ibu</th>
                        <th>target_fg</th>
                        <th>target_og</th>
                        <th>ebc</th>
                        <th>srm</th>
                        <th>ph</th>
                        <th>attenuation_level</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        @foreach ($beer as $beer)
                        <td>{{$beer->id}}</td>
                        <td>{{$beer->name}}</td>
                        <td>{{$beer->tagline}}</td>
                        <td>{{$beer->first_brewed}}</td>
                        <td>{{$beer->description}}</td>
                        <td>
                          <li>
                            <a href="{{$beer->image_url}}"><img src="{{$beer->image_url}}"
                              style="max-width:200px; max-height:150px; width: auto; height: auto"/></a>
                          </li>
                        </td>
                        <td>{{$beer->abv}}</td>
                        <td>{{$beer->ibu}}</td>
                        <td>{{$beer->target_fg}}</td>
                        <td>{{$beer->target_og}}</td>
                        <td>{{$beer->ebc}}</td>
                        <td>{{$beer->srm}}</td>
                        <td>{{$beer->ph}}</td>
                        <td>{{$beer->attenuation_level}}</td>
                        @endforeach
                      </tr>
                      </tbody>
                    </tbody>
                  </table>
                </div>
            </div>
          </div>
        </div>
        <style media="screen">
          .img{

          }
        </style>
@endsection
