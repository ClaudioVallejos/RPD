@extends('layouts.dashboard')
@section('section')
   

    @if (\Session::has('success'))
    <div class="col-md-12">
        <div class="alert alert-success">
            <ul>
                <li>{!! \Session::get('success') !!}</li>
            </ul>
        </div>
    </div>
    @endif

<div class="container-fluid px-4">
    <div class="responsive">
        <div class=" ">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h4 style="text-align:center;">Productos palletizados:
                        @can('lotes.create')
                        <a href="{{ Route('lote.createsearch') }}" class="btn btn-info pull-right btn-sm"> Crear
                        </a>
                        @endcan
                    </h4>


                </div>

                <br>
                <br>

                <div class="table-responsive">
                    <table id="laravel_datatable12" style="width:100%" class=" table table-responsive">
                        <thead>
                            <tr>
                                <th>Numero de pallet:</th>
                                <th>Creado</th>
                                <th>Estatus</th>
                                <th>Fruta</th>
                                <th>Variedad</th>
                                <th>Formato</th>
                             
                                <th>Calidad</th>
                                <th>Cantidad</th>
                                <th>Peso</th>
                                <th>Detalle</th>

                                
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
               <script>
                $(document).ready(function() {

                    $('#laravel_datatable12 thead tr').clone(true).appendTo('#laravel_datatable12 thead');
                    $('#laravel_datatable12 thead tr:eq(1) th').each(function(i) {
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

                    var table = $('#laravel_datatable12').DataTable({
                        processing: true,
                        serverSide: true,
                        language: {
                            url: "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
                        },
                        iDisplayLength: 100,
                        order: [[ 0, 'desc' ]],
                      


                        ajax: "{{ url('lotes-list') }}",

                        columns: [
                            { data: 'numero_lote', name: 'numero_lote' },
                             { data: 'created_at', name: 'created_at' },
                             { data: 'status', name: 'status.name' },
                             { data: 'fruit', name: 'fruit.specie' },
                             { data: 'varieties', name: 'varieties.variety' },
                             { data: 'format', name: 'format.name' },
                             
                             { data: 'quality', name: 'quality.name' },
                             { data: 'quantity', name: 'quantity' },                 
                             { data: 'palletWeight', name: 'palletWeight' },
                                    

                            {
                                "data": 'id',
                                "render": function(data, type, row, meta) {
                                    if (type === 'display') {
                                        data =
                                            '<a class="btn-sm btn btn-warning" href="lotes/' +
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

