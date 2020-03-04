@extends('layouts.dashboard')

@section('section')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 col-md-offset-1 ">
            <div class="container">
                <h2>Recepciones</h2>

                <form method="POST" action="{{ route('reporteDespachoProviderSearch') }}">
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


                </form>

                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($dispatchs as $dispatch)
                            <tr>
                                <td>{{ $dispatch->id }}</td>
                                <td>{{ $dispatch->grossweight }}</td>
                                <td>{{ $dispatch->quantity }}</td>
                                <td>{{ $dispatch->palet_weight }}</td>
                                <td>{{ $dispatch->netweight }}</td>
                            </tr>
                            @empty
                            <h1 class="alert alert-danger text-center"> No hay reporte </h1>
                            
                            @endforelse
                        </tbody>
                    </table>
                    <h1> Peso Neto: {{ $dispatchs->sum('netweight') }}</h1>
                    <h1> Peso Bruto: {{ $dispatchs->sum('grossweight') }}</h1>

                </div>

            </div>

        </div>
    </div>
</div>
@endsection