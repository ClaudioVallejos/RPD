@extends('layouts.dashboard')

@section('section')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 col-md-offset-2">       
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h4 style="text-align:center;">Creación de Subreprocesos</h4>
                        </div>
                @include('subreprocess.partials.errors')
                <div class="panel-body">
                	{!! Form::open(['route' => 'subreprocess.store']) !!} 

                	@include('subreprocess.partials.form')

                	{!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
</div>
@stop