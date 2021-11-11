<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class personal extends Model
{
    use HasFactory;

    //relacion uno a muchos pero inversa
    public function tipoPersonal(){
        return $this->belongsTo('App\Models\tipo_personal');
    }
    public function turno(){
        return $this->belongsTo('App\Models\turno');
    }

    //relacion muchos a uno
    public function platos(){
        return $this->hasMany('App\Models\plato');
    }
    public function pedidos(){
        return $this->hasMany('App\Models\pedido');
    }
}
