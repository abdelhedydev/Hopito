<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RDV;
use Carbon\Carbon;
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
        $rdv= RDV::all();
        return view('home')->with("parameters",["mydate"=>$mydate,"rdv"=>$rdv]);

    }
}
