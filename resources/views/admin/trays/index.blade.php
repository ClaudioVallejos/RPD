@extends('layouts.dashboard')
@section('section')
<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-offset-0">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h4 style="text-align:center;">Control de Bandejas
                    @can('admin.trays.create')
                    <a href="{{ Route('admin.trays.create') }}" class="btn btn-info pull-right btn-sm"> Crear </a>
                    @endcan 
                  </h4>
                </div>

                <div class="form-group">
                   <table class="table table-bordered table-striped"> 
                       <thead class="thead-dark">
                           <tr>
                               <th>Nombre</th>
                               <th>bandejas de entrada</th>
                               <th>bandejas de salida</th>
                               
                               <th colspan="3">&nbsp;</th>
                           </tr>
                       </thead>
                       <tbody>
                       
                            @foreach($liststocks as $liststock)
                                 <tr>
                                     <td>{{ $liststock->provider->name   }} </td>
                                     <td>{{ $liststock->traysin   }} </td>
                                     <td>{{ $liststock->traysout   }} </td>
                              
                    
                           
                          

                           </tr>
                        @endforeach
                       </tbody>
                   </table>
                   {{ $liststocks->render() }}
                </div>
            </div>
        </div>
    </div>
</div>
@stop

 