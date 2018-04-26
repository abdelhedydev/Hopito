<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Secretaire;
use App\Technicien;

class RhController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }
  public function index()
  {
    $secretaire=Secretaire::all();
    $techniciens=Technicien::all();
    return view('rh/index')->with(['secretaires'=>$secretaire,'techniciens'=>$techniciens]);

  }
}
