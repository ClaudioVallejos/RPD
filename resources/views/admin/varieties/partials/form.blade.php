<div class="form-group">
		{{ Form::label('fruit_id', 'Selecciona un tipo de Fruta:') }}
		{{Form::select('fruit_id', $listFruits, null, ['class' => 'form-control','required', 'placeholder'=>'Seleccione una opción'])}}
</div>

<div class="form-group">
	{{ Form::label('variety', 'Nombre de la Variedad:') }}
	{{ Form::text('variety', null, ['class' => 'form-control ']) }}
</div>

<div class="form-group">
	{{ Form::submit('Guardar', ['class' => 'btn btn-success']) }}
</div>