<?php

namespace App\Http\Controllers;

use Illuminate\Validation\Validator;

use Illuminate\Http\Request;
use App\Http\Requests\StoreSeason;
use App\Http\Requests\UpdateSeason;
use App\Season; 

class SeasonController extends Controller
{
    public function index()
    {
        $seasons = Season::paginate();
        return view('admin.seasons.index', compact('seasons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.seasons.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSeason $request)
    {

        $season = Season::create($request->all());
        
        return redirect()->route('admin.seasons.index', $season->id)->with('info','Temporada guardado con exito'); 
    }

    
    public function show(Season $season)
    {
        return view('admin.seasons.show', compact('season'));

    }

    
    public function edit(Season $season)
    {
        return view('admin.seasons.edit', compact('season'));
    }

    
    public function update(UpdateSeason $request,Season $season)
    {
        $season->update($request->all()); 
        return redirect()->route('admin.seasons.index', $season->id)->with('info', 'Termporada actualizado con exito');
    }

    public function destroy(Season $season)
    {
        $season->delete();
        return back()->with('info', 'Eliminado con exito'); 
    }
}
