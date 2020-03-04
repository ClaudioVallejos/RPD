<?php

namespace App\Http\Controllers;

use App\Format;
use App\Fruit;
use App\Variety;
use App\SubProcess;
use App\Process;
use App\Quality;
use App\Status;
use App\motivorejected;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use Yajra\Datatables\Datatables;

class SubProcessController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subprocesses = SubProcess::paginate(50);

        return view('subprocess.index', compact('subprocesses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function print($id)
    {
        $subprocesses = SubProcess::where('id', $id)->first();

        $customPaper = array(0, 0, 410, 750);
        $pdf = PDF::loadView('subprocess.print  ', compact('subprocesses'))->setPaper($customPaper);

        return $pdf->stream();
    }

    public function create($id)
    {
        //obtener la ultima id
        
        $last = SubProcess::OrderBy('id', 'DES')->first();
        if ($last == null) {
            $lastid = 1;
        } else {
            $lastid = $last->id + 1;
        }

        $processes = DB::table('process__receptions')->where('process_id', $id)->get();
        $pesos = array();
        foreach ($processes as $process => $value) {
            $reception = DB::table('receptions')->where('id', $value->reception_id)->get();
            $peso = $reception[0]->netweight;
            array_push($pesos, $peso);
        }

        $peso = array_sum($pesos);

        $subprocess = SubProcess::where('process_id', $id)->get();

        $acumWeight = SubProcess::where('process_id', $id)->sum('weight');

        $resto = 0;

        $idsad = $id;

        $subprocesses = SubProcess::where('process_id', $idsad)->where('rejected', 0)->paginate();

        //formato y peso para la vista
        $listFormat = Format::OrderBy('id', 'DES')->pluck('name', 'id');
        $listQualities = Quality::OrderBy('id', 'DES')->pluck('name', 'id');
        $listRejecteds = motivorejected::OrderBy('id', 'ASC')->pluck('name', 'id');
        $listFruits = Fruit::OrderBy('id', 'DES')->get();

        $listVariety = Variety::OrderBy('id', 'DES')->pluck('variety', 'id');

        $listStatus = Status::OrderBy('id', 'DES')->pluck('name', 'id');

        return view('subprocess.create', compact('lastid', 'idsad', 'peso', 'listFormat', 'listQualities', 'listRejecteds', 'acumWeight', 'resto', 'subprocesses', 'listFruits', 'listVariety', 'listStatus'));
    }

    public function getData()
    {
        $subprocesses = SubProcess::where('available', 1)->where('format_id', '!=', 5)->with([
            'fruit',
            'format',
            'quality',
            'varieties',
            'status',
        ]);

        return Datatables::of($subprocesses)
            ->addColumn('fruit', function ($subprocess) {
                return $subprocess->fruit->specie;
            })
            ->addColumn('format', function ($subprocess) {
                return $subprocess->format->name;
            })
            ->addColumn('status', function ($subprocess) {
                return $subprocess->status->name;
            })
            ->editColumn('quality', function ($subprocess) {
                return $subprocess->quality->name;
            })

            ->editColumn('varieties', function ($subprocess) {
                return $subprocess->varieties->variety;
            })

            ->make(true);
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
        //validacion y desactivacion de un proceso
        
        if ($request->format_id === '5') {
            
            $idProcess = $request->get('process_id');
            //FINALIZAR UN PROCESO
            $format_id = $request->get('format_id');
            $quantity = $request->get('quantity');
            $formatWeight = Format::where('id', $format_id)->first()->weight;
            $weight = $formatWeight * $quantity;

            $fruit_id = Process::where('id', $idProcess)->first()->fruit_id;
            $status_id = Process::where('id', $idProcess)->first()->status_id;
            $variety_id = Process::where('id', $idProcess)->first()->variety_id;

            $request->merge(['fruit_id' => $fruit_id, 'variety_id' => $variety_id, 'status_id' => $status_id, 'weight' => $weight]);

            SubProcess::create($request->all());

            $key = $request->get('process_id');

            Process::where('id', $key)->update(['available' => 0]);

            return redirect()->route('process.processes.index')->with('info', 'Proceso finalizado con exito');
        } else {
            $idProcess = $request->get('process_id');
            
            $format_id = $request->get('format_id');
            $quantity = $request->get('quantity');
            $formatWeight = Format::where('id', $format_id)->first()->weight;
            $weight = $formatWeight * $quantity;

            $fruit_id = Process::where('id', $idProcess)->first()->fruit_id;
            $variety_id = Process::where('id', $idProcess)->first()->variety_id;
            $status_id = Process::where('id', $idProcess)->first()->status_id;

            $request->merge(['fruit_id' => $fruit_id, 'variety_id' => $variety_id, 'status_id' => $status_id, 'weight' => $weight]);

            SubProcess::create($request->all());

            return redirect()->route('subprocess.create', $idProcess)->with('info', 'Temprada guardado con exito');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param \App\SubProcess $subProcess
     *
     * @return \Illuminate\Http\Response
     */
    public function show(SubProcess $subProcess)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\SubProcess $subProcess
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(SubProcess $subProcess)
    {
        return view('subprocess.edit', compact('subProcess'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\SubProcess          $subProcess
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SubProcess $subprocess)
    {
        $subprocess->update($request->all());

        return redirect()->route('subprocess.index', $subprocess->id)->with('info', 'Insumo actualizado con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\SubProcess $subProcess
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubProcess $subProcess)
    {
    }
}
