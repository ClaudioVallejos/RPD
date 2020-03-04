<?php

namespace App\Http\Controllers;
use App\TipoDispatch;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTipoDispatch;
use App\Http\Requests\UpdateTipoDispatch;

class TipoDispatchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipodispatches = TipoDispatch::paginate();
        return view('admin.tipodispatches.index', compact('tipodispatches'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tipodispatches.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTipoDispatch $request)
    {

        $tipodispatch = TipoDispatch::create($request->all());
        
        return redirect()->route('admin.tipodispatches.index', $tipodispatch->id)->with('info','Temprada guardado con exito'); 
    }

    
    public function show(TipoDispatch $tipodispatch)
    {
        return view('admin.tipodispatches.show', compact('tipodispatch'));

    }

    
    public function edit(TipoDispatch $tipodispatch)
    {
        return view('admin.tipodispatches.edit', compact('tipodispatch'));
    }

    
    public function update(UpdateTipoDispatch $request,TipoDispatch $tipodispatch)
    {
        $tipodispatch->update($request->all()); 
        return redirect()->route('admin.tipodispatches.index', $tipodispatch->id)->with('info', 'Actualizado con exito');
    }

    public function destroy(TipoDispatch $tipodispatch)
    {
        $tipodispatch->delete();
        return back()->with('info', 'Eliminado con exito'); 
    }
}
