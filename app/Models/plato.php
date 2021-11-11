<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class plato extends Model
{
    use HasFactory;

    protected $fillable=['precio_plato','tipo_plato','descripcion_plato','id_personal'];

    //relacion uno a muchos inversa
    public function personal(){
        return $this->belongsTo('App\Models\personal');
    }
    
    //relacion uno a muchas
    public function platosPedidos(){
        return $this->hasMany('App\Models\plato_pedido');
    }
    public function insumoPlatos(){
        return $this->hasMany('App\Models\insumo_plato');
    }
}
