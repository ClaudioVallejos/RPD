<?php

namespace App\Http\Controllers;

use App\Supplies;
use Illuminate\Http\Request;
use App\Http\Requests\StoreSupplies;

class SuppliesController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $supplies = Supplies::paginate();

        return view('admin.supplies.index', compact('supplies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.supplies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSupplies $request)
    {
        $supplies = Supplies::create($request->all());

        return redirect()->route('admin.supplies.index', $supplies->id)->with('info', 'Insumo guardado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Supplies $supplies
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Supplies $supplie)
    {
        return view('admin.supplies.show', compact('supplie'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Supplies $supplies
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Supplies $supplie)
    {
        return view('admin.supplies.edit', compact('supplie'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Supplies            $supplies
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Supplies $supplie)
    {
        $supplie->update($request->all());

        return redirect()->route('admin.supplies.index', $supplie->id)->with('info', 'Insumo actualizado con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Supplies $supplies
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Supplies $supplie)
    {
        $supplie->delete();

        return back()->with('info', 'Eliminado con exito');
    }
}
