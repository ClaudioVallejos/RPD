@extends('layouts.dashboard')
@section('section')
<div class="container">

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
                    <h4 style="text-align:center;">Producto en tránsito
                        @can('reprocess.reprocesses.create')
                        <a href="{{ Route('reprocess.reprocesses.create') }}" class="btn btn-info pull-right btn-sm"> Crear
                        </a>
                        @endcan
                    </h4>


                </div>

                <div class="table-responsive">
                    <table id="laravel_datatable12333" style="width:100%" class=" cell-border order-column">
                        <thead>
                            <tr>
                                <th>Codigo de pallet procesado</th>
                                <th>Creado</th>
                                <th>Fruta</th>
                                <th>Calidad</th>
                                <th>Variedad</th>
                                <th>Buscar</th>

                                
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
                <script>
                $(document).ready(function() {

                    $('#laravel_datatable12333 thead tr').clone(true).appendTo('#laravel_datatable12333 thead');
                    $('#laravel_datatable12333 thead tr:eq(1) th').each(function(i) {
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

                    var table = $('#laravel_datatable12333').DataTable({
                        reprocessing: true,
                        serverSide: true,
                        language: {
                            url: "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
                        },
                        iDisplayLength: 100,
                        order: [[ 0, 'desc' ]],
                      


                        ajax: "{{ url('reprocess-list') }}",

                        columns: [{
                                data: 'tarja_reproceso',
                                name: 'tarja_reproceso'
                            },
                            {
                                data: 'created_at',
                                name: 'created_at '
                            },
                            {
                                data: 'fruit',
                                name: 'fruit.specie '
                            },
                            {
                                data: 'quality',
                                name: 'quality.name '
                            },
                            {
                                data: 'varieties',
                                name: 'varieties.variety'
                            },
                            

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