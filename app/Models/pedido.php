<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pedido extends Model
{
    protected $fillable=['id_cliente','tipo_pedido','id_mesa','id_personal','fecha_pedido'];
    use HasFactory;

     //relacion uno a muchos
     public function ventas(){
        return $this->hasMany('App\Models\venta');
    }
    public function pedidos(){
        return $this->hasMany('App\Models\pedido');
    }

    //relacion uno a muchos invertida
    public function cliente(){
        return $this->belongsTo('App\Models\cliente');
    }
    public function mesa(){
        return $this->belongsTo('App\Models\mesa');
    }
    public function personal(){
        return $this->belongsTo('App\Models\personal');
    }
}
