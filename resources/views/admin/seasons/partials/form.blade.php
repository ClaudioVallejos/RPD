<div>
<div class="form-group">
	{{ Form::label('name', 'Temporada:') }}
	{{ Form::select('name', array('2019-2020' => '2019-2020', '2020-2021' => '2020-2021', '2021-2022' => '2021-2022', '2023-2024' => '2023-2024', '2024-2025' => '2024-2025', '2025-2026' => '2025-2026'), null, ['class' => 'form-control', 'class' => 'col-md-4']) }}
</div>
</div>
<div class="form-group">
	{{ Form::label('start_date', 'Fecha Ingreso:') }}
	{{ Form::date('start_date', \Carbon\Carbon::now(), ['class' => 'form-control'])}}
</div>
	

<div class="form-group">
	{{ Form::label('end_date', 'Fecha Finalizacion:') }}
	{{ Form::date('end_date', \Carbon\Carbon::now(), ['class' => 'form-control'])}}
</div>
	


<div class="form-group">
	{{ Form::submit('Guardar', ['class' => 'btn btn-success']) }}
</div>

