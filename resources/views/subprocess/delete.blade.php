@extends('layouts.dashboard')
@section('section')
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: center;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>

<div class="container-fluid px-4">
    <div class="responsive">
        <div class=" ">

            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 style="text-align:center;">PANEL DE ELIMINACIÓN
                       
                    </h3>
                   
                </div>
                <br>

             
                    <h4 style="text-align:center;">Tabla De Producto sin Terminar:</h4>
                    <br>
                  
                        <div class="table-responsive">
                            
                            <table id="laravel_datatable3" class=" table table-striped" style="width:100%">

                                <thead class="thead-dark">
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
                                <td>PT00{{ $subprocess->id }}</td>
                                <td>{{ $subprocess->quantity  }}</td>
                                <td>{{ $subprocess->format->name  }}</td>
                                <td>{{ $subprocess->quality->name  }}</td>
                                <td>{{ $subprocess->weight  }}</td>
                                <td>{{ $subprocess->folioStart  }}</td>
                                <td>{{ $subprocess->folioEnd  }}</td>
 
                                  <td width="10px">

                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-sm btn-danger" data-toggle="modal"
                                        data-target="#exampleModalCenter{{$subprocess->id}}">
                                        Eliminar
                                    </button>

                                </td>

                            </tr>
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModalCenter{{$subprocess->id}}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">Eliminar</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            ¿Esta seguro que desea eliminar?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-sm btn-secondary"
                                                data-dismiss="modal">Cerrar</button>
                                            @can('subprocess.destroy')
                                            {!! Form::open(['route' => ['subprocess.destroy', $subprocess->id],
                                            'method' => 'DELETE' ]) !!}
                                            <button class="btn btn-sm btn-danger">Eliminar</button>
                                            {!! Form::close() !!}
                                            @endcan </div>
                                    </div>
                                </div>
                                @endforeach

                                </tbody>
                                <tfoot>



                                </tfoot>
                            </table>
                   {{ $subprocesses->render() }}
                </div>
            </div>
        </div>
    </div>
</div>
@stop