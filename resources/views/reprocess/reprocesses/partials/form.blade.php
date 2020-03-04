<div class="card text-left">
    <div class="card-body">
        <div class="row">
            <div class="form-group col-md-4">
                {{ Form::label('tarja_reproceso', 'Numero de tarja') }}
                {{ Form::text('tarja_reproceso','Re-proceso '.$lastid, ['class' => 'form-control', 'readonly']) }}
            </div>
            <div class="form-group col-md-4">
                {{ Form::label('wash', 'Lavado') }}
                {{ Form::select('wash', array('1' => 'Si', '2' => 'No'), 
							null ,['class' => 'form-control','required' ,'placeholder'=>'¿Esta Lavado?'])}}
            </div>
        </div>

        <div class="col-md-12">

            <h3 class="text-center">Listado</h3>



            </br>
            </br>
            </br>

          

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
                   
                        @forelse($reprocessPending as $pending)
                        <tr>  
                            <td>{{ $pending->tarja_reproceso }}</td>
                            <td>{{ $pending->fruit->specie }}</td>
                            <td>{{ $pending->varieties->variety }}</td>
                            <td>{{ $pending->quality->name}}</td>
                            <td>{{ $pending->status->name}}</td>
                            
                            <td> <a class="btn btn-sm btn-primary" href=" 
                            {{Route('subreprocess.create', [$pending->id, $identificador='s'])}} "> Reanudar </a> </td>
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
                    {{ $reprocessPending->render()}}
                </div>
                </table>   

            </br>
            </br>
            </br>

            <div class=" col-md-4">
            <p>Filtrar:</p>  
            <input class="form-control" id="myInput" type="text" placeholder="Buscar..">
            <br>
            </div>

            <div class="form-group"> 
                <h4 class="text-center">Lote</h4>
                <table class="table table-bordered">
                    <thead>
                        <tr class="">
                                    <th></th>
                                    <th>Tarja</th>
                                    <th>Calidad</th>
                                    <th>Cantidad</th>
                                    <th>Formato</th>
                                    <th>Fruta - Variedad</th>
                        </tr>
                    </thead>
                    <tbody id="myTable3">

                                @forelse($subprocesses as $subprocess)
                                <tr>
                                    <td>
                                        <input type="checkbox" name="subprocess[]" value="{{ $subprocess->id }}">
                                    </td>
                                    <td>{{ $subprocess->tarja }}</td>
                                    <td>{{ $subprocess->quality->name }}</td>
                                    <td class="quantity">{{ $subprocess->quantity }}</td>
                                    <td>{{ $subprocess->format->name}}</td>
                                    <td>{{ $subprocess->fruit->specie}} - {{$subprocess->varieties->variety}} </td>



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
                            {{ $subprocesses->render() }}

					<div class="float-left">
                
                </div>
                </table>
                
                </br>
                </br>
                </br>
                </br>
        
                <div>
                    <h4 class="text-center">Palet</h4>
                <table class="table table-bordered">
                    <thead>
                        <tr class="">
                        <th></th>
                                    <th>Tarja</th>
                                    <th>Calidad</th>
                                    <th>Cantidad</th>
                                    <th>Formato</th>
                                    <th>Fruta - Variedad</th>
                        </tr>
                    </thead>

                    </br>
                    </br>

                        <tbody id="myTable5">

                                    @forelse($lotes as $lote)
                                    <tr>
                                        <td> 
                                            <input type="checkbox" name="lotes[]" value="{{ $lote->id }}"> 
                                        </td>

                                        <td>{{ $lote->numero_lote }}</td>
                                        <td>{{ $lote->quality->name }}</td>
                                        <td>{{ $lote->quantity }}</td>
                                        <td>{{ $lote->format->name }}</td>
                                        <td>{{ $lote->fruit->specie }} - {{$lote->varieties->variety}}</td>


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
                                {{ $lotes->render() }}
                        
                    </tbody>
					<div class="float-left">
                    
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

    
    <div class="col-md-12 text-center">
        <div class="form-group text">
            {{ Form::submit('Guardar', ['class' => 'btn btn-success']) }}
        </div>
    </div>
    

   
    <br>
    <br>