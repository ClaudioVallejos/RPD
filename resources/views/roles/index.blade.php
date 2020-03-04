@extends('layouts.dashboard')

@section('section')
<div class="container">
    <div class="row">
        <div class="col-md-11 col-md-offset-0">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Roles
                    @can('roles.create')
                    <a href="{{ Route('roles.create') }}" class="btn btn-sm btn-primary pull-right"> Crear </a>
                    @endcan
                </div>

                <div class="panel-body">
                    <table class="table table-striped table-hover ">
                        <thead>
                            <tr>
                                <th width="10px">id</th>
                                <th>Role</th>
                                <th colspan="3">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($roles as $role)
                            <tr>
                                <td>{{ $role->id }}</td>
                                <td>{{ $role->name  }}</td>
                                <td width="10px">
                                    @can('roles.show')
                                    <a href="{{ Route('roles.show', $role->id) }}"
                                        class="btn btn-sm btn-default">Ver</a>
                                    @endcan
                                <td>
                                <td width="10px">
                                    @can('roles.edit')
                                    <a href="{{ Route('roles.edit', $role->id) }}"
                                        class="btn btn-sm btn-info">Editar</a>
                                    @endcan
                                <td>
                                <td width="10px">
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-sm btn-danger" data-toggle="modal"
                                        data-target="#exampleModalCenter{{$role->id}}">
                                        Eliminar
                                    </button>

                                <td>
                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModalCenter{{$role->id}}" tabindex="-1"
                                        role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLongTitle">Eliminar</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    ¿Esta seguro que desea eliminar?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-sm btn-secondary"
                                                        data-dismiss="modal">Cerrar</button>

                                                    @can('roles.destroy')
                                                    {!! Form::open(['route' => ['roles.destroy', $role->id],
                                                    'method' => 'DELETE' ]) !!}
                                                    <button class="btn btn-sm btn-danger">Eliminar</button>
                                                    {!! Form::close() !!}
                                                    @endcan
                                                </div>
                                            </div>
                                        </div>

                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $roles->render() }}
                </div>
            </div>
        </div>
    </div>
</div>
@stop