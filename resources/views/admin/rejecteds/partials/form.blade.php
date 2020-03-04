<div class="form-group">
	{{ Form::label('name', 'Nombre del motivo de rechazo') }}
	{{ Form::text('name', null, ['class' => 'form-control ', 'placeholder'=>'Ejemplo: Rechazo por Metales']) }}
</div>

<div class="form-group">
	{{ Form::submit('Guardar', ['class' => 'btn btn-success']) }}
</div>