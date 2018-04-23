<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RDV;
use Carbon\Carbon;
use DB;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mydate = Carbon::now()->toDateString();
        $rdv= RDV::orderBy('time')->get();
        $rdv2= RDV::orderBy('date')->get();

      /*  $patients = DB::table('r_d_v_s')
                     ->select(DB::raw('count(*) as nbr, patient_id'))
                     ->groupBy('patient_id')->get();
*/
        return view('home')->with("parameters",["mydate"=>$mydate,"rdv_today"=>$rdv,"rdv"=>$rdv2]);

    }
}
