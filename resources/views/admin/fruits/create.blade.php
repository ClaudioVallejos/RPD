@extends('layouts.dashboard')

@section('section')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 col-md-offset-2">       
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h4 style="text-align:center;">Ingresar Nuevo tipo de Fruta:</h4>
                        </div>

                @include('admin.fruits.partials.errors')
                <div class="panel-body">
                	{!! Form::open(['route' => 'admin.fruits.store']) !!} 

                	@include('admin.fruits.partials.form')

                	{!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
</div>
@stop