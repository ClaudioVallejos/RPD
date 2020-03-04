@extends('layouts.dashboard')

@section('section')
<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-offset-0">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h4 style="text-align:center;"> Motivos de Rechazo
                        @can('admin.rejecteds.create')
                        <a href="{{ Route('admin.rejecteds.create') }}" class="btn btn-info pull-right"> Crear </a>
                        @endcan
                    </h4>
                </div>

                <div class="form-group">
                    <table class="table table-bordered table-striped ">
                        <thead class="thead-dark">
                            <tr>
                                <th>Motivo</th>



                                <th colspan="3">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach($motivorejecteds as $motivorejected)

                            <tr>
                                <td>{{ $motivorejected->name   }}</td>




                                <td width="10px">
                                    @can('admin.rejecteds.edit')
                                    <a href="{{ Route('admin.rejecteds.edit', $motivorejected->id) }}"
                                        class="btn btn-sm btn-info">
                                        Editar
                                    </a>
                                    @endcan
                                </td>
                                <td width="10px">
                                    <button type="button" class="btn btn-sm btn-danger" data-toggle="modal"
                                        data-target="#exampleModalCenter{{$motivorejected->id}}">
                                        Eliminar
                                    </button>
                                </td>

                            </tr>

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModalCenter{{$motivorejected->id}}" tabindex="-1" role="dialog"
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
                                            @can('admin.rejecteds.destroy')
                                            {!! Form::open(['route' => ['admin.rejecteds.destroy', $motivorejected->id],
                                            'method' => 'DELETE' ]) !!}
                                            <button class="btn btn-sm btn-danger">Eliminar</button>
                                            {!! Form::close() !!}
                                            @endcan </div>
                                    </div>
                                </div>
                                @endforeach

                        </tbody>
                    </table>
                    {{$motivorejecteds->render()}}
                </div>
            </div>
        </div>
    </div>
</div>
@stop