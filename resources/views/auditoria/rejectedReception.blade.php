@extends('layouts.dashboard')

@section('section')

@if ($message = Session::get('habilitado'))
              <script>
                      Swal.fire(
                          'Actualizado con exito!',
                          '{{ $message }}',
                          'success'
                          )
              </script>
              @endif

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 col-md-offset-1 ">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h4 style="text-align:center;">Aseguramiento de Calidad</h4>
                </div>
                <div class=" col-md-4">
                    <p>Filtrar:</p>
                    <input class="form-control" id="myInput" type="text" placeholder="Buscar...">
                    <br>
                </div>
                <div class="panel-body">
                <div class="card">
                <table class="table table-bordered table-striped">
                   
                        <thead class="thead-dark">
                            <tr>
                                <th>Tarja</th>
                                <th>Calidad</th>
                                <th>Fruta - Variedad</th>
                                <th>N° rejillas</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody id="myTable">
                            <script>
                            </script>
                             @forelse($receptionRejecteds as $rejected)
                            <tr>
                                <td>RE00{{$rejected->id }}</td>
                                <td>{{ $rejected->quality->name }}</td>
                                <td>{{ $rejected->fruit->specie}} - {{ $rejected->varieties->variety }}</td>
                                <td>{{ $rejected->quantity}}  </td>
                                <td>                                    
                                <a href="{{ route('auditoria.update', $rejected->id) }}" class="btn btn-sm btn-success">Habilitar</a>           
                                </td>
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
                    </table>
                </div>
                <br/>
                <br/>
  
  </div>
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

        @else
        <div class="btn btn-lg btn-danger disabled"> No se puede ingresar </div>
        @endif

    </div>

    @endsection