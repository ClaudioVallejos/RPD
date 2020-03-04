@extends('layouts.dashboard')

@section('section')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 col-md-offset-1 ">
            <div class="container">
                <h1 style="text-align: center;">Reporte de Productor </h1>
                <br>
                <br>

                <form method="POST" action="{{ route('receptionproductor') }}">
                    @csrf

                    <div class="row">
                        <select class="form-control col-md-6" name="provider_id" id="provedor">
                            <option value=""> Seleccionar Proveedor </option>
                            @foreach ($listProviders as $listProvider)
                            <option value="{{ $listProvider->id }}"> {{ $listProvider->name }}</option>
                            @endforeach
                        </select>

                        <div class="form-group col-md-6">
                            <button type="submit" class="btn btn-primary">
                                <span class="fas fa-search"></span> Buscar
                            </button>
                        </div>
                    </div>
                    <br>
                    <br>

                </form>
                <h1 style="text-align: center;">Datos del Productor</h1>
                <br>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                               <th>Fruta</th>
                               <th>Variedad</th>
                                <th>Peso Bruto</th>
                                <th>Peso Neto</th>
                                <th>Cantidad de cajas</th>
                                <th>Peso de Palet</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($receptions as $reception)
                            <tr>
                                <td>{{ $reception->fruit->specie}}</td>
                                <td>{{ $reception->varieties->variety}}</td>
                                <td>{{ $reception->grossweight }}</td>
                                <td>{{ $reception->netweight }}</td>
                                <td>{{ $reception->quantity }}</td>
                                <td>{{ $reception->palet_weight }}</td>

                            </tr>
                            @empty
                            <h1 class="alert alert-danger text-center"> No hay reporte </h1>                            @endforelse
                        </tbody>
                    </table>
                    <br> 
                    <br>
                    <h1> Peso Neto: {{ $neto }}</h1>
                    <h1> Peso Bruto: {{ $bruto }}</h1>


                </div>

            </div>

        </div>
    </div>
</div>
@endsection