@extends('layouts.dashboard')

@section('section')
<div class="container-fluid px-4">
    <div class="responsive">
        <div class=" ">    
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h4 style="text-align:center;">Camara de Producto Terminado Sin Paletizarxddd:</h4>
                        
                    
                </div>

                 <div class="table-responsive">
                   <table class="table table-responsive" id="laravel_datatable201" style="width:100%"> 
                       <thead>
                           <tr>

                               <th>Imprimir</th>
                               <th>Tarja</th>
                               <th>Estatus</th>
                               <th>Fruta</th>
                               <th>Variedad</th>
                               
                               <th>Calidad</th>
                               <th>Inicio Folio</th>
                               <th>Fin de Folio</th>
                               <th>Formato</th>
                               <th>Cantidad de cajas</th>
                               <th>Peso total</th>
                               <th>Fecha de creacion</th>
                               
                              
                           </tr>
                       </thead>
                       <tbody>
                       
                       </tbody>
                   </table>
                  
                </div>
            </div>
<script>
      
    $(document).ready(function() {
    
    $('#laravel_datatable201 thead tr').clone(true).appendTo( '#laravel_datatable201 thead' );
    $('#laravel_datatable201 thead tr:eq(1) th').each( function (i) {
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
 
    var table = $('#laravel_datatable201').DataTable({

            processing: true,
            serverSide: true,
              language: {
               url: "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
              },
             
             iDisplayLength: 100,
             order: [[ 0, 'desc' ]],
                     dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    },
           
            
            
            ajax: "{{ url('resubprocess-list') }}",
            columns: [
                {
                    data: 'id',
                        "render": function(data, type, row, meta) {
                            if (type === 'display') {
                                data = '<a class="btn btn-sm btn-primary" target="_blank" href="printsubprocess/' + data + '">Imprimir</a>';
                            }

                            return data;
                            },
                          
                        },
                     { data: 'tarja', name: 'tarja' },
                     { data: 'status', name: 'status.name' },
                     { data: 'fruit', name: 'fruit.specie' },
                     { data: 'varieties', name: 'varieties.variety' },
                    
                     { data: 'quality', name: 'quality.name' },
                     { data: 'folioStart', name: 'folioStart' },
                     { data: 'folioEnd', name: 'folioEnd' },
                      { data: 'format', name: 'format.name' },
                     { data: 'quantity', name: 'quantity' },                 
                     { data: 'weight', name: 'weight' },
                     { data: 'created_at', name: 'created_at' },
                     
                  ]
         });
} );



      
</script>

        </div>
    </div>
</div>
@endsection
