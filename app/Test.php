<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
  public function item(){
   return $this->hasMany('App\Item');
 }
}
