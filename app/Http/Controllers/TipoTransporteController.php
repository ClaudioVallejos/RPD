<?php

namespace App\Http\Controllers;

use App\TipoTransporte;
use Illuminate\Http\Request;


class TipoTransporteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipotransportes = TipoTransporte::paginate();
        return view('admin.tipotransportes.index', compact('tipotransportes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tipotransportes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tipotransporte = TipoTransporte::create($request->all());
        return redirect()->route('admin.tipotransportes.index', $tipotransporte->id)->with('info', 'etipotransporte guardado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\TipoTransporte $tipotransporte
     *
     * @return \Illuminate\Http\Response
     */
    public function show(TipoTransporte $tipotransporte)
    {
        return view('admin.tipotransportes.show', compact('tipotransporte'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\TipoTransporte $tipotransporte
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(TipoTransporte $tipotransporte)
    {
        return view('admin.tipotransportes.edit', compact('tipotransporte'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\TipoTransporte              $tipotransporte
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TipoTransporte $tipotransporte)
    {
        $tipotransporte->update($request->all());

        return redirect()->route('admin.tipotransportes.index', $tipotransporte->id)->with('info', 'etipotransporte actualizado con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\TipoTransporte $tipotransporte
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(TipoTransporte $tipotransporte)
    {
        $tipotransporte->delete();

        return back()->with('info', 'estatus eliminado con exito');
    }
}
