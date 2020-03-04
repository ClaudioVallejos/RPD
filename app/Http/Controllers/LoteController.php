<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SubProcess;
use App\SubReprocess;
use App\Rejected;
use App\Lote;
use App\Fruit;
use App\Format;
use App\Quality;
use App\Variety;
use Yajra\Datatables\Datatables;
use Barryvdh\DomPDF\Facade as PDF;
use DB;

class LoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lotes = Lote::paginate();

        return view('lotes.index', compact('lotes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //lista de tabla pivote en despacho (checkbox)

        $lotes = Lote::paginate();
        if ($request->Producto == 'RP') {
            $coleccion = SubReprocess::orderBy('id', 'DES')
            ->where('available', 1)
            ->where('format_id', '!=', 5)
            ->where('rejected', 0)
            ->where('fruit_id', $request->fruit_id)
            ->where('quality_id', $request->quality_id)->paginate(10);
        } else {
            $coleccion = SubProcess::orderBy('id', 'DES')
            ->where('available', 1)
            ->where('format_id', '!=', 5)
            ->where('rejected', 0)
            ->where('fruit_id', $request->fruit_id)
            ->where('quality_id', $request->quality_id)->paginate(10);
        }

        $listRejecteds = Rejected::OrderBy('id', 'ASC')->pluck('reason', 'id');
        $last = Lote::OrderBy('id', 'DES')->first();

        if ($last == null) {
            $lastid = 1;
        } else {
            $lastid = $last->id + 1;
        }

        return view('lotes.create', compact('lotes', 'lastid', 'coleccion', 'listRejecteds'));
    }

    public function createsearch()
    {
        $fruits = Fruit::OrderBy('id', 'DES')->get();

        $qualities = Quality::pluck('name', 'id');

        return view('lotes.partials.form', compact( 'fruits', 'qualities'));
    }

    public function byFruit($id)
    {
        return Variety::where('fruit_id', $id)->get();
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
        $numero_lote = $request->get('numero_lote');
        $lotes = $request->get('subprocess');
     //   dd($request->all());

      //  $value = starts_with('Esto es un texto de prueba', 'Esto');

        $quantity = $request->get('lote');
        $fruit = SubProcess::where('id', $lotes)->first()->fruit_id;
        $variety = SubProcess::where('id', $lotes)->first()->variety_id;
        $format = SubProcess::where('id', $lotes)->first()->format_id;
        $status = SubProcess::where('id', $lotes)->first()->status_id;

        $quality = SubProcess::where('id', $lotes)->first()->quality_id;

        $weight = Format::where('id', $format)->first()->weight;

        $palletWeight = $quantity * $weight;

        $ultimolote = Lote::orderBy('id', 'DESC')->first();

        if ($numero_lote == null) {
            $numero_lote = 'P001';

            $lotes = [
                    'numero_lote' => $numero_lote,
                    'fruit_id' => $fruit,
                    'variety_id' => $variety,
                    'quality_id' => $quality,
                    'format_id' => $format,
                    'quantity' => $quantity,
                    'palletWeight' => $palletWeight,
                    'status_id' => $status,
                ];

            $lotes = Lote::create($lotes);
        } else {
            $lotes = [
                    'numero_lote' => $numero_lote,
                    'fruit_id' => $fruit,
                    'variety_id' => $variety,
                    'quality_id' => $quality,
                    'format_id' => $format,
                    'quantity' => $quantity,
                    'palletWeight' => $palletWeight,
                    'status_id' => $status,
                ];

            $lotes = Lote::create($lotes);
        }

        $lotes->subprocess()->attach($request->get('subprocess'));

        $lote = $lotes->numero_lote;

        $checklistdata = $request->get('subprocess');

        foreach ($checklistdata as $key) {
            SubProcess::where('id', $key)->update(['available' => 0]);
        }

        return redirect()->route('lotes.index')->with('info', 'despacho guardado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function getData()
    {  //devolver todos los processos disponibles
        $lotes = Lote::where('available', 1)->with([
            'format',
            'quality',
            'fruit',
            'varieties',
            'status',
        ]);

        return Datatables::of($lotes)
            ->addColumn('format', function ($lote) {
                return $lote->format->name;
            })
            ->editColumn('quality', function ($lote) {
                return $lote->quality->name;
            })

             ->addColumn('fruit', function ($lote) {
                 return $lote->fruit->specie;
             })
            ->editColumn('varieties', function ($lote) {
                return $lote->varieties->variety;
            })
            ->editColumn('status', function ($lote) {
                return $lote->status->name;
            })
            ->make(true);
    }

    public function getLotes()
    {
        $lotes = Lote::orderBy('id', 'ASC')->paginate(20);

        return view('lotes.camaralote', compact('lotes'));
    }

    public function print($id)
    {
        $lotes = Lote::where('id', $id)->first();

        $customPaper = array(0, 0, 410, 750);
        $pdf = PDF::loadView('lotes.print  ', compact('lotes'))->setPaper($customPaper);

        return $pdf->stream();
    }

    public function show(Lote $lote)
    {
        $subprocess = DB::table('lote_sub_process')->where('lote_id', $lote->id)->get();
        $lotes = Lote::where('id', $lote->id)->get();
       

        return view('lotes.show', compact('subprocess', 'lotes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Lote $lote, $id)
    {
        return view('lotes.edit', compact('lote'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lote $lote)
    {
        $lote->update($request->all());

        return redirect()->route('lotes.index', $lote->id)->with('info', 'Lote actualizado con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lote $lote)
    {
        $lote->delete();

        return back()->with('info', 'Eliminado con exito');
    }
}
