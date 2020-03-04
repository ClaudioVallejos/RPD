
<style type="text/css">

  
h1{
    font-size: 35px;


  

}
h2{
    font-size: 27px;


text-transform:uppercase;
letter-spacing: 1px;
box-sizing: border-box;
  -moz-box-sizing: border-box;
}
{margin:0;padding:0;border: 0 none;position: relative;}
}
td{
  line-height : 22px;
}
</style>

<div class="col-md-12">
    <h1 style="text-align: center;" >PALLET  N°{{ $lotes->numero_lote}} </h1>

    <br>

<div class="table-responsive">
    <table  class=" cell-border order-column">

        
           <thead>

           

        <tr>
                <td><h2>FECHA DE INGRESO    </h2></td>
                <td><h2 style="text-align: center;">{{ $lotes->created_at}}</h2></td> 
            </tr>

           
            <tr>
                <td><h2>ESTATUS      </h2></td>
                 <td><h2 style="text-align: center;">   {{ $lotes->status->name}} </h2></td> 
            </tr>

    
            <tr>
                  <td><h2>CALIDAD  </h2></td> 
                  <td><h2 style="text-align: center;">  {{ $lotes->quality->name}} </h2></td> 
            </tr>


            <tr>
                <td><h2>ESPECIE    </h2></td>
                  <td><h2 style="text-align: center;">  {{ $lotes->fruit->specie}}</h2></td> 

            </tr>

            <tr>
                <td><h2>VARIEDAD   </h2></td>
                <td><h2 style="text-align: center;">    {{ $lotes->varieties->variety}} </h2></td> 
            </tr>
           
             <tr>
                <td><h2>PESO </h2></td>
                 <td style="text-align: center;"><h2>   {{ $lotes->palletWeight}} Kg.</h2></td> 
            </tr>
            <tr>
                <td><h2>CANTIDAD DE CAJAS </h2></td>
                  <td style="text-align: center;"><h2>  {{ $lotes->quantity }} Cajas </h2></td>
            </tr>

           
            
          
              
           </thead>

      


        
            
    </table>
    </div>
</div>

