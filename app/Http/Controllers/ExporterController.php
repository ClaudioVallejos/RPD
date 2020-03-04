<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreExporter;
use App\Http\Requests\UpdateExporter;
use App\Exporter;

class ExporterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $exporters = Exporter::paginate();

        return view('admin.exporters.index', compact('exporters'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.exporters.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(StoreExporter $request)
    {
       
        $exporter = Exporter::create($request->all());
       
        return redirect()->route('admin.exporters.index', $exporter->id)->with('info', 'Exportador guardado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Exporter $exporter)
    {
        return view('admin.exporters.show', compact('exporter'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Exporter $exporter)
    {
        return view('admin.exporters.edit', compact('exporter'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateExporter $request, Exporter $exporter)
    {
        $exporter->update($request->all());

        return redirect()->route('admin.exporters.index', $exporter->id)->with('info', 'Exportador actualizado con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Exporter $exporter)
    {
        $exporter->delete();

        return back()->with('info', 'Eliminado el exportador con exito');
    }
}
