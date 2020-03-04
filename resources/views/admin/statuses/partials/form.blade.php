<div class="form-group">
	{{ Form::label('name', 'Nombre del Estatus:') }}
	{{ Form::text('name', null, ['class' => 'form-control ', 'required']) }}
</div>


<div class="form-group">
	{{ Form::submit('Guardar', ['class' => 'btn btn-success']) }}
</div>

