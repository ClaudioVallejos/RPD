@extends('layouts.dashboard')

@section('section')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 col-md-offset-2">       
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h4 style="text-align:center;">Editar informacion del Productor</h4>
                        </div>
                @include('admin.providers.partials.errors')
                <div class="panel-body">
                	{!! Form::model($provider, ['route' => ['admin.providers.update', $provider->id],
                	'method' => 'PUT']) !!} 

                	@include('admin.providers.partials.form')

                	{!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
</div>
@stop