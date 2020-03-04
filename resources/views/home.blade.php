@extends('layouts.dashboard')
@section('page_heading','Dashboard')
@section('section')

    <div class="container">
        <div class="row">
                <img src="images/logo.png"  class="rounded mx-auto d-block" >

            <div class="col-md-12">
                <h1 class="text-center">
                    Bienvenido
                </h1>

            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="row my-3">
                        <div class="col-md-4">
                                <div class="card text-center card-info">
                                    <div class="card-block">
                                        <h4 class="card-title">Recepciones</h4>
                                        <h2><i class="fa fa-boxes fa-3x" style="color:#00F0FF"></i></h2>
                                    </div>
                                    <div class="row p-2 no-gutters">
                                        <div class="col-12">
                                            <div class="card card-block text-info rounded-0 border-left-0 border-top-o border-bottom-0">
                                                <h3>{{ $cuentaReception }}</h3>
                                                <span class="small text-uppercase">Realizas Hoy</span>
                                            </div>
                                        </div>
                                     
                                    </div>
                                    <div class="card card-block">
                                            <div class="card-footer text-center">
                                                <a class="btn btn-sm btn-primary" href="{{ Route ('receptions.create') }}"> Crear Recepción </a>
                                            </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card text-center card-info">
                                    <div class="card-block">
                                        <h4 class="card-title">Procesos</h4>
                                        <h2><i class="fa fa-pallet fa-3x" style="color:#FFEC00" ></i></h2>
                                    </div>
                                    <div class="row p-2 no-gutters">
                                        <div class="col-12">
                                            <div class="card card-block text-info rounded-0 border-left-0 border-top-o border-bottom-0">
                                                <h3>{{ $cuentaProcess}}</h3>
                                                <span class="small text-uppercase">Realizados Hoy</span>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <div class="card card-block">
                                            <div class="card-footer text-center">
                                                    <a class="btn btn-sm btn-primary" href="{{ Route ('process.processes.create') }}"> Crear Proceso </a>
                                            </div>
                                    </div>
                                </div>
                               
                            </div>
                            <div class="col-md-4">
                                <div class="card text-center card-info">
                                    <div class="card-block">
                                        <h4 class="card-title">Despachos</h4>
                                        <h2><i class="fa fa-truck-loading fa-3x" style="color:#55FF00"></i></h2>
                                    </div>
                                    <div class="row p-2 no-gutters">
                                        <div class="col-12">
                                            <div class="card card-block text-info rounded-0 border-left-0 border-top-o border-bottom-0">
                                                <h3>{{ $cuentaDispatch }}</h3>
                                                <span class="small text-uppercase">Realizados Hoy</span>
                                            </div>
                                        </div>
                                       
                                    </div>
                                    <div class="card card-block">
                                            <div class="card-footer text-center">
                                                    <a class="btn btn-sm btn-primary" href="{{ Route ('dispatch.create') }}"> Crear Despacho </a>
                                            </div>
                                    </div>
                                </div>
                            </div>          
                </div>
            </div>
        </div>
    
    </div>
    

      
@stop
