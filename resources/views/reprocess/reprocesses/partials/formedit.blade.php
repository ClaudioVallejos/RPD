
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 col-md-offset-2">       
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h4 style="text-align:center;">Detalle de Proceso</h4>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                              @foreach($subprocess as $subproces)
                                <table class="table table-hover">
                                   
                                    <tbody>
                                    
                                        <tr class="table-dark text-dark">
                                            <th> Tarja: </th>
                                            <th> P00{{ $subproces->id }}</th>
                                        </tr>
                                     
                                        <tr>
                                            <th> Formato </th>
                                            <th>{{ Form::text('formato', $subproces->format->name ,['class' => 'form-control']) }}  </th>
                                            
                                        </tr>
                                        <tr>
                                            <th> Tipo de Calidad </th>
                                            <th>{{ Form::text('formato', $subproces->quality->name ,['class' => 'form-control']) }}  </th>
                                        </tr>
                                        <tr>
                                            <th> N° de producto terminado </th>
                                            <th>{{ Form::text('formato', $subproces->quantity ,['class' => 'form-control']) }}  </th>
                                        </tr>
                                        <tr class="table-warning">
                                            <th> Kg total </th>
                                            <th>{{ Form::text('formato', $subproces->weight ,['class' => 'form-control']) }}  </th>
                                        </tr>

                                        <br>
                                    </tbody>

                                </table>
                                 @endforeach
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
            </div>
        </div>
                <!-- /.col-lg-6 -->

<br>
	
		<div class="col-md-4">
			<div class="form-group">
		{{ Form::submit('Guardar', ['class' => 'btn btn-sm  btn-success']) }}
			</div>
		</div>
	<br>
	<br>