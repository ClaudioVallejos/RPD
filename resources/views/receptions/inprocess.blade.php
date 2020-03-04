@extends('layouts.dashboard')

@section('section')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10 col-md-offset-1 ">       
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h4 style="text-align:center;">Recepcionados en proceso
                    @can('inprocess.create')
                    <a href="{{ Route('receptions.create') }}" class="btn btn-sm btn-primary pull-right"> Crear </a>
                    @endcan
                </div>

               <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr class="">
                             
                               <th>Peso bruto</th>
                               <th>Peso neto</th>

                               <th>Proveedores</th>
                               <th>Fruta</th>
                               <th>Calidad</th>
                               
                               <th>Nombre del chofer</th>
                               <th>N° de guia</th>
                               <th>N° de tarja</th>
                               <th>creado</th>

                               <th colspan="auto">&nbsp;</th>
                           </tr>
                       </thead>
                       <tbody>
                        @foreach($inprocess as $inprocesslis)
                           <tr>
                                <td>{{ $inprocesslis->grossweight  }} Kg.</td>
                                <td>{{ $inprocesslis->netweight  }} Kg.</td>
                                <td>{{ $inprocesslis->provider->name  }}</td>
                                <td>{{ $inprocesslis->fruit->name  }}</td>
                                <td>{{ $inprocesslis->quality->name  }}</td>
                                <td>{{ $inprocesslis->name_driver  }}</td>
                                <td>{{ $inprocesslis->number_guide }}</td>
                                <td>{{ $inprocesslis->tarja }}</td>
                                 <td>{{ $inprocesslis->created_at }}</td>
                                

    
                                <td width="8px">
                                    @can('inprocess.show')
                                    <a href="{{ Route('receptions.show', $inprocesslis->id) }}" class="btn btn-sm btn-default">Ver</a>
                                    @endcan
                                <td>
                                <td width="8px">
                                    @can('inprocess.edit')
                                    <a href="{{ Route('receptions.edit', $inprocesslis->id) }}" class="btn btn-sm btn-info">Editar</a>
                                    @endcan
                                <td>
                                <td width="8px">
                                    @can('receptions.destroy')
                                    {!! Form::open(['route' => ['receptions.destroy', $inprocesslis->id],
                                    'method' => 'DELETE' ]) !!}
                                        <button class="btn btn-sm btn-danger">Eliminar</button>
                                    {!! Form::close() !!}
                                    @endcan
                                <td>    

                           </tr>
                        @endforeach
                       </tbody>
                   </table>
                   {{ $inprocess->render() }}

                </div>
            </div>
        </div>
    </div>
            </div>
        </div>
    </div>
</div>
@endsection
 