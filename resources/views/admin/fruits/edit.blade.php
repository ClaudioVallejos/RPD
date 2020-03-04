@extends('layouts.dashboard')

@section('section')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 col-md-offset-2">       
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h4 style="text-align:center;">Editar Informacion de la fruta</h4>
                        </div>

                @include('admin.fruits.partials.errors')
                <div class="panel-body">
                	{!! Form::model($fruit, ['route' => ['admin.fruits.update', $fruit->id],
                	'method' => 'PUT']) !!} 

                	@include('admin.fruits.partials.form')

                	{!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
</div>
@stop