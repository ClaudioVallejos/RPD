@extends('layouts.dashboard')

@section('section')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 col-md-offset-2">       
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h4 style="text-align:center;">Editar informacion de subprocesos</h4>
                        </div>
                @include('subprocess.partials.errors')
                <div class="panel-body">
                	{!! Form::model($subProcess, ['route' => ['subprocess.update', $subProcess->id],
                	'method' => 'PUT']) !!} 

                	@include('subprocess.partials.form')

                	{!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
</div>
@stop