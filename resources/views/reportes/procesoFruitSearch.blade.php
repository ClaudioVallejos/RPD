@extends('layouts.dashboard')

@section('section')
<link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.css"
    integrity="sha256-b5ZKCi55IX+24Jqn638cP/q3Nb2nlx+MH/vMMqrId6k=" crossorigin="anonymous" />

<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"
    integrity="sha256-4iQZ6BVL4qNKlQ27TExEhBN1HFPvAvAMbFavKKosSWQ=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"
    integrity="sha256-5YmaxAwMjIpMrVlK84Y/+NjCpKnFYa8bWWBbUHSBGfU=" crossorigin="anonymous"></script>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10 col-md-offset-1 ">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h4 style="text-align:center;"> Fruta Procesada

                </div>


                <form method="POST" action="{{ route('reporteProcesoFruitSearch') }}">
                    @csrf

                        <div class="col-md-12">
                               <div class="row">
                                    <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="fruit_id">Fruta</label>
                                                <select class="form-control" name="fruit_id" id="fruit_id">
                                                    <option value=""> Fruta </option>
                                                    @foreach ($fruits as $fruit)
                                                    <option value="{{ $fruit->id }}"> {{ $fruit->specie }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                
                                         <div class="col-md-4">
                                            <div class="form-group">
                                             {{ Form::label('quality_id', 'Calidad') }}
                                            {{Form::select('quality_id', $qualities, null, ['class' => 'form-control','required', 'placeholder'=>'Seleccione una opción'])}}
                                            </div>
                                        </div>         
                
                                    <div class="col-md-6 mt-4">
                                    
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-primary">
                                                    <span class="fas fa-search"></span> Calcular Total
                                                </button>
                                            </div>
                
                                        </div>
                               </div>
                        </div>


                </form>



                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead >
                            <tr >
                                <td><strong>Tarja</strong></td>
                                <td ><strong>Fruta y Variedad</strong></td>
                                <td><strong>Calidad</strong></td>
                                <td><strong>Peso</strong></td>
                                
                                <th colspan="auto">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                             @forelse($processes as $process)
                            <tr>
                                
                                <td>{{$process->tarja}} </td>
                                <td>{{ $process->fruit->specie  }} - {{$process->varieties->variety}} </td>
                                <td>{{$process->quality->name}} </td>
                                <td>{{$process->weight}} </td>
                               

                            </tr>
                            @empty
                            <h1 class="alert alert-danger text-center"> No hay reporte </h1>
                            @endforelse

                            <tr>
                                                   <h3> Total </h3>
                        <tr style="font-size:24px">

                            <td><strong>Total de kilos Procesado: {{ $sum}}</strong>  </td>
                        </tr>
                            </tr>

                        </tbody>
                    </table>
                    <table class="table responsive">

                    </table>
                   
                </div>
            </div>
        </div>
    </div>
</div>

@endsection