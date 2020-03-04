<?php

namespace App\Http\Controllers;

use App\Process;
use App\SubProcess;
use App\Fruit;
use App\Providers;
use App\Variety;
use App\Dispatch;
use App\Quality;
use App\Lote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;
use DB;

class ReportesController extends Controller
{
    public function reporteProcesoDaily()
    {

        return view('reportes.procesoDaily');
    }

    public function reporteProcesoDailySearch()
    {
        $q = Input::post('date');

        // consulta inner join (sub_process) unido (process);
        
        $processes = DB::table('processes')->join('sub_processes',
        'sub_processes.process_id',
        '=', 'processes.id')
        ->whereDate('processes.created_at', '=', $q)
        ->select('processes.fruit_id', 'processes.variety_id', 'sub_processes.weight', 'processes.tarja_proceso', 'sub_processes.tarja')->get();
        
        $sum = DB::table('processes')->join('sub_processes',
        'sub_processes.process_id',
        '=', 'processes.id')
        ->whereDate('processes.created_at', '=', $q)
        ->sum('sub_processes.weight');

        return view('reportes.procesoDailySearch', compact('processes', 'sum'));
    }

    public function reporteProcesoFruit()
    {
        $fruits = Fruit::all();
        $qualities = Quality::OrderBy('id', 'DES')->pluck('name', 'id');
        

        return view('reportes.procesoFruit', compact('fruits','qualities'));
    }

    public function reporteProcesoFruitSearch()
    {


        $q = Input::post('quality_id');
        $qq = Input::post('fruit_id');
        
        $processes = SubProcess::where('quality_id', $q)->where('fruit_id', $qq)->get();
        $sum = SubProcess::where('quality_id', $q)->where('fruit_id', $qq)->sum('weight');

        $fruits = Fruit::OrderBy('id', 'DES')->get();
        $qualities = Quality::OrderBy('id', 'DES')->pluck('name', 'id');
        $varieties = Variety::OrderBy('id', 'DES')->pluck('variety', 'id');

        return view('reportes.procesoFruitSearch', compact('sum', 'fruits','varieties','qualities','processes'));
    }

    public function reporteProcesoProvider()
    {
        $listProviders = Providers::OrderBy('id', 'DES')->get();

        return view('reportes.procesoProvider', compact('listProviders'));
    }

    public function reporteProcesoProviderSearch()
    {
        $q = Input::post('provider_id');
        $processes = Process::all()->where('provider_id', $q);
        $listProviders = Providers::OrderBy('id', 'DES')->get();

        return view('reportes.procesoProviderSearch', compact('processes', 'listProviders'));
    }

    // DESPACHO 

    public function reporteDespachoDaily()
    {
        return view('reportes.dispatchDaily');
    }

    public function reporteDespachoDailySearch()
    {
        $q = Input::post('date');
        $dispatchs = Dispatch::whereDate('created_at', '=', $q)->get();


        return view('reportes.dispatchDailySearch', compact('dispatchs'));
    }

    public function reporteDespachoFruit()
    {
        $fruits = Fruit::all();
        $qualities = Quality::OrderBy('id', 'DES')->pluck('name', 'id');

        return view('reportes.dispatchFruit', compact('fruits','qualities'));
    }

    public function reporteDespachoFruitSearch()
    {
    
        $q = Input::post('quality_id');
        $qq = Input::post('fruit_id');
        
        $dispatchs = Dispatch::where('quality_id', $q)->where('fruit_id', $qq)->get();
       
        $palletWeight = Lote::where('quality_id', $q)->where('fruit_id', $qq)->sum('palletWeight');
        $fruits = Fruit::OrderBy('id', 'DES')->get();
        $qualities = Quality::OrderBy('id', 'DES')->pluck('name', 'id');
      

        return view('reportes.dispatchFruitSearch', compact('dispatchs', 'fruits','qualities','sum','palletWeight','bruto'));
    }

    public function reporteDespachoProvider()
    {
        $listProviders = Providers::OrderBy('id', 'DES')->get();

        return view('reportes.dispatchProvider', compact('listProviders'));
    }

    public function reporteDespachoProviderSearch()
    {
        $q = Input::post('provider_id');
        $dispatchs = Dispatch::all()->where('provider_id', $q);
        $listProviders = Providers::OrderBy('id', 'DES')->get();

        return view('reportes.dispatchProviderSearch', compact('dispatchs', 'listProviders'));
    }

     public function reporteCamaraFruit()
    {
        $fruits = Fruit::all();
        $qualities = Quality::OrderBy('id', 'DES')->pluck('name', 'id');

        return view('reportes.camaraFruit', compact('fruits','qualities'));
    }

    public function reporteCamaraFruitSearch()
    {
    
        $q = Input::post('quality_id');
        $qq = Input::post('fruit_id');
        
        $dispatchs = Dispatch::where('quality_id', $q)->where('fruit_id', $qq)->get();
       
        $palletWeight = Lote::where('quality_id', $q)->where('fruit_id', $qq)->sum('palletWeight');
        $fruits = Fruit::OrderBy('id', 'DES')->get();
        $qualities = Quality::OrderBy('id', 'DES')->pluck('name', 'id');
      

        return view('reportes.camaraFruitSearch', compact('dispatchs', 'fruits','qualities','sum','palletWeight','bruto'));
    }
}
