@extends('layouts.dashboard')

@section('section')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h4 style="text-align:center;">Detalle de Pallet: </h4>
                    <a class="btn btn-sm btn-danger pull-left " href="{{ Route ('lotes.index') }}"> Salir </a>
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="table-responsive">
                        
                        
                        <table class="table table-hover">

                            <tbody>
                            @foreach($lotes as $lote)
                                <tr class="table-dark text-danger">
                                    <th> Tarja</th>
                                    <th> {{ $lote->numero_lote }}</th>
                                </tr>
                                <tr class="table-dark text-dark">
                                    <th> Fruta</th>
                                    <th> {{ $lote->fruit->specie }} - {{$lote->varieties->variety}} </th>
                                </tr>
                                <tr class="table-dark text-dark">
                                    <th> Calidad</th>
                                    <th> {{ $lote->quality->name }} </th>
                                </tr>
                                @endforeach
                                @foreach($subprocess as $subproces)
                                <tr class="table-light text-dark">
                                    <th> Tarja </th>
                                    <th> PT00{{ $subproces->sub_process_id }}</th>
                                </tr>
                                @endforeach
                                <br>
                            </tbody>

                        </table>
                        
                        
                    </div>
                    <!-- /.table-responsive -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
    </div>
</div>
<!-- /.col-lg-6 -->
@stop