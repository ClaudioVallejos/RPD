<div class="form-group">
	{{ Form::label('specie', 'Nombre de la Fruta:') }}
	{{ Form::text('specie', null, ['class' => 'form-control ', 'required']) }}
</div>

<div class="form-group">
	{{ Form::submit('Guardar', ['class' => 'btn btn-success']) }}
</div>