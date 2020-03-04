@extends('layouts.dashboard')
@section('section')
<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-offset-0">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h4 style="text-align:center;">Insumos
                    @can('subprocess.create')
                    @endcan 
                  </h4>
                </div>

                <div class="panel-body">
                   <table class="table table-striped table-hover"> 
                       <thead>
                           <tr>
                               <th>Nª de tarja</th>
                               <th>Cantidad</th>
                               <th>Formato</th>
                               <th>Calidad</th>
                               <th>Estatus</th>
                               <th>Inicio Folio</th>
                               <th>Fin Folio</th>

                               <th colspan="3">&nbsp;</th>
                           </tr>
                       </thead>
                       <tbody>
                        @foreach($subprocesses as $subprocess)
                           <tr>
                                <td>P00{{ $subprocess->id }}</td>
                                <td>{{ $subprocess->quantity  }}</td>
                                <td>{{ $subprocess->format->name  }}</td>
                                <td>{{ $subprocess->quality->name  }}</td>
                                <td>{{ $subprocess->weight  }}</td>
                                <td>{{ $subprocess->folioStart  }}</td>
                                <td>{{ $subprocess->folioEnd  }}</td>
 
                                <td width="10px">
                                    @can('subprocess.edit')
                                    <a 
                                    href="{{ Route('subprocess.edit', $subprocess->id) }}" 
                                    class="btn btn-sm btn-info">
                                        Editar {{$subprocess->id}}
                                    </a>
                                    @endcan
                                </td>
                           </tr>
                        @endforeach
                       </tbody>
                   </table>
                   {{ $subprocesses->render() }}
                </div>
            </div>
        </div>
    </div>
</div>
@stop