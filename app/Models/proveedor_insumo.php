<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class proveedor_insumo extends Model
{
    use HasFactory;

    //Relacion uno a muchos inversa
    public function proveedor(){
        return $this->belongsTo('App\Models\proveedor');
    }
    public function insumo(){
        return $this->belongsTo('App\Models\insumo');
    }
}
