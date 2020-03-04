<div class="form-group">
    {{ Form::label('name', 'Nombre del Rol') }}
    {{ Form::text('name', null, ['class' => 'form-control ']) }}
</div>
<div class="form-group">
    {{ Form::label('slug', 'URL amigable') }}
    {{ Form::text('slug', null, ['class' => 'form-control ']) }}
</div>
<div class="form-group">
    {{ Form::label('description', 'Descripción ') }}
    {{ Form::textarea('description', null, ['class' => 'form-control ']) }}
</div>
<hr>
<h3>Permiso especial</h3>
<div class="form-group">
    <label> {{ Form::checkbox('special', 'all-access') }} Acceso total </label>
    <label> {{ Form::checkbox('special', 'no-access') }} Ningun Acceso </label>

</div>

<h3>Lista de permisos</h3>
<div class="form-group">
    <ul class="list-unstyled">

        <table class="table table-bordered">
            <thead class="thead-dark">


                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nombre del permiso</th>
                    <th scope="col">Descripción</th>
                </tr>
            </thead>
            <tbody>
                @foreach($permissions as $permission)
                <tr>
                    <th scope="row">{{ Form::checkbox('permissions[]', $permission->id, null) }}</th>
                    <td>{{ $permission->name }}</td>
                    <td>({{ $permission->description ?: 'Sin descripción' }})</td>
                </tr>

                @endforeach

            </tbody>

        </table>

    </ul>
    <br>
    <div class="form-group">
        {{ Form::submit('Guardar', ['class' => 'btn btn-success']) }}
    </div>

</div>