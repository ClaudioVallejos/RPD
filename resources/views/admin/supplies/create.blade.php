@extends('layouts.dashboard')

@section('section')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 col-md-offset-2">       
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h4 style="text-align:center;">Creacion de Bandeja:</h4>
                        </div>
                @include('admin.supplies.partials.errors')
                <div class="panel-body">
                	{!! Form::open(['route' => 'admin.supplies.store']) !!} 

                	@include('admin.supplies.partials.form')

                	{!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
</div>
@stop