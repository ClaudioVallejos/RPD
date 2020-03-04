@extends('layouts.dashboard')

@section('section')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Usuario
                </div>

                <div class="panel-body">
                	<p><strong>Nombre</strong> {{ $user->name }}</p>
                	<p><strong>Rut de usuario</strong> {{ $user->email }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@stop