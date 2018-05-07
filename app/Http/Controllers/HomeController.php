<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RDV;
use App\Exam;
use App\Test;
use Carbon\Carbon;
use DB;
use Illuminate\Support\Facades\Hash;
use Auth;
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
        $rdv2= RDV::orderBy('date','desc')->simplePaginate(5);


        return view('home')->with("parameters",["rdv_today"=>$rdv,"rdv"=>$rdv2,"query"=>$query_etape]);

    }

    public function test(){
      return view('test.index');
    }
    public function exam($id){

     $exams = Exam::all();
      $tests=Test::all();//Right Menu
      return view('exam.index')->with(['exams'=>$exams,'tests'=>$tests,'id'=>$id]);
    }
    public function showChangePasswordForm(){
       return view('auth.changepassword');
   }

   public function changePassword(Request $request){
        if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
        // The passwords matches
        return redirect()->back()->with("error","Your current password does not matches with the password you provided. Please try again.");
        }
        if(strcmp($request->get('current-password'), $request->get('new-password')) == 0){
        //Current password and new password are same
        return redirect()->back()->with("error","New Password cannot be same as your current password. Please choose a different password.");
        }
        $validatedData = $request->validate([
        'current-password' => 'required',
        'new-password' => 'required|string|min:6|confirmed',
        ]);
        //Change Password
        $user = Auth::user();
        $user->password = bcrypt($request->get('new-password'));
        $user->save();
        return redirect()->back()->with("success","Password changed successfully !");
        }

}
