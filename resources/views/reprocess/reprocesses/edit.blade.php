@extends('layouts.dashboard')

@section('section')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 col-md-offset-2">       
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h4 style="text-align:center;">Editar Proceso</h4>
                        </div>

                <div class="panel-body">
                	{!! Form::model($process, ['route' => ['process.processes.update', $process->id],
                	'method' => 'PUT']) !!} 

                	@include('subprocess.partials.form')

                	{!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
</div>
@stop