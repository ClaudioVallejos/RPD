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

               
                <h4 style="text-align:center;">Tabla de Procesos:</h4>
                <br>
                
                <br>
                <div class="table-responsive">
                    <table id="laravel_datatable" style="width:100%" class=" table table-striped">
                        <thead class="thead-dark">
                            <tr>
                                <th>Codigo de pallet procesado</th>
                                <th>Fecha Ingreso</th>
                                <th>Estatus</th>
                                <th>Fruta</th>
                                <th>Variedad</th>
                                <th>Fruta Lavada</th>
                                <th>Eliminar</th>



                                        


                            </tr>
                        </thead>
                        <tbody>
                                     @foreach($processes as $process)
                                    <td>{{ $process->tarja_proceso}}</td>
                                     <td>{{ $process->created_at}}</td>
                                     <td>{{ $process->status->name}}</td>
                                     <td>{{ $process->fruit->specie}}</td>
                                     <td>{{ $process->varieties->variety}}</td>
                                     <td>{{ $process->wash}}</td>
                                     

                                    <td width="10px">

                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-sm btn-danger" data-toggle="modal"
                                        data-target="#exampleModalCenter{{$process->id}}">
                                        Eliminar
                                    </button>

                                </td>

                            </tr>
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModalCenter{{$process->id}}" tabindex="-1" role="dialog"
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
                                            @can('process.processes.destroy')
                                            {!! Form::open(['route' => ['process.processes.destroy', $process->id],
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
{{ $processes->render() }}
                </div>
               
            </div>
        </div>
    </div>
</div>
@endsection