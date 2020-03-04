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

             

        </div>
    </div>
</div>
@endsection