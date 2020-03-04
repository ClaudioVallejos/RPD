@extends('layouts.dashboard')

@section('section')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 col-md-offset-2">       
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h4 style="text-align:center;">Editar Temporada</h4>
                        </div>
                @include('admin.seasons.partials.errors')
                <div class="panel-body">
                	{!! Form::model($season, ['route' => ['admin.seasons.update', $season->id],
                	'method' => 'PUT']) !!} 

                	@include('admin.seasons.partials.form')

                	{!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
</div>
@stop