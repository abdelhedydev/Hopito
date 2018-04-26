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

        //Progress Bar
        $query_etape = DB::table('r_d_v_s')
                       ->select(DB::raw('count(*) as nbr'),'patient_id','valeur','etape')
                       ->groupBy('patient_id','valeur','etape')
                       ->orderBy('valeur', 'asc')
                       ->where('date', '=', $mydate)
                       ->get();



        $rdv= RDV::orderBy('time')->where('date', '=', $mydate)->get();//Pour aujourd'hui
        $rdv2= RDV::orderBy('date','desc')->get();//Tous les rdvs


        return view('home')->with("parameters",["rdv_today"=>$rdv,"rdv"=>$rdv2,"query"=>$query_etape]);

    }

    public function test(){
      return view('test.index');
      //return redirect("/test");
    }
}
