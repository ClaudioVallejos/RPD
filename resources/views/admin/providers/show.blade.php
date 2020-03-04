@extends('layouts.dashboard')

@section('section')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 col-md-offset-2">       
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h4 style="text-align:center;">Ficha del Productor</h4>
                        </div>

                <div class="panel-body">
                	<p><strong>Nombre</strong> {{ $provider->name    }}</p>
                    <p><strong>Rut de guia</strong> {{ $provider->rut    }}</p>
                    <p><strong>Direccion</strong> {{ $provider->address }}</p>
                    <p><strong>Numero Telefonico</strong> {{ $provider->number_phone }}</p>                  
                    <p><strong>Calidad promedio de fruta</strong> {{$prom }}  % </p> 

                    
                </p>
                </div>
            </div>
        </div>
    </div>
</div>
@stop