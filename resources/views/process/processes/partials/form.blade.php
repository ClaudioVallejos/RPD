<div class="card text-left">
    <div class="card-body">
        <div class="row">
            <div class="form-group col-md-4">
                {{ Form::label('tarja_proceso', 'Numero de tarja') }}
                {{ Form::text('tarja_proceso','Proceso - '.$lastid, ['class' => 'form-control', 'readonly']) }}
            </div>
            <div class="form-group col-md-4">
                {{ Form::label('wash', 'Lavado') }}
                {{ Form::select('wash', array('Lavado' => 'Si', 'No lavado' => 'No'), 
							null ,['class' => 'form-control','required' ,'placeholder'=>'¿Esta Lavado?'])}}
            </div>
        </div>

        <div class="col-md-12">

            <h3 class="text-center">Lista de Recepciones pendientes</h3>

            <h3 class="text-center">Lista de Recepciones</h3>

            <div class=" col-md-4">
            <p>Filtrar:</p>  
            <input class="form-control" id="myInput" type="text" placeholder="Buscar..">
            <br>
            </div>

            <div class="form-group"> 

                <table class="table table-bordered">
                    <thead>
                        <tr class="">
                            <th>N°</th>
                            <th>Especie</th>
                            <th>Variedad</th>
                            <th>Calidad</th>
                            <th>Condición</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>

                        @forelse($processPending as $pending)
                        <tr>  
                            <td>{{ $pending->tarja_proceso }}</td>
                            <td>{{ $pending->fruit->specie }}</td>
                            <td>{{ $pending->varieties->variety }}</td>
                            <td>{{ $pending->quality->name}}</td>
                            <td>{{ $pending->status->name}}</td>
                            <td> <a class="btn btn-sm btn-primary" href=" 
                            {{Route('subprocess.create', $pending->id)}} "> Reanudar </a> </td>
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
					<div class="float-left">
                    {{ $processPending->render() }}
                </div>
                </table> 
        
                <div>
                <table class="table table-bordered">
                    <thead>
                        <tr class="">
                            <th></th>
                            <th>Tarja</th>
                            <th>Fruta</th>
                            <th>Peso Neto</th>
                            <th>Rejillas</th>
                            <th>Calidad</th>
                            <th>Condición</th>
                        </tr>
                    </thead>

                    </br>
                    </br>

                    <tbody id="myTable"> 
                        @forelse($receptions as $reception)
                        <tr>
                            <td>{{ Form::checkbox('receptions[]', $reception->id ) }}</td> 
                            <td>{{ $reception->tarja }}</td>
                            <td>{{ $reception->fruit->specie}} - {{ $reception->varieties->variety }}</td>
                            <td>{{ $reception->netweight }}</td>
                            <td>{{ $reception->quantity }}</td>
                            <td>{{ $reception->quality->name }}</td>
                            <td>{{ $reception->status->name }}</td>

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
					<div class="float-left">
                    {{ $receptions->render() }}
                </table>
                </div>
                
            </div>
            <script>
                $(document).ready(function(){
                    $("#myInput").on("keyup", function() {
                        var value = $(this).val().toLowerCase();
                        $("#myTable tr").filter(function() {
                            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                            });
                    });
                });
            </script>
        </div>
    </div>

    <br>
    @if($uno == false)
    <div class="col-md-12 text-center">
        <div class="form-group text">
            {{ Form::submit('Guardar', ['class' => 'btn btn-success']) }}
        </div>
    </div>
    @else
    <div class="btn btn-lg btn-danger disabled"> No se puede ingresar </div>
    @endif
    <br>
    <br>