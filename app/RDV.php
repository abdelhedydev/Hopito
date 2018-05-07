<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RDV extends Model
{
  public function patient()
  {
      return $this->belongsTo('App\Patient');
  }
  public function user()
  {
      return $this->belongsTo('App\User');
  }
  public function exam(){
   return $this->hasMany('App\Exam');
 }
}
