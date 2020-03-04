@extends('layouts.dashboard')


@section('content')

<div class="container">
@if (\Reception::has('success'))
      <div class="alert alert-success">
        <p>{{ \Reception::get('success') }}</p>
      </div><br />
     @endif
   <div class="panel panel-default">
         <div class="panel-heading">
             <h2>Calendario de recepcion</h2>
                @can('receptions.create')
                        <a href="{{route('receptions.create')}}" class="btn btn-primary btn-md"> <i class="fas fa-user-plus"> </i></a>
                    @endcan
         </div>
         <div class="panel-body" >
            {!! $calendar->calendar() !!}
        </div>
    </div>
</div>

<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>


{!! $calendar->script() !!}
