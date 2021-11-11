<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tipo_personal extends Model
{
    use HasFactory;

    //relacion uno a muchos
    public function personals(){
        return $this->hasMany('App\Models\personal;');
    }
}
