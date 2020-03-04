<?php
namespace App\Http\Controllers;

use App\Format;
use Illuminate\Http\Request;
use App\Http\Requests\StoreFormat;
use App\Http\Requests\UpdateFormat;

class FormatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $formats = Format::paginate();
        return view('admin.formats.index', compact('formats')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.formats.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFormat $request)
    {
      $formats = Format::create($request->all());
        
        return redirect()->route('admin.formats.index', $formats->id)->with('info','Tipo de formato agregado con exito'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Format $format)
    {
        return view('admin.formats.show', compact('format'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Format $format)
    {
        return view('admin.formats.edit', compact('format'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFormat $request, Format $format)
    {
        $format->update($request->all()); 
        return redirect()->route('admin.formats.index', $format->id)->with('info', 'Formato actualizada con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Format $format)
    {
        $format->delete();
        return back()->with('info', 'Eliminacion de formato con exito'); 
    }
}
