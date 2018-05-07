<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
  public function rdv()
  {
      return $this->belongsTo('App\RDV');
  }
  public function test(){
   return $this->belongsTo('App\Test');
 }
 public function user()
 {
     return $this->belongsTo('App\User');
 }
}
