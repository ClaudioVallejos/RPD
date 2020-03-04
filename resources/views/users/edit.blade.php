@extends('layouts.dashboard')

@section('section')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Usuario
                </div>

                <div class="panel-body">
                	{!! Form::model($user, ['route' => ['users.update', $user->id],
                	'method' => 'PUT']) !!} 

                	@include('users.partials.edit')

                	{!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
</div>
@stop