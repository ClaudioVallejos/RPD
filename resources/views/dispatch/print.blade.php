<!DOCTYPE html>


<div class="col-md-12">
    <h1> Despacho </h1>
    <table class="table table-responsive" style="width:100%">
        <thead>
            <tr>
                <td>Tarja</td>
                <td> {{ $receptions->id}}</td>
            </tr>

            <tr>
                <td>numero_guia</td>
                <td> {{ $receptions->numero_guia}}</td>
            </tr>

            <tr>
                <td>numero_despacho</td>
                <td> {{ $receptions->numero_despacho }}</td>
            </tr>

            <tr>
                <td>Temporada</td>
                <td> {{ $receptions->season->name }}</td>
            </tr>

            <tr>
                <td>tipotransporte</td>
                <td> {{ $receptions->tipotransporte->name }}</td>
            </tr>

            <tr>
                <td>tipodispatch</td>
                <td> {{ $receptions->tipodispatch->name }}</td>
            </tr>

            <tr>
                <td>puerto_salida </td>
                <td> {{ $receptions->puerto_salida }}</td>
            </tr>

            <tr>
                <td>puerto_destino</td>
                <td> {{ $receptions->puerto_destino }}</td>
            </tr>

            <tr>
                <td>consignatario </td>
                <td> {{ $receptions->consignatario }}</td>
            </tr>

            <tr>
                <td>numero_contenedor</td>
                <td> {{ $receptions->numero_contenedor }}</td>
            </tr>

            <tr>
                <td>nombre_chofer</td>
                <td> {{ $receptions->nombre_chofer }}</td>
            </tr>

            <tr>
                <td>patente_vehiculo</td>
                <td> {{ $receptions->patente_vehiculo }}</td>
            </tr>

            <tr>
                <td>patente_rampla</td>
                <td> {{ $receptions->patente_rampla }}</td>
            </tr>

        </thead>

    </table>
</div>

</body>
</html>