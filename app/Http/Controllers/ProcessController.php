<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use App\Process;
use Illuminate\Http\Request;
use App\Reception;
use App\SubReprocess;
use App\Rejected;
use App\Fruit;
use App\Quality;
use App\Status;
use App\Format;
use App\Process_Reception;
use App\SubProcess;
use Yajra\Datatables\Datatables;

class ProcessController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function delete(){
      
        $processes = Process::where('available', 0)->orderBy('id', 'ASC')->paginate(50);
       
        return view('process.processes.delete', compact('processes' ));

        
    }
    public function index()
    {
        $countSubProcess = SubProcess::where('id')->count();
        $processes = Process::where('available', 1)->orderBy('id', 'ASC')->paginate(100);
        $historico = Process::orderBy('id', 'ASC')->paginate(100);
        return view('process.processes.index', compact('processes', 'countSubProcess'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        $processeslist = Process::paginate();
        $listFruits = Fruit::OrderBy('id', 'DES')->pluck('specie', 'id');
        $receptions = Reception::OrderBy('id', 'DESC')->where('available', 1)->paginate(10);
        $processPending = Process::where('available', 1)->orderBy('id', 'DESC')->paginate(10);
        $receptions = Reception::OrderBy('tarja', 'DESC')->where('available', 1)->paginate(10);
        $listRejecteds = Rejected::OrderBy('id', 'ASC')->pluck('reason', 'id');
        $listQualities = Quality::OrderBy('id', 'DES')->pluck('name', 'id');
        $listFormat = Format::OrderBy('id', 'DES')->pluck('name', 'id', 'weight');
        $listStatus = Status::OrderBy('id', 'DES')->pluck('name', 'id');
        $last = Process::OrderBy('id', 'DES')->first();
        if ($last == null) {
            $lastid = 1;
        } else {
            $lastid = $last->id + 1;
        }
        return view('process.processes.create', compact('lastid','receptions','processeslist',
        'listRejecteds', 'listFruits', 'listQualities', 'listFormat', 'listStatus', 'processPending'));
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

        $receptionId = $request->get('receptions');

        $fruit_id = Reception::where('id', $receptionId)->first()->fruit_id;
        $quality_id = Reception::where('id', $receptionId)->first()->quality_id;
        $variety_id = Reception::where('id', $receptionId)->first()->variety_id;
        $status_id = Reception::where('id', $receptionId)->first()->status_id;
        // Se genera el array con la información de proceso
    
        $process = [
            'variety_id' => $variety_id,
            'quality_id' => $quality_id,
            'fruit_id' => $fruit_id,
            'status_id' => $status_id,
            'tarja_proceso' => $request->get('tarja_proceso'),
            'rejected' => $request->get('rejected'),
            'wash' => $request->get('wash'),
        ];
        // Se crea
        $process = Process::create($process);
        //se establece la relación con receptions
        
        $process->receptions()->attach($request->get('receptions'));
        //se obtiene el id del ultimo
        $process_id = $process->id;
        //se obtienen todas las recepciones para crear un update de las recepciones que no estaran disponibles

        $checklistdata = $request->get('receptions');

        foreach ($checklistdata as $key) {
            $cualquiercosa = Reception::where('id', $key)->first();
            Reception::where('id', $key)->update(['available' => 0]);
        }
    
        return redirect()->route('subprocess.create', $process_id)->with('success', 'Proceso guardado con exito');
    }
    public function getData()
    {  //devolver todos los processos disponibles
        $process = Process::where('available', 0)->with([
            'fruit',
            'quality',
            'varieties',
            'status',
        ]);
        return Datatables::of($process)
            ->addColumn('fruit', function ($process) {
                return $process->fruit->specie;
            })->editColumn('quality', function ($process) {
                return $process->quality->name;
            })->editColumn('varieties', function ($process) {
                return $process->varieties->variety;
            })->editColumn('status', function ($process) {
                return $process->status->name;
            })->make(true);
  }
    /**
     * Display the specified resource.
     *
     * @param \App\Process $process
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Process $process)
    {
        // $receptions = Process_Reception::where('process_id',$process1)->get();
            $receptions = Process::find($process);
            $subprocess = SubProcess::where('process_id', $process->id)->get();
        return view('process.processes.show', compact('process', 'subprocess'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Process $process
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Process $process)
    {
        $subprocesses = SubProcess::where('process_id', $process->id)->get();
        return view('subprocess.processes.edit', compact('process', 'subprocesses'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Process             $process
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Process $process)
    {
        $process->update($request->all());

        return redirect()->route('process.processes.index', $process->id)->with('info', 'procesos actualizado con exito');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Process $process
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Process $process)
    {

        //se obtienen los subprocesos
        $subprocess = SubProcess::where('process_id', $process->id)->get();

        //se borran todas las weas 
        foreach($subprocess as $subproces){
            SubProcess::Where('id',$subproces->id)->delete();
        }

        //se buscan las id de todas las relaciones con el proceso actual
        $searchs = DB::table('process__receptions')->where('process_id',$process->id)->get();
        
        //se cambia el estado de las recepciones para usarlar nuevamente
        foreach($searchs as $busqueda){
            Reception::where('id', $busqueda->reception_id)->update(['available' => 1]);
        }
        //se borra el proceso
        $process->delete();

        //devuelve a la vista
        return back()->with('info', 'Eliminado con exito');
    }
}
