<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreRejected;
use App\Http\Requests\UpdateRejected;
use App\Rejected;

class RejectedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rejecteds = Rejected::paginate();

        return view('admin.rejecteds.index', compact('rejecteds'));
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
        $rejected = Rejected::create($request->all());

        return redirect()->route('admin.rejecteds.index', $rejected->id)->with('info', 'Calidad guardada con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Rejected $rejected)
    {
        return view('admin.rejecteds.show', compact('rejected'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Rejected $rejected)
    {
        return view('admin.rejecteds.edit', compact('rejected'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRejected $request, Rejected $rejected)
    {
        $rejected->update($request->all());
        return redirect()->route('admin.rejecteds.index', $rejected->id)->with('info', 'Tipo de Calidad actualizada con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rejected $rejected)
    {
        $rejected->delete();

        return back()->with('info', 'Eliminado el tipo de calidad con exito');
    }
}
