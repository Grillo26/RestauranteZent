<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class venta extends Model
{
    use HasFactory;
    protected $fillable = ['nro_doc','tipo_doc','sub_totla','iva','propina','total','fecha_pedido','id_pedido'];

    //relacion uno a muchos inversa
    public function pedidos(){
        return $this->belongsTo('App\Models\pedido');
    }
}
