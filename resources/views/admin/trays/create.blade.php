@extends('layouts.dashboard')

@section('section')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 col-md-offset-2">       
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h4 style="text-align:center;">Control de registro de bandejas</h4>
                        </div>
                @include('admin.trays.partials.errors')
                <div class="panel-body">
                	{!! Form::open(['route' => 'admin.trays.store']) !!} 

                	@include('admin.trays.partials.form')

                	{!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
</div>
@stop