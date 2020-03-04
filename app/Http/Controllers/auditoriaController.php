<?php

namespace App\Http\Controllers;

use App\Reception;
use App\SubProcess;
use App\Lote;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class auditoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $subProcessRejecteds = SubProcess::where('rejected', 1)->get();
        return view ('auditoria.rejected', compact('subProcessRejecteds'));

    }

    public function indexLote()
    {
        $loteRejecteds = Lote::where('rejected', 1)->get();
        return view ('auditoria.rejectedLote', compact('loteRejecteds'));
    }

    public function indexReception()
    {
        $receptionRejecteds = Reception::where('rejected', 1)->get();
        return view ('auditoria.rejectedReception', compact('receptionRejecteds'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($id)
    {
      
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    { 

        SubProcess::where('id', $id)->update(['rejected' => 0]);

        return back()->with('habilitado',"Actualizado!");
    }
    public function updateLote($id)
    { 
        Lote::where('id', $id)->update(['rejected' => 0]);

        return back()->with('habilitado',"Actualizado!");
    }
    public function updateReception($id)
    { 

        Reception::where('id', $id)->update(['rejected' => 0]);

        return back()->with('habilitado',"Actualizado!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
