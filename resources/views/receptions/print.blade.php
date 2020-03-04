
<style type="text/css">

  
h1{
    font-size: 40px;

  

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
<div class="container-fluid px-4">
    <div class="responsive">
        <div class="card-body ">    
<div class="col-md-12">
<h1 >RECEPCIÓN Nº {{ $receptions->tarja}} </h1>
<div  class="table-responsive" >
    <table  class=" cell-border order-column">

        
           <thead>

          

            <tr>
                <td><h2>INGRESO   </h2></td>
                <td><h2 style="text-align: center;"> {{ $receptions->created_at}}</h2></td> 
            </tr>

            <tr>
                <td><h2>PROVEEDOR </h2></td>
                 <td><h2 style="text-align: center;">   {{ $receptions->provider->name}} </h2></td> 
            </tr>

            <tr>
                <td><h2>CALIDAD</h2></td> 
                  <td><h2 style="text-align: center;">  {{ $receptions->quality->name}} </h2></td> 
            </tr>

            <tr>
                <td><h2>ESTATUS </h2></td>
                 <td><h2 style="text-align: center;">   {{ $receptions->status->name }}</h2></td> 
            </tr>

            <tr>
                <td><h2>ESPECIE </h2></td>
                  <td><h2 style="text-align: center;">  {{ $receptions->fruit->specie}}</h2></td> 

            </tr>
            <tr>
                <td><h2>VARIEDAD </h2></td>
                <td><h2 style="text-align: center;">    {{ $receptions->varieties->variety}} </h2></td> 
            </tr>

             <tr>
                <td><h2>PESO NETO</h2></td>
                 <td><h2 style="text-align: center;">   {{ $receptions->netweight}} Kg.</h2></td> 
            </tr>
            <tr>
                <td><h2>Nª REJILLAS</h2></td>
                  <td><h2 style="text-align: center;">  {{ $receptions->quantity }} </h2></td>
            </tr>

           
            
          
              
           </thead>

      


        
            
    </table>
    </div>
</div>
</div>
</div>
