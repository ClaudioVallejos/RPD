<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreQuality;
use App\Http\Requests\UpdateQuality;
use App\Quality;

class QualityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $qualyties = Quality::paginate();
        return view('admin.quality.index', compact('qualyties')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.quality.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreQuality $request)
    {
        $quality = Quality::create($request->all());
        
        return redirect()->route('admin.quality.index', $quality->id)->with('info','Calidad guardada con exito'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Quality $quality)
    {
        return view('admin.quality.show', compact('quality'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Quality $quality)
    {
        return view('admin.quality.edit', compact('quality'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateQuality $request,Quality $quality)
    {
        $quality->update($request->all()); 
        return redirect()->route('admin.quality.index', $quality->id)->with('info', 'Tipo de Calidad actualizada con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Quality $quality)
    {
        $quality->delete();
        return back()->with('info', 'Eliminado el tipo de calidad con exito'); 
    }
}
