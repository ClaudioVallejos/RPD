@extends('layouts.dashboard')

@section('section')

<div class="container-fluid px-4">
    <div class="responsive">
        <div class=" ">
            <div class="panel panel-primary">
                <div class="panel-heading">
                            <h4 style="text-align:center;">Camara de productos Paletizados:</h4>
                        
                    
                      </div>

                 <div class="table-responsive">
                   <table  id="laravel_datatable199" style="width:100%" class="table table-responsive"> 
                       <thead>
                           <tr>

                               <th>Imprimir</th>
                               <th>Numero de Lote</th>
                               <th>Fruta</th>
                               <th>Estatus</th>
                               <th>Variedad</th>
                               <th>Formato</th>
                            
                               <th>Calidad</th>
                               <th>Cantidad de cajas</th>
                               <th>Peso total</th>
                               <th>Fecha de creacion</th>
                               
                           </tr>
                       </thead>
                       <tbody>
                       
                       </tbody>
                   </table>
                 
                </div>
                 <script>
      
    $(document).ready(function() {
    
    $('#laravel_datatable199 thead tr').clone(true).appendTo( '#laravel_datatable199 thead' );
    $('#laravel_datatable199 thead tr:eq(1) th').each( function (i) {
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
 
    var table = $('#laravel_datatable199').DataTable({

            processing: true,
            serverSide: true,
              language: {
               url: "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
              },
             
             iDisplayLength: 100,
             order: [[ 0, 'desc' ]],
                                     dom: 'Bfrtip',
        buttons: [
          'excel'
        ],
           
            
            
            ajax: "{{ url('lotes-list') }}",
            columns: [
                {
                    data: 'id',
                        "render": function(data, type, row, meta) {
                            if (type === 'display') {
                                data = '<a class="btn btn-sm btn-primary" target="_blank" href="printlote/' + data + '">Imprimir</a>';
                            }

                            return data;
                            },
                        },
                     { data: 'numero_lote', name: 'numero_lote' },
                     { data: 'fruit', name: 'fruit.specie' },
                     { data: 'status', name: 'status.name' },
                     { data: 'varieties', name: 'varieties.variety' },
                     { data: 'format', name: 'format.name' },
                   
                     { data: 'quality', name: 'quality.name' },
                     { data: 'quantity', name: 'quantity' },                 
                     { data: 'palletWeight', name: 'palletWeight' },
                     { data: 'created_at', name: 'created_at' },
                     
                  ]
         });
} );



      
</script>
             </div>
        </div>
    </div>
</div>


@endsection
