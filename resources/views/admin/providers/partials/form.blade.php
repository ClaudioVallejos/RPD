<script
  src="https://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous">
</script>

<div class="form-group">
	{{ Form::label('name', 'Nombre y Apellido:') }}
	{{ Form::text('name', null, ['class' => 'form-control ', 'placeholder'=>'ejemplo: Nombre Apellido Apellido']) }}
</div>
<div class="form-group">
	{{ Form::label('rut', 'Rut:') }}
	{{ Form::text('rut', null, ['class' => 'form-control ',
	'placeholder'=>'ejemplo: 12345678-9',
	'id'=>'rut',
	'oninput'=>'checkRut(this)',
	'required'
	]) }}
</div>

<div class="form-group">
	{{ Form::label('address', 'Direccion:') }}
	{{ Form::text('address', null, ['class' => 'form-control ', 'placeholder'=>'ejemplo: Camino Caran #345']) }}
</div>
<div class="form-group">
	{{ Form::label('number_phone', 'Numero de Contacto:') }}
	{{ Form::number('number_phone', null, ['class' => 'form-control input-number', 'placeholder'=>'ejemplo: 42-123456']) }}
</div>

<div class="form-group">
	{{ Form::submit('Guardar', ['class' => 'btn btn-success']) }}
</div>

<!-- Permitir solo numeros, puntos y X-->
<script type="text/javascript">
	$(document).ready(function (){
  $('.input-number').keyup(function (){
	this.value = (this.value + '').replace(/[^.x0-9]/g, '');
  });
});
</script>
<script>
    function checkRut(rut) {
        // Despejar Puntos
        var valor = rut.value.replace('.', '');
        // Despejar Guión
        valor = valor.replace('-', '');

        // Aislar Cuerpo y Dígito Verificador
        cuerpo = valor.slice(0, -1);
        dv = valor.slice(-1).toUpperCase();

        // Formatear RUN
        rut.value = cuerpo + '-' + dv

        // Si no cumple con el mínimo ej. (n.nnn.nnn)
        if (cuerpo.length < 7) {
            rut.setCustomValidity("RUT Incompleto");
            return false;
        }

        // Calcular Dígito Verificador
        suma = 0;
        multiplo = 2;

        // Para cada dígito del Cuerpo
        for (i = 1; i <= cuerpo.length; i++) {

            // Obtener su Producto con el Múltiplo Correspondiente
            index = multiplo * valor.charAt(cuerpo.length - i);

            // Sumar al Contador General
            suma = suma + index;

            // Consolidar Múltiplo dentro del rango [2,7]
            if (multiplo < 7) {
                multiplo = multiplo + 1;
            } else {
                multiplo = 2;
            }

        }

        // Calcular Dígito Verificador en base al Módulo 11
        dvEsperado = 11 - (suma % 11);

        // Casos Especiales (0 y K)
        dv = (dv == 'K') ? 10 : dv;
        dv = (dv == 0) ? 11 : dv;

        // Validar que el Cuerpo coincide con su Dígito Verificador
        if (dvEsperado != dv) {
            rut.setCustomValidity("RUT Inválido");
            return false;
        }

        // Si todo sale bien, eliminar errores (decretar que es válido)
        rut.setCustomValidity('');
    }
    </script>