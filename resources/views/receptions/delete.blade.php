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
               
                
                
                    <h4 style="text-align:center;">Tabla De Recepciones:</h4>
                    <br>
                  
                        <div class="table-responsive">
                            
                            <table id="laravel_datatable3" class=" table table-striped" style="width:100%">

                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="row">N° de tarja</th>
                                        <th scope="row">Fecha Ingreso</th>
                                        <th scope="row">Productor</th>
                                        <th scope="row">Calidad</th>
                                        <th scope="row">Fruta</th>
                                        <th scope="row">Variedad</th>
                                        <th scope="row">Cantidad de bandejas</th>
                                        <th scope="row">Peso neto</th>
                                        <th scope="row">Peso bruto</th>
                                        
                                        <th scope="row">Eliminar</th>

                                       
                                    </tr>
                                </thead>
                                <tbody>
                                     @foreach($receptions as $reception)
                                    <td>{{ $reception->tarja}}</td>
                                     <td>{{ $reception->created_at}}</td>
                                     <td>{{ $reception->provider->name}}</td>
                                     <td>{{ $reception->quality->name}}</td>
                                     <td>{{ $reception->fruit->specie}}</td>
                                     <td>{{ $reception->varieties->variety}}</td>
                                     <td>{{ $reception->quantity}}</td>
                                     <td>{{ $reception->netweight}}</td>
                                     <td>{{ $reception->grossweight}}</td>
                                  

                                    <td width="10px">

                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-sm btn-danger" data-toggle="modal"
                                        data-target="#exampleModalCenter{{$reception->id}}">
                                        Eliminar
                                    </button>

                                </td>

                            </tr>
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModalCenter{{$reception->id}}" tabindex="-1" role="dialog"
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
                                            @can('receptions.destroy')
                                            {!! Form::open(['route' => ['receptions.destroy', $reception->id],
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
{{ $receptions->render() }}


                     </div>
                    </div>
                </div>

            </div>
        </div>





@endsection