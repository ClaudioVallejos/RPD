<?php

namespace App\Http\Controllers;

use App\Reception;
use App\Supplies;
use App\Providers;
use App\Fruit;
use App\Variety;
use App\Quality;
use App\Status;
use App\Rejected;
use App\Season;
use App\Rate;
use App\motivorejected;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateReception;
use Yajra\Datatables\Datatables;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\Input;

class ReceptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function delete(){
        //sin procesar
        $receptions = Reception::where('available', 1)->paginate();
        $receptionWeight = Reception::where('available', 1)->sum('netweight');
        $receptionQuantity = Reception::where('available', 1)->sum('quantity');
        $receptionCount = Reception::where('available', 1)->count();
        $historico = Reception::paginate(100);

        return view('receptions.delete', compact('receptions', 'receptionWeight', 'receptionQuantity', 'receptionCount'));

        
    }
    public function index()
    {
        //sin procesar
        $receptions = Reception::where('available', 1)->paginate();
        $receptionWeight = Reception::where('available', 1)->sum('netweight');
        $receptionQuantity = Reception::where('available', 1)->sum('quantity');
        $receptionCount = Reception::where('available', 1)->count();
        $historico = Reception::paginate(100);

        return view('receptions.index', compact('receptions', 'receptionWeight', 'receptionQuantity', 'receptionCount'));
    }

    //funcion creada para hacer reportes
    public function receptionsdaily()
    {
        return view('receptions.receptionsdaily');
    }

    public function receptionsperfruit()
    {
        $fruits = Fruit::all();
         $qualities = Quality::OrderBy('id', 'DES')->pluck('name', 'id');

        return view('receptions.receptionsperfruit', compact('fruits','qualities'));
    }

    public function receptionsperproductor()
    {
        $listProviders = Providers::OrderBy('id', 'DES')->get();
        $listSeasons = Season::OrderBy('id', 'DES')->get();

        return view('receptions.receptionsperproductor', compact('listProviders', 'listSeasons'));
    }

    public function getData()
    {
        $receptions = Reception::where('available', 1)->with([
            'fruit',
            'provider',
            'supplies',
            'season',
            'quality',
            'varieties',
        ]);

        return Datatables::of($receptions)
            ->addColumn('fruit', function ($reception) {
                return $reception->fruit->specie;
            })
            ->editColumn('provider', function ($reception) {
                return $reception->provider->name;
            })
            ->editColumn('supplies', function ($reception) {
                return $reception->supplies->name;
            })
            ->editColumn('season', function ($reception) {
                return $reception->season->name;
            })
            ->editColumn('quality', function ($reception) {
                return $reception->quality->name;
            })
            ->editColumn('available', function ($reception) {
                return 'disponible';
            })
            ->editColumn('varieties', function ($reception) {
                return $reception->varieties->variety;
            })

            ->make(true);
    }

    public function print($id)
    {
        $receptions = Reception::where('id', $id)->first();

        $customPaper = array(0, 0, 410, 750);
        $pdf = PDF::loadView('receptions.print  ', compact('receptions'))->setPaper($customPaper);

        return $pdf->stream();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $receptionslist = Reception::paginate('5');

        $listSupplies = Supplies::OrderBy('id', 'DES')->pluck('name', 'weight');

        $listProviders = Providers::OrderBy('id', 'DES')->pluck('name', 'id');

        $listFruits = Fruit::OrderBy('id', 'DES')->get();

        $listVariety = Variety::OrderBy('id', 'DES')->pluck('variety', 'id');

        $listRejecteds = MotivoRejected::OrderBy('id', 'DES')->pluck('name', 'id');

        $listQualities = Quality::OrderBy('id', 'DES')->pluck('name', 'id');

        $listSeasons = Season::OrderBy('id', 'DES')->pluck('name', 'id');

        $listStatus = Status::OrderBy('id', 'DES')->pluck('name', 'id');

        $last = Reception::OrderBy('id', 'DES')->first();

        if ($last == null) {
            $lastid = 1;
        } else {
            $lastid = $last->id + 1;
        }

        return view('receptions.create', compact(
            'lastid',
            'receptionslist',
            'listStatus',
            'listSupplies',
            'listProviders',
            'listQualities',
            'listFruits',
            'listSeasons',
            'listRejecteds',
            'listVariety'
        ));
    }

    public function byFruit($id)
    {
        return Variety::where('fruit_id', $id)->get();
    }

    public function dailytotal(Request $request)
    {
        $q = Input::post('date');
                

        $oneday = strtotime ( '+1 day' , strtotime ($q) );
        $oneday = date( 'Y-m-d' , $oneday );
        
        $from = date($q .' 07:00:00', time()); //Fecha inicio
        $to = date($oneday .' 07:00:00', time()); //Fecha inicio

        $receptions = Reception::whereDate('created_at', $q)->get();
    
        $listProviders = Providers::OrderBy('id', 'DES')->get();
        $neto = Reception::whereDate('created_at', '=', $q)->sum('netweight');
        $bruto = Reception::whereDate('created_at', '=', $q)->sum('grossweight');

        return view('receptions.receptionsdailysearch', compact('receptions', 'listProviders', 'neto', 'bruto'));
    }

    public function fruittotal(Request $request)
    {
        $q = Input::post('fruit_id');
        $qq = Input::post('quality_id');
        $receptions = Reception::where('fruit_id', $q)->where('quality_id', $qq)->get();
        $neto = Reception::where('fruit_id', $q)->where('quality_id', $qq)->sum('netweight');
        $bruto = Reception::where('fruit_id', $q)->where('quality_id', $qq)->sum('grossweight');
        $fruits = Fruit::all();
         $qualities = Quality::OrderBy('id', 'DES')->pluck('name', 'id');

        return view('receptions.receptionsperfruitsearch', compact('receptions', 'neto', 'bruto', 'fruits','qualities'));
    }

    public function productortotal(Request $request)
    {
        $q = Input::post('provider_id');
        $receptions = Reception::all()->where('provider_id', $q);
        $listProviders = Providers::OrderBy('id', 'DES')->get();
        $neto = Reception::all()->where('provider_id', $q)->sum('netweight');
        $bruto = Reception::all()->where('provider_id', $q)->sum('grossweight');

        return view('receptions.receptionsperproductornothing', compact('receptions', 'listProviders', 'neto', 'bruto'));
    }

    public function byProduction($id)
    {
        $receptions = Reception::where('provider_id', $id)->with([
            'fruit',
            'provider',
            'supplies',
            'season',
            'quality',
        ]);

        return Datatables::of($receptions)
        ->addColumn('fruit', function ($reception) {
            return $reception->fruit->specie;
        })
        ->editColumn('provider', function ($reception) {
            return $reception->provider->name;
        })
        ->editColumn('supplies', function ($reception) {
            return $reception->supplies->name;
        })
        ->editColumn('season', function ($reception) {
            return $reception->season->name;
        })
        ->editColumn('quality', function ($reception) {
            return $reception->quality->name;
        })
        ->editColumn('available', function ($reception) {
            return 'disponible';
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
        // rate,reason y coment deben ir en el mismo request y tabla, ya que eliminamos la tabla rejected de la db

        $rejected = $request->get('rejected');
        $reason = $request->get('reason');
        $comment = $request->get('comment');

        //Obtiene el dato de la bandeja
        $supplies_id = $request->get('supplies_id');
        $supplies = Supplies::where('weight', $supplies_id)->first()->id;
        $request['supplies_id'] = "$supplies";

        //Obtener datos del request
        $id = $request->get('provider_id');
        $rate = $request->get('rate');

        //array que envia a tablas
        $rate = ['provider_id' => $id, 'rate' => $rate];

        //Guarda la calificación
        $rate = Rate::create($rate);

        $reception = $request->all();
        //quitar rate y reason  del array reception
        unset($request['rate']);
        unset($request['reason']);
        unset($request['commentrejected']);

        //Guarda la Recepción
        $reception = Reception::create($reception);
        $reception_id = $reception->id;

        // RECHAZADOS
        //instancio el radio button

        if ($rejected == 1) {
            $rejected = [
                'reception_id' => $reception_id,
                'reason' => $reason,
                'commentrejected' => $comment,
            ];
            $rejected = Rejected::create($rejected);
        } else {
        }

        return redirect()->route('receptions.index', $reception->id)->with('info', 'Recepcion guardado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Reception $reception
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Reception $reception)
    {
        return view('receptions.show', compact('reception'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Reception $reception
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Reception $reception)
    {
        $receptionslist = Reception::paginate('5');

        $listSupplies = Supplies::OrderBy('id', 'DES')->pluck('name', 'weight');
        $listProviders = Providers::OrderBy('id', 'DES')->pluck('name', 'id');
        $listFruits = Fruit::OrderBy('id', 'DES')->get();

        $listVariety = Variety::OrderBy('id', 'DES')->pluck('variety', 'id');

        $listVariety = Variety::OrderBy('id', 'DES')->pluck('variety', 'id');
        $listQualities = Quality::OrderBy('id', 'DES')->pluck('name', 'id');
        $listSeasons = Season::OrderBy('id', 'DES')->pluck('name', 'id');
        $listStatus = Status::OrderBy('id', 'DES')->pluck('name', 'id');
        $listRejecteds = MotivoRejected::OrderBy('id', 'DES')->pluck('name', 'id');

        if ($reception->rejected == 1) {
            $rechazado = 'disponible';
        } else {
            $rechazado = 'rechazado';
            $rechazado = Rejected::where('reception_id', $reception->id)->first();

            $motivo = MotivoRejected::where('id', $rechazado->id)->pluck('name', 'id');
            $comment = MotivoRejected::where('id', $rechazado->id)->pluck('comment');
        }

        return view('receptions.edit', compact(
            'reception',
            'comment',
            'motivo',
            'rechazado',
            'listSupplies',
            'listStatus',
            'listProviders',
            'listQualities',
            'listFruits',
            'listSeasons',
            'listRejecteds',
            'listVariety'
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Reception           $reception
     *
     * @return \Illuminate\Http\Response
     */

    //revisar UpdateRequest (no funca con eso)

    public function update(UpdateReception $request, Reception $reception)
    {
        $rejected = $reception->rejected;

        if ($rejected == 1) {
            $borrado = Rejected::where('reception_id', $reception->id)->delete();
        }

        $reception->update($request->all());

        return redirect()->route('receptions.index', $reception->id)->with('info', 'Reception actualizada con exito');
    }

    public function ChangeStatusTrue(Reception $reception)
    {
        $reception = Reception::find($reception->input('id'));
        $rejected = Reception::where('id', $reception)->get('rejected');

   
        if ($rejected == 1) {
            Reception::where('id', $reception)->update(['available' => 0]);
        } elseif ($rejected == 0) {
            Reception::where('id', $reception)->update(['available' => 1]);
        }

        return redirect()->route('receptions.index', $reception->id)->with('info', 'Reception actualizada con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Reception $reception
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reception $reception)
    {
        $reception->delete();

        return back()->with('info', 'Eliminado con exito');
    }
}
