<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class venta extends Model
{
    use HasFactory;

    //relacion uno a muchos inversa
    public function pedidos(){
        return $this->belongsTo('App\Models\pedido');
    }
}
