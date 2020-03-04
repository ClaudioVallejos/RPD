@extends('layouts.dashboard')

@section('section')
<div class="container">
    <div class="row">
        <div class="col-md-9 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Rol
                </div>

                <div class="panel-body">
                	<p><strong>Nombre</strong> {{ $role->name }}</p>
                 	<p><strong>Slug</strong> {{ $role->slug }}</p>
                	<p><strong>Descripción</strong> {{ $role->description }}</p>

                </div>
            </div>
        </div>
    </div>
</div>
@stop