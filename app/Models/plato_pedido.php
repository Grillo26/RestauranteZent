<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class plato_pedido extends Model
{
    use HasFactory;

    //Relacion uno a muchos inversa
    public function pedido(){
        return $this->belongsTo('App\Models\pedido');
    }
    public function plato(){
        return $this->belongsTo('App\Models\plato');
    }
}
