@extends('layouts.dashboard')
@section('section')
<div class="container-fluid px-4">

    @if (\Session::has('success'))
    <div class="col-md-12">
        <div class="alert alert-success">
            <ul>
                <li>{!! \Session::get('success') !!}</li>
            </ul>
        </div>
    </div>
    @endif


    <div class="responsive ">
        <div class="col-md-13 ">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h4 style="text-align:center;">Procesos:</h4>
                    <div class="text-center">
                    @can('process.processes.create')
                        <a href="{{ Route('process.processes.create') }}" class="btn btn-info pull-left btn-sm" > Crear
                        </a>
                        @endcan
                    </div>

                </div>
               
                <h4>Tabla de Datos:</h4>
                <br>
                
                <br>
                <div class="table-responsive">
                    <table id="laravel_datatable" style="width:100%" class=" table table-responsive">
                        <thead>
                            <tr>
                                <th>Codigo de pallet procesado</th>
                                <th>Fecha Ingreso</th>
                                <th>Estatus</th>
                                <th>Fruta</th>
                                <th>Variedad</th>
                                
                                <th>Fruta Lavada</th>
                                <th>Detalle</th>



                                        


                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
                <script>
                $(document).ready(function() {

                    $('#laravel_datatable thead tr').clone(true).appendTo('#laravel_datatable thead');
                    $('#laravel_datatable thead tr:eq(1) th').each(function(i) {
                        var title = $(this).text();
                        $(this).html('<input  class="form-control" type="text" placeholder="Buscar ' +
                            title + '" />');

                        $('input', this).on('keyup change', function() {
                            if (table.column(i).search() !== this.value) {
                                table
                                    .column(i)
                                    .search(this.value)
                                    .draw();
                            }
                        });
                    });

                    var table = $('#laravel_datatable').DataTable({
                        processing: true,
                        serverSide: true,
                        language: {
                            url: "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
                        },
                        iDisplayLength: 100,
                        order: [[ 0, 'desc' ]],
                      


                        ajax: "{{ url('process-list') }}",

                        columns: [{
                                data: 'tarja_proceso',
                                name: 'tarja_proceso'
                            },
                            {
                                data: 'created_at',
                                name: 'created_at '
                            },
                            
                             { 
                                data: 'status',
                                name: 'status.name' 
                            },
                            { 
                                data: 'fruit',
                                name: 'fruit.specie' 
                            },
                            { 
                                data: 'varieties', 
                                name: 'varieties.variety' 
                            },
                             { 
                                data: 'wash', 
                                name: 'wash.name' 
                            },

                            {
                                "data": 'id',
                                "render": function(data, type, row, meta) {
                                    if (type === 'display') {
                                        data =
                                            '<a class="btn-sm btn btn-warning" href="processes/' +
                                            data + '">Detalle</a>';
                                    }

                                    return data;
                                }
                            }

                        ],

                    });
                    table
                        .column('0:visible')
                        .order('desc')
                        .draw();
                });
                </script>
            </div>
        </div>
    </div>
</div>
@endsection