@extends('layouts.dashboard')

@section('section')
<div class="container-fluid px-4">
    <div class="responsive">
        <div class=" ">      
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h4 style="text-align:center;">Despachos:
                    @can('dispatch.create')
                    <a href="{{ Route('dispatch.create') }}" class="btn btn-sm btn-primary pull-right"> Crear </a>
                    @endcan
                    </h4>
                </div>

               <div class="card-body"> 
                <table class="table table-responsive" id="laravel_datatable3" style="width:100%">
                    <thead>
                           
                            <th>Numero de despacho</th>
                            <th>Hora de Despacho</th>
                            <th>Fruta</th>
                            <th>Variedad</th>
                            <th>Estatus</th>
                            <th>Calidad</th>
                            <th>Peso de pallet</th>
                            <th>Tipo de Despacho </th>
                            <th>Consignatario</th>
                            <th>Tipo Transporte</th>
                            <th>Puerto de Salida</th>
                            <th>Temporada</th>
                            
                    </thead>
                    <tbody>
                      
                    </tbody>
                </table>
                
            </div>
            <script>
      
    $(document).ready(function() {
    
    $('#laravel_datatable3 thead tr').clone(true).appendTo( '#laravel_datatable3 thead' );
    $('#laravel_datatable3 thead tr:eq(1) th').each( function (i) {
        var title = $(this).text();
        $(this).html( '<input type="text" placeholder="Buscar '+title+'" />' );
 
        $( 'input', this ).on( 'keyup change', function () {
            if ( table.column(i).search() !== this.value ) {
                table
                    .column(i)
                    .search( this.value )
                    .draw();
            }
        } );
    } );
 
    var table = $('#laravel_datatable3').DataTable({

            processing: true,
            serverSide: true,
              language: {
               url: "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
              },
             
             iDisplayLength: 100,
             order: [[ 0, 'desc' ]],

   
            
            
            ajax: "{{ url('dispatch-list') }}",
            columns: [
               
                     { data: 'numero_despacho', name: 'numero_despacho' },
                     { data: 'created_at', name: 'created_at' },
                     { data: 'fruit', name: 'fruit.specie' },
                     { data: 'varieties', name: 'varieties.variety' },
                     { data: 'status', name: 'status.name' },
                     { data: 'quality', name: 'quality.name' },
                     { data: 'palletWeight', name: 'palletWeight' },
                    
                     { data: 'tipodispatch', name: 'tipodispatch.name' },
                     { data: 'consignatario', name: 'consignatario' },
                     { data: 'tipotransporte', name: 'tipotransporte.name' },                 
                     { data: 'puerto_salida', name: 'puerto_salida' },                 
                     { data: 'season', name: 'season.name' },
                     
                     
                  ]
         });
} );



      
</script>
            </div>




          

        </div>
    </div>
</div>

@endsection

