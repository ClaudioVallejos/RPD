@extends('layouts.dashboard')

@section('section')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 col-md-offset-2">       
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h4 style="text-align:center;">Editar Informacion de la fruta</h4>
                        </div>

                @include('admin.varieties.partials.errors')
                <div class="panel-body">
                	{!! Form::model($variety, ['route' => ['admin.varieties.update', $variety->id],
                	'method' => 'PUT']) !!} 

                	@include('admin.varieties.partials.form')

                	{!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
</div>
@stop