<script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
	crossorigin="anonymous">
</script>

<table class="table justify-content-center text-center">
	<thead>
		<tr>
			<th scope="col">PESO TOTAL</th>
			<th scope="col">PESO UTILIZADO</th>
			<th scope="col">PESO RESTANTE</th>
		</tr>
	</thead>
	<tbody>

		<tr>
			<td>
				<h2>{{ $peso }} Kg</h2>
			</td>
			<td>
				<h2> {{ $acumWeight }} Kg</h2>
			</td>
			<td>
				<h2 id="resto">{{ $resto = $peso-$acumWeight }} Kg</h2>
			</td>
		</tr>
	</tbody>
</table>


	@if($acumWeight <= 0)
		@php(
			$range = round(((100)/$peso))
		)
	@else
		@php(
			$range = round((($acumWeight*100)/$peso))
			)
	

	@endif

	


<div class="progress progress-small" style="height: 30px;">
	<div style="width: {{$range}}% ; backbroud-color: #green; !important;" class="progress-bar bg-success"> {{$range}}%
	</div>
</div>
<br>
<br>

<div class="card">
	<div class="card-body" $>
		<div class="d-flex justify-content-center">
			<div class="row">
				<div class="col-md-2">
					<div class="form-group">
						{{ Form::label('', 'Tarja') }}
						{{ Form::text('tarja', 'RPT00'.$lastid, ['class' => 'form-control','readonly']) }}
					</div>

					<input name="reprocess_id" type="hidden" value={{$reprocess_id}}>
					<input name="identificador" type="hidden" value={{$identificador}}>
					
				</div>
				<div class="col-md-2">
					<div class="form-group">
						{{ Form::label('quantity', 'Cantidad de Cajas') }}
						{{ Form::text('quantity', null, ['class' => 'form-control input-number','id'=>'cantidad','oninput'=>'getWeightFormat()']) }}
					</div>
				</div>

				<div class="col-md-2">
					<div class="form-group">
						{{ Form::label('format_id', 'Formato') }}
						{{ Form::select('format_id',$listFormat, null, ['class' => 'form-control input-number','id'=>'formatWeight','oninput'=>'getWeightFormat(), validacionTrash()', 'placeholder'=>'selecciona']) }}
					</div>
				</div>

				<div class="col-md-3">
					<div class="form-group">
						{{ Form::label('quality_id', 'Calidad') }}
						{{Form::select('quality_id', $listQualities, null, ['class' => 'form-control','required', 'placeholder'=>'Seleccione una opción'])}}
					</div>
				</div>
				<div class="col-md-2">
					<div class="form-group">
						<label> Kg Procesados </label>
						<input name="weight" class="form-control" id="weight" onkeyup="this.onchange();"
							onpaste="this.onchange();" oninput="this.onchange();" onchange="validacion()" type="number"
							readonly>
					</div>
					</div class="col-xl-10">
				<div class="col-md-6">
					<div  class="form-group">
						<label> Inicio de folio </label>
						<input name="folioStart" class="form-control" required>
					</div>
				</div>

				<div  class="col-md-6">
					<div  class="form-group">
						<label> Fin de folio </label>
						<input name="folioEnd" class="form-control" required>
					</div>
				
				</div>
			</div>	
				</div>

			</div>
		</div>
		
		<div class="col-md-12">
			<div class="form-group">
				<div class="bs-example">

					<h5>¿ El Proceso está? </h5>
					<input type="radio" name="rejected" value="0" data-toggle="collapse" data-parent="#accordion"
						href="#collapseOne" checked> Aprovado

					<input type="radio" name="rejected" value="1" data-toggle="collapse" data-parent="#accordion"
						href="#collapseOne"> Rechazado

					<div class="panel-group" id="accordion">
						<div class="panel panel-default">
							<div id="collapseOne" class="panel-collapse collapse in">
								<div class="panel-body">
									<div class="card">
										<div class="card-body">
											{{Form::label('reason', 'Selecciona motivo de rechazo') }}
											{{Form::select('reason', $listRejecteds, null, ['class' => 'form-control', 'placeholder'=>'Seleccione una opción'])}}
											{{Form::label('comment', 'Comentario Adicional') }}
											{{Form::textarea('comment', null, ['class' => 'form-control'])}}
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	
			
			<div class="col-md-12 text-center">
				<div class="form-group text">
					{{ Form::submit('Añadir', ['class' => 'btn btn-success','id' =>'save']) }}
				</div>
			</div>
	
	
		<table style="text-align:center" class="table table-striped table-hover">
			<thead>
				<tr>
					<th>Nª de tarja</th>
					<th>Formato</th>
					<th>Calidad</th>
					<th>N° de Cajas</th>
					<th colspan="3">&nbsp;</th>
				</tr>
			</thead>
			<tbody>
				@foreach($subprocesses as $subprocess)
				<tr>
					<td> SP0{{$subprocess->id}} </td>
					<td> {{$subprocess->format->name}} </td>
					<td> {{$subprocess->quality->name}} </td>
					<td> {{$subprocess->quantity}} </td>
					

				</tr>
				@endforeach
				{{ $subprocesses->render() }}
			</tbody>
		</table>
	</div>
</div>

<br>

<div class="col-md-12 text-center">
		<div class="form-group">
			<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModalCenter">
				Salir
			</button>
		</div>
	</div>
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
		aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLongTitle">Salir</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					¿Desea dejar el proceso pendiente?
				</div>
				<div class="modal-footer">
					 <a class="btn  btn-danger pull-left " href="{{ Route ('reprocess.reprocesses.index') }}"> Salir </a>
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>


<script>

	function getWeightFormat(){

				var quantityBox = document.getElementById('cantidad').value;
				var formatWeight = document.getElementById('formatWeight').value;
			var kgProcesado = Number(quantityBox)*Number(formatWeight);
			document.getElementById('weight').value = kgProcesado;
			validacion(kgProcesado);
			validacionTrash(kgProcesado);
	}
	
	function validacion(kgProcesado){
		var acumWeight = {{ $acumWeight }};
		var sum = acumWeight + kgProcesado;

		if(sum > {{ $peso }} ){
			swal("Peso Superado!", "Por favor, ingrese la información correcta", "error");
			document.getElementById('save').setAttribute("disabled","disabled");
			var quantityBox = document.getElementById('cantidad').value = '';
			document.getElementById('weight').value = '';
		}else{
			document.getElementById('save').removeAttribute("disabled");

		}
	}
	
		function validacionTrash(kgProcesado){

		if(document.getElementById('formatWeight').value === '1.000'){
			if((Number(kgProcesado) - {{$resto}} === 0 )){
			}else{
				document.getElementById('save').setAttribute("disabled","disabled");
			}

		}
	}.
	
	

</script>
