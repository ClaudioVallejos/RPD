<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Reception;
use App\Dispatch;
use App\Process;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $today = Carbon::today();
        //cuenta todas las recepciones de hoy
        $cuentaProcess = Process::whereDate('created_at', $today)->count('id');
        $cuentaReception = Reception::whereDate('created_at', $today)->count('id');
        $cuentaDispatch = Dispatch::whereDate('created_at', $today)->count('id');

        return view('home', compact('cuentaReception', 'cuentaDispatch', 'cuentaProcess'));
    }

    
}
