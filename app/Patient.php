<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    public function rdv(){
      return $this->hasMany('App\RDV');
    }
}
