<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
  public function item(){
   return $this->hasMany('App\Item');
 }
 public function exam(){
  return $this->belongsTo('App\Exam');
}
}
