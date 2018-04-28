<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Test;
use App\item;

class TestController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $test=Test::all();
      $item = Item::all();
      return view('test.index')->with(['tests'=>$test,'items'=>$item]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('test.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $req
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
      $test = new Test();
      $test->nom = $req->input('nom');
      $test->category = $req->input('category');
      $test->save();
        return redirect('test');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $test = Test::find($id);
       return view('test.edit',['technicien'=>$test]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $req
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req, $id)
    {
        $test = Test::find($id);
        $test->nom = $req->input('nom');
        $test->category = $req->input('category');
        $test->save();
        return redirect('test');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $test = Test::find($id);
           $test->delete();
          return redirect('test');
    }
}
