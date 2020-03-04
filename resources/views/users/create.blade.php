@extends('layouts.dashboard')

@section('section')
<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-offset-0">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Usuario
                </div>
            @include('users.partials.errors')
                <div class="panel-body">

                	{!! Form::open(['route' => 'users.store']) !!} 

                    @include('users.partials.form')

                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
</div>
@stop