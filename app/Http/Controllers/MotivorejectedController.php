<?php

namespace App\Http\Controllers;

use App\motivorejected;
use Illuminate\Http\Request;
use App\Http\Requests\StoreRejected;

class MotivorejectedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $motivorejecteds = motivorejected::paginate(5);
        return view('admin.rejecteds.index', compact('motivorejecteds'));
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.rejecteds.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRejected $request)
    {
        
        $motivorejected = motivorejected::create($request->all());
        return redirect()->route('admin.rejecteds.index', $motivorejected->id)->with('info', 'Motivo guardado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\motivorejected $motivorejected
     *
     * @return \Illuminate\Http\Response
     */
    public function show(motivorejected $motivorejected)
    {
        return view('admin.rejecteds.show', compact('motivorejected'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\motivorejected $motivorejected
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(motivorejected $motivorejected)
    {
        
        return view('admin.rejecteds.edit', compact('motivorejected'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\motivorejected      $motivorejected
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, motivorejected $motivorejected)
    {
        
        $motivorejected->update($request->all());
        return redirect()->route('admin.rejecteds.index', $motivorejected->id)->with('info', 'Motivo de rechazo, actualizado con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\motivorejected $motivorejected
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(motivorejected $motivorejected)
    {
        $motivorejected->delete();
        
        return back()->with('info', 'Eliminado con exito'); 
    }
}
