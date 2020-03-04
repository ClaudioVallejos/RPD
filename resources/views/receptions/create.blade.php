@extends('layouts.dashboard')

@section('section')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10 col-md-offset-1 ">       
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h4 style="text-align:center;">Crear Recepcion
                        </div>

                <div class="panel-body">
                    {!! Form::open(['route' => 'receptions.store']) !!} 

                    @include('receptions.partials.form')

                    {!! Form::close() !!}

                </div>
            </div>

        </div>
    </div>
  </div>
  

@endsection
