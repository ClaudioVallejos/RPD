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
                    <h4 style="text-align:center;"> Filtro Fruta y Calidad:

                </div>

                <br>
                <form method="POST" action="{{ route('reporteDespachoFruitSearch') }}">
                    @csrf

                    <div class="container">
                            <div class="row">
                                        <div class="col-sm">
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
             
                                    <div class="col-sm">
                                             <div class="form-group">
                                           {{ Form::label('quality_id', 'Calidad') }}
                                            {{Form::select('quality_id', $qualities, null, ['class' => 'form-control','required', 'placeholder'=>'Seleccione una opción'])}}
                                                </div>
                                    </div>                   
             
                                 
                                 
             
                                 
                            </div>
                            <div class="col-sm">
                                 
                                         <div class="form-group">
                                             <button type="submit" class="btn btn-primary">
                                                 <span class="fas fa-search"></span> Buscar
                                             </button>
                                         </div>
             
                                     </div>
                     </div>
                </form>


            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>
@endsection