@extends('layouts.dashboard')

@section('section')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Crear un Rol de usuario
                </div>

                <div class="panel-body">
                	{!! Form::open(['route' => 'roles.store']) !!} 

                	@include('roles.partials.form')

                	{!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
</div>
@stop