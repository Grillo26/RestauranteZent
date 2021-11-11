<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class personal extends Model
{
    use HasFactory;

    protected $fillable=['nombre_personal','telefono_personal','direccion_personal','id_tipo','id_turno'];

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
