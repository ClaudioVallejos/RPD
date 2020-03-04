

<div class="form-group">
	{{ Form::label('name', 'Tipo de Despacho') }}
	{{ Form::text('name', null, ['class' => 'form-control ']) }}
</div>
<div class="form-group">
	{{ Form::label('description', 'Descripción del tipo de despacho') }}
	{{ Form::textarea('description', null, ['class' => 'form-control ']) }}
</div>


<div class="form-group">
	{{ Form::submit('Guardar', ['class' => 'btn btn-success']) }}
</div>
