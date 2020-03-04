<?php

namespace App\Http\Controllers;

use App\TrayIn;
use App\Providers;
use Illuminate\Http\Request;

class TrayInController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()

    {

        $liststocks = TrayIn::paginate();
        return view('admin.trays.index', compact('liststocks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $liststocks = TrayIn::paginate(10);
        //Calcular Stock General
        
        $stockbandejas = TrayIn::get()->sum('traysin');

     
      
        $listProviders = Providers::OrderBy('id', 'DES')->pluck('name', 'id');
        
        return view('admin.trays.create', compact('listProviders', 'stockbandejas', 'liststocks'));
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
        $accion = $request->get('accion');
            
        if ($accion == 1){
            $trayIn = TrayIn::create($request->all());
        }else{
            $traysinn = $request->get("traysin");
            $traysin = $traysinn * (-1);
             //unir datos al request
            $request->merge(['traysin' => $traysin]);
            $trayIn = TrayIn::create($request->all());
        }

        return redirect()->route('admin.trays.create', $trayIn->id)->with('info', 'Ingreso exitoso');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\TrayIn $trayIn
     *
     * @return \Illuminate\Http\Response
     */
    public function show(TrayIn $trayIn)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\TrayIn $trayIn
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(TrayIn $trayIn)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\TrayIn              $trayIn
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TrayIn $trayIn)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\TrayIn $trayIn
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(TrayIn $trayIn)
    {
    }
}
