<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class insumo_platos extends Model
{
    use HasFactory;
    //relacion uno a muchos pero inversa
    public function insumo(){
        return $this->belongsTo('App\Models\insumo');
    }
    public function plato(){
        return $this->belongsTo('App\Models\plato');
    }
}
