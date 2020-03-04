<?php

namespace App\Http\Controllers;

use App\Fruit;
use Illuminate\Http\Request;
use App\Http\Requests\StoreFruit;
use App\Http\Requests\UpdateFruit;

class FruitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fruits = Fruit::paginate();

        return view('admin.fruits.index', compact('fruits'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.fruits.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFruit $request)
    {
        $fruits = Fruit::create($request->all());

        return redirect()->route('admin.fruits.index', $fruits->id)->with('info', 'Tipo de fruta guardada con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Fruit $fruit)
    {
        return view('admin.fruits.show', compact('fruit'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Fruit $fruit)
    {
        return view('admin.fruits.edit', compact('fruit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFruit $request, Fruit $fruit)
    {
        $fruit->update($request->all());

        return redirect()->route('admin.fruits.index', $fruit->id)->with('info', 'Tipo de fruta actualizada con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Fruit $fruit)
    {
        $fruit->delete();

        return back()->with('info', 'Eliminado el tipo de fruta con exito');
    }
}
