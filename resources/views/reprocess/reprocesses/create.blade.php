@extends('layouts.dashboard')

@section('section')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 col-md-offset-1">       
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h4 style="text-align:center;">Crear Nuevo Reproceso</h4>
                        </div>

                <div class="panel-body">
                	{!! Form::open(['route' => 'reprocess.reprocesses.store']) !!} 

                	@include('reprocess.reprocesses.partials.form')

                	{!! Form::close() !!}

                </div> 
            </div>
        </div>
    </div>

  </div>
@stop


