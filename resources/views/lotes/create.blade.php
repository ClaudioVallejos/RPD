@extends('layouts.dashboard')

@section('section')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 col-md-offset-2">       
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h4 style="text-align:center;">Ingresar Nuevo Lote a camara:</h4>
                        </div>

                @include('lotes.partials.errors')
                <div class="panel-body">
                	{!! Form::open(['route' => 'lotes.store']) !!} 

                	@include('lotes.partials.formsearch')

                	{!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
</div>
@stop