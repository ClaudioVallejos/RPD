@extends('layouts.dashboard')

@section('section')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 col-md-offset-2">       
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h4 style="text-align:center;">Editar Informacion del formato</h4>
                        </div>

                @include('admin.formats.partials.errors')
                <div class="panel-body">
                	{!! Form::model($format, ['route' => ['admin.formats.update', $format->id],
                	'method' => 'PUT']) !!} formats

                	@include('admin.formats.partials.form')

                	{!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
</div>
@stop