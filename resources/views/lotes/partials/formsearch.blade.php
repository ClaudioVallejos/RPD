<br>
<div class="card">
	<div class="card-header">
		<div class="badge badge-pill badge-warning float-left"> 1 </div>
		<h6>Selección de subprocesos:</h6>
	</div>

	<div class="card-body">
		<div class="row">
			<div class="col-md-12">
				<h3 class="text-center">Listado de productos en camara</h3>
				<div class="form-group">
					<div class="row">
						<div class="col-md-4">
							{{ Form::label('numero_lote', 'Numero de tarja') }}
							{{ Form::text('numero_lote','P00'.$lastid, ['class' => 'form-control', 'readonly']) }}
						</div>
					</div>
					<br>

					<divc class="card-body">
						<div class="row">
							<div class="alert alert-danger" role="alert">
								Ingrese la cantidad de cajas
							</div>
							<div class="col-md-4">
								<label for="lote"> Numero de Cajas</label>
								<input name="lote" id="contable" type="text" placeholder="Ej: 90" class="form-control">
							</div>

							<div class="col-md-4">
								<label for="lote"> Filtrar</label>
								<input class="form-control" id="myInput" type="text" placeholder="Buscar..">
							</div>
						</div>

					</div>

				<br>
				<br>

				<ul class="list-unstyled">

					<div class="table-responsive">
						<table class="table table-bordered">



							<thead>
								<tr>
									<th></th>
									<th>Tarja</th>
									<th>Calidad</th>
									<th>Cantidad</th>
									<th>Formato</th>
									<th>Fruta - Variedad</th>
									<th>Inicio Folio</th>
									<th>Fin Folio</th>

								</tr>

							</thead>


							<tbody id="myTable3">

								@forelse($coleccion as $subprocess)

								<tr>
									<td>
										<input type="checkbox" required name="subprocess[]" value="{{ $subprocess->id }} ">
									</td>
									<td>{{ $subprocess->tarja }}</td>
									<td>{{ $subprocess->quality->name }}</td>
									<td class="quantity">{{ $subprocess->quantity }}</td>
									<td>{{ $subprocess->format->name}}</td>
									<td>{{ $subprocess->fruit->specie}} - {{$subprocess->varieties->variety}} </td>
									<td>{{ $subprocess->folioStart}}</td>
									<td>{{ $subprocess->folioEnd}}</td>

									@php
									$uno = false;
									@endphp

								</tr>

								@empty

								<h4> Sin Registros </h4>

								@php
								$uno = true;
								@endphp

								
								@endforelse


							</tbody>
							{{ $coleccion->render() }}

						</table>
					</div>

					<div class="row">
						<div class="col-md-4">
							<h3>TOTAL DE CAJAS</h3>
						</div>
						<div class="col-md-4">
							<strong>
								<div id="result"></div>
							</strong>
						</div>

					</div>
				</ul>
			</div>


			<script>
				$(document).ready(function(){
				$("#myInput").on("keyup", function() {
					var value = $(this).val().toLowerCase();
					$("#myTable3 tr").filter(function() {
					$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
					});
				});
				});
			</script>
		</div>
	</div>
</div>




<div class="row">

	<div class="col-md-12">
		<div class="form-group">
			<div class="bs-example">

				<input type="radio" name="rejected" value="0" data-toggle="collapse" data-parent="#accordion"
					href="#collapseOne" checked> Aprobado

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
										{{Form::label('commentrejected', 'Comentario Adicional') }}
										{{Form::textarea('commentrejected',null,['class'=>'form-control'])}}
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
		<div class="form-group">
			<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
				Guardar
			</button>
		</div>
	</div>


	<!-- Modal -->
	<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
		aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLongTitle">Guardar</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					¿Está seguro de guardar los cambios efectuados?
				</div>
				<div class="modal-footer">
					{{ Form::submit('Guardar', ['class' => 'btn btn-primary','target'=>'_blank']) }}
					<button type="button" id="save" class="btn btn-secondary" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>

</div>



<script>
	function getTope(){
	 let n = document.getElementById('topePallet').value;
	 return n;
	}

	$('table input[type="checkbox"]').on('change', function() {
	 var table = $(this).closest('table'),
	 //acá la idea es que se haga un array de todos los checkeados para eso se instancia table.find 
	  checked = table.find('input[type=checkbox]:checked'),
	 // acá dentro del table tenemos tr y dentro td pero par que la suma sea solo de una columna se agrega la clase quantity asi solo busca esa clase
	  prices = checked.closest('tr').find('td.quantity'),
	 // luego se hace un map  que busca si es numero, letra todo etc 
	  sum = prices.map(function() {
		return parseFloat(this.textContent.trim(), 10) || 0;
	  }).get().reduce(function(a, b) {
		return a + b;
	  });
	  var url = $("#contable").val();

	  if(sum > url){
		swal("Has exedido el limite de cajas permitida.", "Vuelva a ingresar la información", "warning");
		
		for(var i = 0; i < checked.length; i++){

			checked[i].checked = false;
		}
		 $("#contable").val('');

		$('#result').text('');
		$('#save').setAttribute('disabled','disabled');
		
	  }else{

		$('#result').text(sum);

	  }
	  // se imprime todo en result 

  }).change();

</script>