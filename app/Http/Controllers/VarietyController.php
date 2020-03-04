<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Variety; 
use App\Fruit;
use App\Http\Requests\StoreVariety;
use App\Http\Requests\UpdateVariety;

class VarietyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $varieties = Variety::paginate();
        return view('admin.varieties.index', compact('varieties')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $listFruits = Fruit::OrderBy('id', 'DES')->pluck('specie', 'id');

        return view('admin.varieties.create', compact('listFruits'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreVariety $request)
    {
        $varieties = Variety::create($request->all());
        
        return redirect()->route('admin.varieties.index', $varieties->id)->with('info','Tipo de variedad guardada con exito'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Variety $variety)
    {
        return view('admin.varieties.show', compact('variety'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Variety $variety)
    {
        $listFruits = Fruit::OrderBy('id', 'DES')->pluck('specie', 'id');

        return view('admin.varieties.edit', compact('variety', 'listFruits'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateVariety $request, Variety $variety)
    {
        $variety->update($request->all()); 
        return redirect()->route('admin.varieties.index', $variety->id)->with('info', 'Tipo de variedad actualizada con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Variety $variety)
    {
        $variety->delete();
        return back()->with('info', 'Eliminado el tipo de fruta con exito'); 
    }
}
