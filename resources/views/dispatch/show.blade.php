@extends('layouts.dashboard')

@section('section')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 col-md-offset-2">       
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h4 style="text-align:center;"> Detalle de Despacho
                   @can('dispatch.edit')
                    <a href="{{ Route('dispatch.edit', $dispatch->id) }}" class="btn btn-sm btn-info pull-right">Editar</a>
                    @endcan
                    </h4>
                </div>

                
                  <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                <tbody>
                                <tr>
                                    <th> Nombre </th> 
                                    <th><h5>{{ $dispatch->exporter_id }}</h5></th>
                                </tr>

                                <tr>
                                    <th> Fecha Ingreso </th>
                                    <th><h5> {{ $dispatch->patentNo }}</h5></th>
                                </tr>
                            
                            </tbody>
                            </table>
                        </div>
                    </div>


            </div>
        </div>
     </div>
 </div>

 @endsection
